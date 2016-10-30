<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class AuthenticateController extends Controller
{
    //
    public function index()
    {
        // TODO: show users
    } 

    public function authenticate(Request $request){
    	$username = $request->input('username');
        $password=$request->input('password');
       
    	try {
                
            $auth=User::where('Name',$username)->where('PassWord',$password)->first();
            if($auth==null){


                return response()->json(['succsess'=>false,'error' => 'invalid_credentials'], 401)
                 ->header('Access-Control-Allow-Origin','*')
         ->header('Access-Control-Allow-Methods','POST, GET, OPTIONS, PUT, DELETE');
            }else{
                 return response()->json(['succsess'=>true,'auth'=>$auth->UserNo])
                        ->header('Access-Control-Allow-Origin','*')
                        ->header('Access-Control-Allow-Methods','POST, GET, OPTIONS, PUT, DELETE');

            }
        } catch (JWTException $e) {
            // something went wrong
            return response()->json(['succsess'=>false,'error' => 'could_not_create_token'], 500)
             ->header('Access-Control-Allow-Origin','*')
         ->header('Access-Control-Allow-Methods','POST, GET, OPTIONS, PUT, DELETE');
        }

       
    }
}
