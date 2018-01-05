<?php

namespace App\Http\Controllers;

use App\Http\Model\Book;
use App\Http\Model\Wechat;
use EasyWeChat\Factory;
use EasyWeChat\Kernel\Messages\Image;
use Illuminate\Http\Request;

class ServerController extends Controller
{
    /**
     * @throws \EasyWeChat\Kernel\Exceptions\BadRequestException
     * @throws \EasyWeChat\Kernel\Exceptions\InvalidArgumentException
     */
    public function index()
    {
        $config = config("wechat");
        $app = Factory::officialAccount($config);
        $app->server->push(function ($message) {
            switch ($message['MsgType']) {
                case 'event':
                    if ($message['EventKey'] == 'sign') {
                        return $this->sign($message['FromUserName'], $message['ScanCodeInfo']['ScanResult']);
                    }else {
                        return $message['EventKey'] . '收到事件消息';
                    }
                    break;
                case 'text':
                    return '收到文字消息';
                    break;
                case 'image':
//                    return new Image($message['MediaId']);
                    return $message['PicUrl'];
                    break;
                case 'voice':
                    return '收到语音消息';
                    break;
                case 'video':
                    return '收到视频消息';
                    break;
                case 'location':
                    return '收到坐标消息';
                    break;
                case 'link':
                    return '收到链接消息';
                    break;
                // ... 其它消息
                default:
                    return '收到其它消息';
                    break;
            }
        });
        $response = $app->server->serve();
        // 将响应输出
        return $response;
    }

    public function sign($openid, $time)
    {
        if (time()-$time > 10)
            return '该二维码已过期！';
        $user_id = Wechat::where('openid', $openid)->first()->user_id;
        $re = Book::where('user_id', $user_id)
            ->where('start_time', '<', $time)
            ->where('end_time', '>', $time)
            ->where('book_status', 0)
            ->update(['book_status' => 1]);
        if ($re == null)
            return '当前没有预约，请先预约后再来签到！';
        return '签到成功！';
    }
}
