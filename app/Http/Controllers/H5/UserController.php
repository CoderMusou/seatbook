<?php

namespace App\Http\Controllers\H5;

use App\Http\Model\Users;
use App\Http\Model\Wechat;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function index()
    {
        $user = Users::where('user_id', $_SESSION['user_id'])->first();
        return view('h5.user',compact('user'));
    }

    public function update(Request $request)
    {
        $user = Users::where('user_id', $_SESSION['user_id'])->update($request->except(['_token']));
        return $this->index();
    }

    public function bind()
    {
        return view('h5.bind');
    }

    public function bindPost(Request $request)
    {
        $re = Users::where('user_num', $request->get('user_num'))->where('user_pass', $request->get('user_pass'))->first();
        if($re != null){
            $wx = Wechat::where('openid', $_SESSION['wechat_user']['id'])->first();
            $wx->user_id = $re->user_id;
            $wx->save();
            $_SESSION['user_id'] = $re->user_id;
            return [
                'status' => 0,
                'msg'    => '绑定成功'
            ];
        }else{
            return [
                'status' => 1,
                'msg'    => '绑定失败'
            ];
        }
    }
}
