<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ItemHistory extends Model
{
    //
    protected $table = 'Itemhistory';

    public $primaryKey='ID';
    public $timestamps = false;
    public $incrementing=false;


    public static function getQty($id){

    	$qty=ItemHistory::where('productId',$id)->sum('quantity');

    	return $qty;
    }
}
