<?php

namespace App\Http\Middleware;

use Closure;
use EasyWeChat\Factory;

class WeChatOAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $config = config("wechat");
        $app = Factory::officialAccount($config);
        $oauth = $app->oauth;

        // 未登录
        if (empty($_SESSION['wechat_user'])) {
            $_SESSION['target_url'] = '/';
            return $oauth->redirect();
        }

        if (!isset($_SESSION['user_id'])){
            return redirect('/user/bind');
        }
        if ($_SESSION['user_id'] == null){//判断是否绑定
            return redirect('/user/bind');
        }

        // 已经登录过
        return $next($request);
    }
}
