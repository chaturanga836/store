<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    //
    protected $table = 'Product';

    public $primaryKey='ProductID';
    public $timestamps = false;
    public $incrementing=false;
}
