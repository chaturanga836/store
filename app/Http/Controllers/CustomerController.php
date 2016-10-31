<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;

class CustomerController extends Controller
{
    //
    public function index(){
		echo "This is Controller";
	}

	public function search(Request $request,$keyword=null){
		if($keyword==null){
			return response()->json(['customers'=>[]])
		 ->withCallback($request->input('callback'));
		}
		$names=explode(" ",$keyword);
		$customers=Customer::where('CusName','LIKE',$keyword.'%')
		->orWhere('CusName','LIKE','%'.$keyword)
		->orderBy('CusName')
		->get();

		return response()->json(['customers'=>$customers])
		 ->withCallback($request->input('callback'));
	}
}
