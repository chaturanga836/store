<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderHeader extends Model
{
    //
     protected $table = 'OrderHeader';

    public $primaryKey='IntNo';
    public $timestamps = false;


    public static function getTodayOrders($empid){
      $orders=self::where('SysUsID',$empid)->where('TranDate',date('Y-m-d'))->get();

      return $orders;
    }

    public static function getMonthsOrders($empid){

      $date= new DateTime(date('Y-m-d'));
      $y=$date->format("Y");
      $month=$date->format("m");
      $orders=self::where('SysUsID',$empid)->whereBetween('TranDate',["{$y}-{$month}-1","{$y}-{$month}-31"])->get();
      return $orders;
    }
}
