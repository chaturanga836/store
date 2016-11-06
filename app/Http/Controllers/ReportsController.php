<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\OrderData;
use App\OrderHeader;

class ReportsController extends Controller{

  public function todayReports($empid){
    $todayHistory=[];

    $totalCustomers=0;
    $totalProducts=0;
    $totalPrice=0;

    return response->json(['succsess'=>true,'report'=>$todayHistory])
     ->header('Access-Control-Allow-Origin','*')
    ->header('Access-Control-Allow-Methods','POST, GET, OPTIONS, PUT, DELETE');

  }

  public function thisMonthReport($empid){
    $thisMonthHistory=[];

    $totalCustomers=0;
    $totalProducts=0;
    $totalPrice=0;
  }

}
