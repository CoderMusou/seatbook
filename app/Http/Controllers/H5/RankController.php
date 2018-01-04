<?php

namespace App\Http\Controllers\H5;

use App\Http\Model\Book;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class RankController extends Controller
{
    public function index()
    {
        $ranks = Book::where('book_status', '=', 3)
            ->leftJoin('user', 'book.user_id', '=', 'user.user_id')
            ->leftJoin('wechat', 'wechat.user_id', '=', 'user.user_id')
            ->groupBy('book.user_id','nickname','headimgurl')
            ->orderBy(DB::raw('sum(end_time - start_time)'),'desc')
            ->take(10)
            ->get([
                'book.user_id',
                'nickname',
                'headimgurl',
                DB::raw('sum(end_time - start_time) as second')
            ]);
        $rank = $ranks->search(function ($item, $key) {
            return $item->user_id == $_SESSION['user_id'];
        });
        if ($rank === null){
            $rank = '十名开外';
        }else{
            $rank++;
        }

        return view('h5.rank', compact('ranks', 'rank'));
    }

    public function count()
    {
        $day= [];
        $month= [];
        $day_count = [];
        $month_count = [];
        for ($i = 0; $i<7; $i++){
            $day[$i] = date('m-d',strtotime("-".(6-$i)." day"));
        }
        for ($j = 0; $j<6; $j++){
            $month[$j] = date("m月", strtotime("-".(5-$j)." month"));
        }
        for ($i = 0; $i<7; $i++){
            $temp = Book::where('user_id', $_SESSION['user_id'])
                ->where('book_status', 3)
                ->groupBy('user_id')
                ->where('start_time','>',strtotime(date('Y-m-d',strtotime("-".(6-$i)." day"))))
                ->where('end_time','<',strtotime(date('Y-m-d',strtotime("-".(5-$i)." day"))))
                ->first([
                    DB::raw('sum(end_time - start_time) as time')
                ]);
            $day_count[$i] = floor($temp['time']/3600);
        }
        for ($i = 0; $i<6; $i++){
            $temp = Book::where('user_id', $_SESSION['user_id'])
                ->where('book_status', 3)
                ->groupBy('user_id')
                ->where('start_time','>',strtotime(date("Y-m", strtotime("-".(5-$i)." month"))))
                ->where('end_time','<',strtotime(date("Y-m", strtotime("-".(4-$i)." month"))))
                ->first([
                    DB::raw('count(*) as count')
                ]);
            $month_count[$i] = $temp['count'];
        }
        $day = implode("','",$day);
        $month = implode("','",$month);
        $day_count = implode(",",$day_count);
        $month_count = implode(",",$month_count);
        return view('h5.count',compact('day', 'month', 'day_count', 'month_count'));
    }
}
