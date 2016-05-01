<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Row extends Model
{
    protected $fillable = ['name','amount','income','city','state','zipcode'];
}
