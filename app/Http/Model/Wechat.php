<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Wechat extends Model
{
    protected $table = 'wechat';
    protected $primaryKey = 'wxid';
    public $timestamps = false;
    protected $guarded = [];
}
