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
	//Dish List
	$PList =Api::getRequest("MerchantProducts");
	$DishList = json_decode( $PList, true );
	//Return
    return view("app.menus", compact('MenuList','FoodTypeList','DishList'));
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
	//Dish List
	$PList =Api::getRequest("MerchantProducts");
	$DishList = json_decode( $PList, true );
	//Return
    return view("app.menu", compact('MenuList','FoodTypeList','OutData','DishList'));
  }
  public function viewfooditem($id)
  {
	//Single Menus
	$Food =Api::getRequest("GetSingleProduct?product_id=" . $id);
	$FoodItem = json_decode( $Food, true );
	//dd($FoodItem);
	//Return
	return $FoodItem;
  }
  public function viewsinglerestaurant($id)
  {
	//Single Menus
	$Outlet =Api::getRequest("Outlets/" . $id);
	$OutletItem = json_decode( $Outlet, true );
	return $OutletItem;
  }
  public function editmenu(Request $request)
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
	//body
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
  public function adddish(Request $request)
  {
	//Save edits
	$outId=$request->outlet_id;
	$itemid=$request->aitemfood_type;

	//body
	$myBody['outlet_id'] = $outId;
	$myBody['merchant_product_id'] = $itemid;
	//dd($myBody);
	$result =Api::postRequest("Products/",$myBody);
    return redirect()->route('menus', ['id'=>$outId]);
  }
  public function addmenu(Request $request)
  {
	//Save edits
	$outId=$request->outlet_id;
	$itemname=$request->aitemname;
	$itemprice=$request->aitemprice;
	$itemproduct_image=$request->aitemproduct_image;
	$itemfood_type=$request->aitemfood_type;
	$avg_ratings=0;

	//body
	$myBody['merchant_id'] = 3;
	$myBody['food_type'] = $itemfood_type;
	$myBody['avg_ratings'] = $avg_ratings;
	$myBody['name'] = $itemname;
	$myBody['price'] = $itemprice;
	$myBody['product_image'] = $itemproduct_image;
	//dd($myBody);
	$result =Api::postRequest("MerchantProducts/",$myBody);
    return redirect()->route('menus', ['id'=>$outId]);
  }
  public function outletedit(Request $request)
  {
	//Save edits
	$itemid=$request->itemid;
	$featured_photo=$request->itemfeatured_photo;
	$name=$request->itemnamee;
	$streetname=$request->itemstreetname;
	$unit_no=$request->itemunit_no;
	$streetname=$request->itemstreetname;
	$postal_code=$request->itempostal_code;
	$contact_no=$request->itemcontact_no;

	$merchant_id=$request->itemmerchant_id;

	//get foreign keys
	$Outlet =Api::getRequest("Outlets?outlet_id=" . $itemid);
	$OutletArray=json_decode($Outlet, true);

	$myBody['outlet_id'] = $itemid;
	$myBody['featured_photo'] = $featured_photo;
	$myBody['name'] = $name;
	$myBody['streetname'] = $streetname;
	$myBody['unit_no'] = $unit_no;
	$myBody['postal_code'] = $postal_code;
	$myBody['contact_no'] = $contact_no;
	$url ="https://maps.googleapis.com/maps/api/geocode/xml?address=" . $postal_code . "&sensor=false";
	$result = simplexml_load_file($url);;
	$myBody['lat'] = $result->result->geometry->location->lat;
	$myBody['lon'] = $result->result->geometry->location->lng;

	$myBody['opening_time'] = $OutletArray['opening_time'];
	$myBody['closing_time'] = $OutletArray['closing_time'];
	$myBody['last_review_time'] = $OutletArray['last_review_time'];
	$myBody['avg_ratings'] = $OutletArray['avg_ratings'];
	$myBody['merchant_id'] = $OutletArray['merchant_id'];
	$result =Api::putRequest("Outlets/" . $itemid,$myBody);
    return redirect()->route('menus', ['id'=>$itemid]);
  }
}