<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    //
    protected $table = 'product';

    public $primaryKey='ProductID';
    public $timestamps = false;
    public $incrementing=false;
}
