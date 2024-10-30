<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hiragana extends Model
{
    protected $guarded = ['id'];

    protected $table = 'hiragana';

    public $timestamps = false;

}
