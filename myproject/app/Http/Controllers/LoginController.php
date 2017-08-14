<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\User;

class LoginController extends Controller
{


    //
    public function index()
    {
    	session_start();

 	   	return view('pages/login');
    }

    public function login(Request $request)
    {
    	
    	//$UserItem = User::all();
    	$UserItem = User::where('strUSRName', request('txtUsername'))->get();

    	$passFromDB = $UserItem->first()->txtUSRPassword;
    	$pass = md5(request('txtPassword'));

    	if ($pass == $passFromDB) {
 	   		// The passwords match...
            config(['global.user_id' => $UserItem->first()->intUSRID]);
            config(['global.user_name' => $UserItem->first()->strUSRName]);
            config(['global.user_image' => $UserItem->first()->txtUSRImagePath]);

            $uname = config('global.user_name');
            $uimage = config('global.user_image');

 	   		return view('pages/dashboard',compact('uname'),compact('uimage'));
		} else {
			return view('pages/login');
		}
    	

		
		//return view('pages/dashboard');
    }

    public function logout()
    {
    	$_SESSION['User_id'] = "";
    	$_SESSION['User'] = "";
    	$_SESSION['Image'] = "";
    	return view('pages/login');
    }

}
