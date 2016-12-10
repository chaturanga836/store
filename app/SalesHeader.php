<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
use DateTime;
class SalesHeader extends Model
{
  protected $table = 'SalesHeader';

 public $primaryKey='IntNo';
 public $timestamps = false;


 public static function getMonthTotalPrice($empid){
   $date= new DateTime();
   $y=$date->format("Y");
   $month=$date->format("m");
   $monthf="{$y}-{$month}-1";
   $monthe="{$y}-{$month}-31";


   $sales1=self::where('EmployeeID',$empid)
   ->where('DocNo',3)
   ->where('TranDate','>=',$monthf)
   ->where('TranDate','<=',$monthe)
   ->select(DB::raw('sum(((100-Discount)*Amount)/100) AS tsales'))
   ->get();


   $sales2=self::where('EmployeeID',$empid)
   ->where('DocNo',4)
   ->where('TranDate','>=',$monthf)
   ->where('TranDate','<=',$monthe)
   ->select(DB::raw('sum(((100-Discount)*Amount)/100) AS tsales'))
   ->get();

   var_dump($sales2);exit();
   return ($sales1-$sales2);

 }
//a-(a*b/100)=> a(100-b)/100
 public static function getTodayTotalprice($empid){
   $sales1=self::where('EmployeeID',$empid)
   ->where('DocNo',3)
   ->where(DB::raw('DATE(TranDate)'),DB::raw('CURDATE()'))
   ->select(DB::raw('sum(((100-Discount)*Amount)/100) AS tsales'))
   ->get();

   $sales2=self::where('EmployeeID',$empid)
   ->where('DocNo',4)
   ->where(DB::raw('DATE(TranDate)'),DB::raw('CURDATE()'))
   ->select(DB::raw('sum(((100-Discount)*Amount)/100) AS tsales'))
   ->get();
   return ($sales1-$sales2);
 }

 public static function getTodayOrders($empid){

   $order1=self::where('SysUsID',$empid)
   ->where('DocNo',3)
   ->where(DB::raw('DATE(TranDate)'),DB::raw('CURDATE()'))
   ->count();

   $order2=self::where('SysUsID',$empid)
   ->where('DocNo',4)
   ->where(DB::raw('DATE(TranDate)'),DB::raw('CURDATE()'))
   ->count();

   return ($order1-$order2);
 }

 public static function getMonthsOrders($empid){

   $date= new DateTime();
   $y=$date->format("Y");
   $month=$date->format("m");
   $monthf=strtotime("{$y}-{$month}-1");
   $monthe="{$y}-{$month}-31";

   $order1=self::where('SysUsID',$empid)
   ->where('DocNo',3)
   ->where('TranDate','>=',$monthf)
   ->where('TranDate','<=',$monthe)
   ->count();

   $order2=self::where('SysUsID',$empid)
   ->where('DocNo',4)
   ->where('TranDate','>=',$monthf)
   ->where('TranDate','<=',$monthe)
   ->count();

   return ($order1-$order2);
 }

}
