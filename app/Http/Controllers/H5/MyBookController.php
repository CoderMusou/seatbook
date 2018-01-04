<?php

namespace App\Http\Controllers\H5;

use App\Http\Model\Book;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class MyBookController extends Controller
{
    public function index() //我的预约首页
    {
        $book_status = ['未签到','已签到','暂离中','已结束','已取消','已违约'];
        $book_color = ['未签到','blue','gray','green','orange','red'];
        $user_id = $_SESSION['user_id'];
        $books = DB::table('book')
            ->leftJoin('seat', 'book.seat_id', '=', 'seat.seat_id')
            ->leftJoin('room', 'seat.room_id', '=', 'room.room_id')
            ->where('user_id', $user_id)
            ->get();
        $expire_books = DB::table('book')
            ->leftJoin('seat', 'book.seat_id', '=', 'seat.seat_id')
            ->leftJoin('room', 'seat.room_id', '=', 'room.room_id')
            ->where('user_id', $user_id)
            ->where('book_status', 5)
            ->get();
        return view('h5.book', compact('book_status','book_color','books','expire_books'));
    }
}
