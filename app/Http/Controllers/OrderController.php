<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\OrderData;
use App\OrderHeader;

class OrderController extends Controller
{
    //
    	public function placeOrder(Request $request){

		$customer=$request->input('customerid');
		$user=$request->input('userid');
		$items=$request->input('cart');
    $mydate=getdate(date("U"));

		$orderHeadr=new OrderHeader;
		$orderHeadr->SysUsID=$user;
		$orderHeadr->CustomerID=$customer;
    $orderHeadr->EmployeeID=$user;
    $orderHeadr->TranDate=date("Y-m-d");
    $orderHeadr->DocNo=25;
		$orderHeadr->LocID=2;

		if(!$orderHeadr->save()){
			return response()->json(['succsess'=>false,'message'=>'internal error'])
			 ->header('Access-Control-Allow-Origin','*')
                        ->header('Access-Control-Allow-Methods','POST, GET, OPTIONS, PUT, DELETE');
		}

    $orderHeadr->IntRefNo=$orderHeadr->IntNo;
    $orderHeadr->IntRefExt=$orderHeadr->IntNo;
    $orderHeadr->ExtNo=$orderHeadr->IntNo;

    if(!$orderHeadr->save()){
			return response()->json(['succsess'=>false,'message'=>'internal error'])
			 ->header('Access-Control-Allow-Origin','*')
                        ->header('Access-Control-Allow-Methods','POST, GET, OPTIONS, PUT, DELETE');
		}

		$orderData=[];
		foreach ($items as $item) {
      $item['amount']=intval($item['amount']);
      $item['wsale']=floatval($item['wsale']);
			array_push($orderData,[
					'IntNo'=>$orderHeadr->IntNo,
					'ExtNo'=>$orderHeadr->IntNo,
					'ProductID'=>$item['id'],
					'Quantity'=>$item['amount'],
					'Price'=>$item['wsale'],
					'Value'=>$item['amount']*$item['wsale'],
					'Name'=>$item['name'],
					'FOCQty'=>isset($item['freeqty'])?intval($item['freeqty']):0,
				]);
		}
		//DB::table('orderdata')->insert($orderData);
		try{
		OrderData::insert($orderData);

		return response()->json(['succsess'=>true,'message'=>'Order Placed Success!'])
				->header('Access-Control-Allow-Origin','*')
                ->header('Access-Control-Allow-Methods','POST, GET, OPTIONS, PUT, DELETE');
		}catch(Exception $ex){
			return response()->json(['succsess'=>false,'message'=>'internal error'])
				->header('Access-Control-Allow-Origin','*')
                ->header('Access-Control-Allow-Methods','POST, GET, OPTIONS, PUT, DELETE');
		}


	}


	public function testOrder(Request $request){
		//$customer=$request->input('customerid');
		//$user=$request->input('userid');

		return response()->json(['succsess'=>true,'customer'=>'The Customer','user'=>'The User']);

	}
}
