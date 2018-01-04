<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MessageController extends Controller
{
    public function index()
    {
        return view('admin.msg');
    }
    public function add()
    {
        return view('admin.msg-add');
    }
    public function store()
    {
        return view('admin.message');
    }
}
