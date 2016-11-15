<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
use DateTime;
class OrderHeader extends Model
{
    //
     protected $table = 'OrderHeader';

    public $primaryKey='IntNo';
    public $timestamps = false;


    public static function getTodayOrders($empid){
      $orders=self::where('SysUsID',$empid)->where(DB::raw('DATE(TranDate)'),DB::raw('CURDATE()'))->get();

      return $orders;
    }

    public static function getMonthsOrders($empid){

      $date= new DateTime();
      $y=$date->format("Y");
      $month=$date->format("m");
      $monthf=strtotime("{$y}-{$month}-1");
      $monthe="{$y}-{$month}-31";

      $orders=self::where('SysUsID',$empid)
      ->where('TranDate','>=',$monthf)
      ->where('TranDate','<=',$monthe)
      ->get();

      return $orders;
    }
}
