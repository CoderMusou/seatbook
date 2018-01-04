<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UploadController extends Controller
{
    //平面图上传
    public function upload(Request $request)
    {
        $file = $request->file('file');
//        dd($file);
        if($file -> isValid()){
            //检验一下上传的文件是否有效.
            $realPath = $file -> getRealPath();    //这个表示的是缓存在tmp文件夹下的文件的绝对路径，例如我的是: C:\wamp\tmp\php9372.tmp
            $entension = $file -> getClientOriginalExtension(); //上传文件的后缀.
            $newName = date('YmdHis').'.'.$entension;
            $path = $file -> move('upload/seat_img',$newName);

            $filepath = 'upload/seat_img/'.$newName;

            return $filepath;
        }
    }
}
