<?php
namespace App\Library;

use Illuminate\Http\Request;


class Api
{
	const server = "http://byod-server20171008041155.azurewebsites.net/";

	public static function postLogin($username, $password){
		$client = new \GuzzleHttp\Client();
		try {
			$result=$client->request('POST', self::server . 'Token', [
				'form_params' => [
					'grant_type' => "password",
					'username' => $username,
					'password' => $password
				]
			]);
		}catch (RequestException $e) {
			$result= Psr7\str($e->getRequest());
			if ($e->hasResponse()) {
				$result= Psr7\str($e->getResponse());
		}
}
		return $result;
	}

	public static function getRequest($link)
	{

		$client = new \GuzzleHttp\Client();

		$url = self::server . "api/" . $link;
		try {
			$request = $client->request('GET', $url);
			$response = $request->getBody()->getContents();
		}
		catch (RequestException $e) {
			$response= Psr7\str($e->getRequest());
			if ($e->hasResponse()) {
				$response = Psr7\str($e->getResponse());
			}
		}
		
		return ($response);
	}
	public static function postRequest($link, $myBody )
	{

		$client = new \GuzzleHttp\Client();
		
		$url = self::server . "api/" . $link;

		//$myBody['name'] = "Demo";
		try {
		$request = $client->post($url,  ['form_params'=>$myBody]);

		$response = $request->getBody()->getContents();
		}
		catch (RequestException $e) {
			$response= Psr7\str($e->getRequest());
			if ($e->hasResponse()) {
				$response = Psr7\str($e->getResponse());
			}
		}

	}
	public static function putRequest($link, $myBody)
	{

		$client = new \GuzzleHttp\Client();
		
		$url = self::server . "api/" . $link;

		//$myBody['name'] = "Demo";
		try{
		$request = $client->put($url,  ['form_params'=>$myBody]);

		$response = $request->getBody()->getContents();
		}
		catch (RequestException $e) {
			$response= Psr7\str($e->getRequest());
			if ($e->hasResponse()) {
				$response = Psr7\str($e->getResponse());
			}
		}


	}
	public static function deleteRequest($link)
	{

		$client = new \GuzzleHttp\Client();
		
		$url = self::server . "api/" . $link;
		try{
			$request = $client->delete($url);

			$response = $request->getBody()->getContents();
		}
		catch (RequestException $e) {
			$response= Psr7\str($e->getRequest());
			if ($e->hasResponse()) {
				$response = Psr7\str($e->getResponse());
			}
		}

		dd($response);

	}
}
