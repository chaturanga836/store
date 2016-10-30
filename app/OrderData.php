<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderData extends Model
{
    //
     protected $table = 'orderdata';

    public $primaryKey='ID';
    public $timestamps = false;
}
