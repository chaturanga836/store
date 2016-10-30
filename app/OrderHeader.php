<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderHeader extends Model
{
    //
     protected $table = 'orderheader';

    public $primaryKey='IntNo';
    public $timestamps = false;
}
