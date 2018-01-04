<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Seat extends Model
{
    protected $table = 'seat';
    protected $primaryKey = 'seat_id';
    public $timestamps = false;
}
