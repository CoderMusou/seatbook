<?php

namespace App\Http\Controllers\H5;

use App\Http\Model\Book;
use App\Http\Model\Config;
use App\Http\Model\Message;
use App\Http\Model\Seat;
use App\Http\Model\Users;
use App\Http\Model\Wechat;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    public function index() //H5首页
    {
        $status = [
            '未签到','已签到','暂离','无预约','用户取消','违约'
        ];
        $configs = Config::get()->toArray();
        $config = [];
        foreach ($configs as $v){
            $config[$v['con_key']] = $v['con_value'];
        }
        $messageNew = Message::orderBy('created_at','desc')->first(['mes_id','mes_title']);
        $user = Wechat::where('openid', $_SESSION['wechat_user']['id'])->first();
        //可预约统计
        $count = Seat::where('seat_status', 0)
            ->count();
        $count2 = Book::where('user.user_id','=',$_SESSION['user_id'])
            ->leftJoin('seat', 'seat.seat_id', '=', 'book.seat_id')
            ->leftJoin('user', 'book.user_id', '=', 'user.user_id')
            ->where('book_status',5)
            ->first([DB::raw('count(*) as count')]);
        $book = Book::where('user_id','=',$_SESSION['user_id'])
            ->where('end_time','>',time())
            ->where('start_time','<',time())
            ->where('book_status', '<', 3)
            ->orderBy('updated_at','desc')
            ->first();
        $book_status['book_id'] = $book['book_id'];
        $book_status['code'] = $book['book_status'];
        if($book['book_status']===null){
            $book_status['status'] = '无预约';
        }else{
            $book_status['status'] = $status[$book['book_status']];
        }
        return view('h5.index', compact('config','messageNew','user','count','count2','book_status'));
    }
}
