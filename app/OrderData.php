<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderData extends Model
{
    //
     protected $table = 'OrderData';

    public $primaryKey='ID';
    public $timestamps = false;

    public static function getTotalproduct($orderid){
        $totlaitem=self::where('IntNo',$orderid)->groupBy('ProductID')->count();

        return $totlaitem;
    }

    public static function getTotalPrice($orderid){
      $totlaitem=self::where('IntNo',$orderid)->sum('Price');

      return $totlaitem;
    }
}
