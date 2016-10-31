<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderHeader extends Model
{
    //
     protected $table = 'OrderHeader';

    public $primaryKey='IntNo';
    public $timestamps = false;
}
