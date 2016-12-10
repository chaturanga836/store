<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\OrderData;
use App\OrderHeader;
use App\Customer;
use App\SalesHeader;

class ReportsController extends Controller{

  public function todayReports($empid){
    $todayHistory=[];

    $totalCustomers=0;
    $totalProducts=0;
    $totalPrice=0;

  $orders=SalesHeader::getTodayOrders($empid);

    // foreach ($orders as $order) {
    //   $a=OrderData::getTotalproduct($order->IntNo);
    //   $b=OrderData::getTotalPrice($order->IntNo);
    //   array_push($todayHistory,[
    //     'Customer'=>Customer::where('CustomerID',sprintf("%04d",$order->CustomerID))->first(),
    //     'TotalProducst'=>$a,
    //     'Totalprice'=>$b,
    //   ]);
    //   $totalCustomers+=1;
    //   $totalProducts+=$a;
    //   //$totalPrice+=$b;
    // }

    $totalPrice=SalesHeader::getTodayTotalprice($empid);

    return response()->json([
      'succsess'=>true,
      'totalcustomers'=>$orders,
      'totalprice'=>$totalPrice,
      'totalProducts'=>$totalProducts,
      'history'=>$todayHistory
    ])
     ->header('Access-Control-Allow-Origin','*')
    ->header('Access-Control-Allow-Methods','POST, GET, OPTIONS, PUT, DELETE');

  }

  public function thisMonthReport($empid){
    $thisMonthHistory=[];

    $totalCustomers=0;
    $totalProducts=0;
    $totalPrice=0;

    $orders=SalesHeader::getMonthsOrders($empid);

    // foreach ($orders as $order) {
    //
    //   $a=OrderData::getTotalproduct($order->IntNo);
    //   $b=OrderData::getTotalPrice($order->IntNo);
    //   array_push($thisMonthHistory,[
    //     'Customer'=>Customer::where('CustomerID',sprintf("%04d",$order->CustomerID))->first(),
    //     'TotalProducst'=>$a,
    //     'Totalprice'=>$b,
    //   ]);
    //   $totalCustomers+=1;
    //   $totalProducts+=$a;
    //   //$totalPrice+=$b;
    // }

    $totalPrice=SalesHeader::getMonthTotalPrice($empid);

      return response()->json([
        'succsess'=>true,
        'totalcustomers'=>$orders,
        'totalprice'=>$totalPrice,
        'totalProducts'=>$totalProducts,
        'history'=>$thisMonthHistory
      ])
       ->header('Access-Control-Allow-Origin','*')
      ->header('Access-Control-Allow-Methods','POST, GET, OPTIONS, PUT, DELETE');

  }

}
