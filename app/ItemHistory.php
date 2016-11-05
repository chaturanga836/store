<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ItemHistory extends Model
{
    //
    protected $table = 'ItemHistory';

    public $primaryKey='ID';
    public $timestamps = false;
    public $incrementing=false;


    public static function getQty($id){

    	$qty=ItemHistory::having('productId',$id)
      ->groupBy('productId')
      ->sum('quantity');

    	return $qty;
    }
}
