<?php

namespace App\Http\Controllers\H5;

use App\Http\Model\Message;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MessageController extends Controller
{
    public function index() //通知列表页
    {
        $messageList = Message::get(['mes_id','mes_title','updated_at']);
        return view('h5.message', compact('messageList'));
    }
    public function message($id) //通知内容页
    {
        $message = Message::where('mes_id', $id)->first();
        Message::where('mes_id',$id)->increment('mes_view');
        return view('h5.content',compact('message'));
    }
}
