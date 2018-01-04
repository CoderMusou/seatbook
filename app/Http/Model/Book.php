<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $table = 'book';
    protected $primaryKey = 'book_id';
    protected $dateFormat = 'U';
    protected $guarded = [];
}
