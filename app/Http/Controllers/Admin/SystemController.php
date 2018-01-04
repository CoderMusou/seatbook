<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SystemController extends Controller
{
    public function index()
    {
        return view('admin.set');
    }
    public function qrcode(){
        return view('admin.qrcode');
    }
    public function password(){
        return view('');
    }
}
