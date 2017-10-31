<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Session;

class HomeController extends Controller
{
	
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**public function __construct()
    *{
     *   $this->middleware('auth');
    *}
	*/

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }
	public function viewindex()
    {
        return view("app.index");
    }
	public function viewindex1()
    {
        return view("app.index-1");
    }
	public function viewcart()
    {
		$subtotal=0;
		if(Session::has('cart')){
			foreach (Session::get('cart') as $food){
				$subtotal+=floatval($food['itemprice'])*floatval($food['quantity']);
			}
			Session::put('subtotal', $subtotal); 
		}
		if(!(Session::has('subtotal'))){
			Session::put('subtotal', $subtotal);
		}
		
        return view("app.cart");
    }
	public function viewfeedback()
    {
        return view("app.feedback");
    }
	public function viewterms()
    {
        return view("app.terms");
    }
	public function viewregistration()
    {
        return view("app.registration");
    }
	public function viewlogin()
    {
        return view("app.login");
    }


}
