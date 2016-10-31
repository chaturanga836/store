<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    //
    protected $table = 'Customer';

    public $primaryKey='CustomerID';
    public $timestamps = false;
    public $incrementing=false;
}
