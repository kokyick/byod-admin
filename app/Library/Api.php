<?php
namespace App\Library;

use Illuminate\Http\Request;


class Api
{
	const server = "http://byod-server20171008041155.azurewebsites.net/";

	public static function postLogin($username, $password){
		$client = new \GuzzleHttp\Client();

		$result=$client->request('POST', self::server . 'Token', [
			'form_params' => [
				'grant_type' => "password",
				'username' => $username,
				'password' => $password
			]
		]);
		return $result;
	}

	public static function getRequest($link)
	{

		$client = new \GuzzleHttp\Client();

		$url = self::server . "api/" . $link;

		$request = $client->request('GET', $url);

		$response = $request->getBody()->getContents();

		return ($response);
	}
	public static function postRequest($link, $myBody )
	{

		$client = new \GuzzleHttp\Client();
		
		$url = self::server . "api/" . $link;

		//$myBody['name'] = "Demo";

		$request = $client->post($url,  ['form_params'=>$myBody]);

		$response = $request->getBody()->getContents();


	}
	public static function putRequest($link, $myBody)
	{

		$client = new \GuzzleHttp\Client();
		
		$url = self::server . "api/" . $link;

		//$myBody['name'] = "Demo";

		$request = $client->put($url,  ['form_params'=>$myBody]);

		$response = $request->getBody()->getContents();


	}
	public static function deleteRequest($link)
	{

		$client = new \GuzzleHttp\Client();
		
		$url = self::server . "api/" . $link;

		$request = $client->delete($url);

		$response = $request->getBody()->getContents();


		dd($response);

	}
}
