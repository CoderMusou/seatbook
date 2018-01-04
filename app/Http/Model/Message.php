<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $table = 'message';
    protected $primaryKey = 'message_id';
    protected $dateFormat = 'U';
    protected $guarded = [];
}
