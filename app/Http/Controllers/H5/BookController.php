<?php

namespace App\Http\Controllers\H5;

use App\Http\Model\Book;
use App\Http\Model\Room;
use App\Http\Model\Seat;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BookController extends Controller
{
    public function room() //房间数据
    {
        $rooms = Room::where('room_pid', 0)->get(['room_id', 'room_name']);
        $str = "";
        foreach ($rooms as $v){
            $str .= "{title:'$v->room_name',value:'$v->room_id'},";
        }
        return view('h5.room', ['room' => $str]);
    }

    public function seat($id) //座位数据
    {
        $room_img = Room::find($id)->room_img;
        $seats = Seat::where('room_id', $id)
            ->where('seat_status', 0)
            ->get(['seat_id', 'seat_name']);
        $str = "";
        foreach ($seats as $v){
            $str .= "{title:'$v->seat_name',value:'$v->seat_id'},";
        }
        return view('h5.seat', compact('room_img','str'));
    }

    public function getSub(Request $request) //获取房间下级
    {
        $pid = $request->pid;
        $rooms = Room::where('room_pid', $pid)->get(['room_id', 'room_name']);
        $subroom = [];
        $k = 0;
        foreach ($rooms as $v){
            $subroom[$k]['title'] = $v->room_name;
            $subroom[$k]['value'] = $v->room_id;
            $k++;
        }
        return $subroom;
    }

    public function book(Request $request) //预约操作
    {
        $data = $request->except('_token');
        if (date("Y-m-d",$data['start_time']) == date("Y-m-d",time())){
            $data['end_time'] = strtotime(date("Y-m-d").' 22:00:00');
        }else{
            $data['end_time'] = strtotime(date("Y-m-d",strtotime("+1 day")).' 22:00:00');
        }
        $end_time = Book::where('user_id', $_SESSION['user_id'])->where('book_status', '<', 3)->orderBy('end_time', 'desc')->first()['end_time'];
        if (time() < $end_time){
            return [
                'status' => 1,
                'msg' => '一次最多可预约一个座位！'
            ];
        }
        $data['user_id'] = $_SESSION['user_id'];
        try {
            Book::create($data);
            Seat::where('seat_id', $data['seat_id'])->update(['seat_status' => 1]);
            $result = [
                'status' => 0,
                'msg' => '预约成功！'
            ];
        }catch (QueryException $e){
            $result = [
                'status' => 1,
                'msg' => '预约失败：[SQLError]'.$e->getMessage()
            ];
        }
        return $result;
    }

    public function part($id)
    {
        Book::where('book_id', $id)->update(['book_status' => 2]);
        return [
            'status' => 0,
            'msg' => '置为暂离状态！'
        ];
    }

    public function leave($id)
    {
        $book = Book::find($id);
        $seat_id = $book->seat_id;
        $book->book_status = 3;
        $book->save();
        Seat::where('seat_id', $seat_id)->update(['seat_status' => 0]);
        return [
            'status' => 0,
            'msg' => '已签退！'
        ];
    }

    public function cancel($id)
    {
        $book = Book::find($id);
        $seat_id = $book->seat_id;
        $book->book_status = 4;
        $book->save();
        Seat::where('seat_id', $seat_id)->update(['seat_status' => 1]);
        return[
            'status' => 0,
            'msg' => '取消成功！'
        ];
    }
}
