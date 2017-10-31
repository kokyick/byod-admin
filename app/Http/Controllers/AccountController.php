<?php

namespace App\Http\Controllers;

use App\Library\Api;

use Illuminate\Http\Request;

use Log;

use Session;

class AccountController extends Controller
{
	public function login(Request $request){
		//Login

		$result =Api::postLogin($request->username, $request->pw);
		//Session::flush();
		//{{print_r(Session::get('token')->getHeader('Set-Cookie')[0])}}
		Session::put('token',$result);
		return redirect()->route('viewindex');

	}	
	public function logout(){
		Session::forget('token');
		return redirect()->route('viewindex');

	}	
	public function register(Request $request){
		//Login
		$myBody['Email'] = $request->email;
		$myBody['Password'] = $request->pw;
		$myBody['ConfirmPassword'] = $request->cpw;
		$result =Api::postRequest("Account/Register",$myBody);
		//Session::flush();
		return redirect()->route('login');

	}
}