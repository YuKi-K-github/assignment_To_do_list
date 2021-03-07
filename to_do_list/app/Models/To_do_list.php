<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class To_do_list extends Model
{
    //
    protected $table = 'to_do_lists';
    protected $fillable = ['task'];
}
