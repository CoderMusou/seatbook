<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use EasyWeChat\Factory;

class TestController extends Controller
{
    /**
     * @return \Symfony\Component\HttpFoundation\Response
     * @throws \EasyWeChat\Kernel\Exceptions\BadRequestException
     * @throws \EasyWeChat\Kernel\Exceptions\InvalidArgumentException
     */
    public function index()
    {
        $config = config("wechat");
        $app = Factory::officialAccount($config);

        $app->server->push(function ($message) {
            // $message['FromUserName'] // 用户的 openid
            // $message['MsgType'] // 消息类型：event, text....
            return "您好！欢迎使用 EasyWeChat";
        });
        // 在 laravel 中：
        $response = $app->server->serve();
        return $response;
    }
}
