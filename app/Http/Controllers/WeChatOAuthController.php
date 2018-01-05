<?php

namespace App\Http\Controllers;

use App\Http\Model\Wechat;
use EasyWeChat\Factory;
use Illuminate\Http\Request;

class WeChatOAuthController extends Controller
{
    public function index()
    {
        $config = config("wechat");
        $app = Factory::officialAccount($config);
        $oauth = $app->oauth;

        // 获取 OAuth 授权结果用户信息
        $user = $oauth->user();
        $userInfo = [
            'openid'    => $user->getId(),
            'nickname'   => $user->getNickname(),
            'headimgurl' => $user->getAvatar(),
            'sex'       => $user->getOriginal()['sex'],
            'country'   => $user->getOriginal()['country'],
            'province'  => $user->getOriginal()['province'],
            'city'      => $user->getOriginal()['city']
        ];

        $re = Wechat::where('openid',$user->getId())->first();
        if ($re == null){       //判断微信用户是否存档
            Wechat::create($userInfo);
            $_SESSION['user_id'] = null;
        }else{
            $_SESSION['user_id'] = $re->user_id;
        }

        $_SESSION['wechat_user'] = $user->toArray();
        $targetUrl = empty($_SESSION['target_url']) ? '/' : $_SESSION['target_url'];

        return redirect($targetUrl);
    }
}
