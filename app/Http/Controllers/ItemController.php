<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ItemHistory;
use App\Item;

class ItemController extends Controller
{
    //
    public function search(Request $request,$keyword=null){

    	$products=[];
    	if($keyword==null){
			return response()->json(['items'=>[]])
		 ->withCallback($request->input('callback'));
		}
		$names=explode(" ",$keyword);

		$items=Item::where('Name','LIKE',$keyword.'%')
		->orWhere('ProductID','LIKE',$keyword.'%')
		->orderBy('Name')
		->take(20)
		->get();

		foreach ($items as $item) {

			array_push($products,array(
				 'id'=>$item->ProductID,
				 'Bonus'=>$item->Bonus,
				 'wsale'=>$item->RetailPrice,
				 'name'=>$item->Name,
				 'qty'=>ItemHistory::getQty($item->ProductID),
				 'qtyInHand'=>$item->qtyInHand
				));
		}


		return response()->json(['items'=>$products]);
		 //->withCallback($request->input('callback'));
    }

    public function getall(Request $request ,$page){
      $items=Item::orderBy('Name')
      ->take(20)
      ->skip((20*$page)-20)
      ->get();

      $products=[];

      foreach ($items as $item) {

  			array_push($products,array(
  				 'id'=>$item->ProductID,
  				 'Bonus'=>$item->Bonus,
  				 'wsale'=>$item->WSalePrice,
  				 'name'=>$item->Name,
  				 'qty'=>ItemHistory::getQty($item->ProductID),
  				 'qtyInHand'=>$item->qtyInHand
  				));
  		}

      return response()->json(['items'=>$products]);
    }
}
