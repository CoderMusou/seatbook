<?php

namespace App\Http\Controllers;

use EasyWeChat\Factory;
use Illuminate\Http\Request;

class QRcodeController extends Controller
{
    public function index()
    {
        $config = config("wechat");
        $app = Factory::officialAccount($config);
        $result = $app->qrcode->temporary('foo', 6 * 24 * 3600);
        dd($result);
    }
}
