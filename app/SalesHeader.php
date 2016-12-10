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
   ->sum('Amount');


   $sales2=self::where('EmployeeID',$empid)
   ->where('DocNo',4)
   ->where('TranDate','>=',$monthf)
   ->where('TranDate','<=',$monthe)
   ->sum('Amount');


   return ($sales1-$sales2);

 }

 public static function getTodayTotalprice($empid){
   $sales1=self::where('EmployeeID',$empid)
   ->where('DocNo',3)
   ->where(DB::raw('DATE(TranDate)'),DB::raw('CURDATE()'))
   ->sum('Amount');

   $sales2=self::where('EmployeeID',$empid)
   ->where('DocNo',4)
   ->where(DB::raw('DATE(TranDate)'),DB::raw('CURDATE()'))
   ->sum('Amount');

   return ($sales1-$sales2);
 }
}
