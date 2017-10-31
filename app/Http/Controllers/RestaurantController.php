<?php

namespace App\Http\Controllers;

use App\Library\Api;

use Illuminate\Http\Request;

use Log;

class RestaurantController extends Controller
{
  public function getRestaurant()
  {
    $RList =Api::getRequest("Outlets");
	$MList =Api::getRequest("Merchant/getMerchant");
	//dd(compact('$RestaurantList'));
	$RestaurantList = json_decode( $RList, true );
	$MerchantList =json_decode( $MList, true );
    return view("app.restaurant", compact('RestaurantList','MerchantList'));
  }
  public function viewmenu()
  {
  	//Menus
	$MList =Api::getRequest("MerchantProducts?merchant_id=" . 3);
	$MenuList = json_decode( $MList, true );
	//Food types
	$FTList =Api::getRequest("FoodTypes");
	$FoodTypeList = json_decode( $FTList, true );
	//Return
    return view("app.menus", compact('MenuList','FoodTypeList'));
  }
  public function viewmenus($id)
  {
	//Menus
	$MList =Api::getRequest("Products?outlet_id=" . $id);
	$MenuList = json_decode( $MList, true );
	//Food types
	$FTList =Api::getRequest("FoodTypes");
	$FoodTypeList = json_decode( $FTList, true );
	//Outlet data
	$OutList =Api::getRequest("Outlets/" . $id);
	$OutData = json_decode( $OutList, true );
	//Return
    return view("app.menu", compact('MenuList','FoodTypeList','OutData'));
  }
  public function viewfooditem($id)
  {
	//Single Menus
	$Food =Api::getRequest("Products?product_id=" . $id);
	$FoodItem = json_decode( $Food, true );
	//dd($FoodItem);
	//Return
	return $FoodItem;
  }
  public function EditMenu(Request $request)
  {
	//Save edits
	$outId=$request->outletid;
	$itemid=$request->itemid;
	$itemname=$request->itemname;
	$itemprice=$request->itemprice;
	$itemproduct_image=$request->itemproduct_image;
	$avg_ratings=$request->avg_ratings;

	//get foreign keys
	$Food =Api::getRequest("MerchantProducts/" . $itemid);
	$FoodArray=json_decode($Food, true);

	$myBody['merchant_product_id'] = $itemid;
	$myBody['merchant_id'] = $FoodArray['merchant_id'];
	$myBody['food_type'] = $FoodArray['food_type'];
	$myBody['avg_ratings'] = $avg_ratings;
	$myBody['name'] = $itemname;
	$myBody['price'] = $itemprice;
	$myBody['product_image'] = $itemproduct_image;
	$result =Api::putRequest("MerchantProducts/" . $itemid,$myBody);

    return redirect()->route('menus', ['id'=>$outId]);
  }
}