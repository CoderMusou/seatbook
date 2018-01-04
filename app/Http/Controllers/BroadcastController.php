<?php

namespace App\Http\Controllers;

use EasyWeChat\Factory;
use Illuminate\Http\Request;

class BroadcastController extends Controller
{
    public function index()
    {
        $config = config("wechat");
        $app = Factory::officialAccount($config);
        $broadcast = $app->broadcasting;
        $broadcast->sendText("大家好！欢迎关注我。");
    }
}
