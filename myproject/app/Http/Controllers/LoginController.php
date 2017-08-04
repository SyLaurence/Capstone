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
 	   	return view('pages/login');
    }

    public function login(Request $request)
    {

    	//$UserItem = User::all();
    	$UserItem = User::where('user_name', request('txtUsername'))->get();

    	$passFromDB = $UserItem->first()->password;
    	$pass = md5(request('txtPassword'));

    	if ($pass == $passFromDB) {
 	   		// The passwords match...

    		$_SESSION['User_id'] = $UserItem->first()->id;
    		$_SESSION['User'] = $UserItem->first()->user_name;
    		$_SESSION['Image'] = $UserItem->first()->image_path;

 	   		return view('pages/dashboard');

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
