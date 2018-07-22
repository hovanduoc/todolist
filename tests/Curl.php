<?php

namespace Tests;


class Curl
{

    function get($url){
		$ch = curl_init();
		// $headers = array(
		// 'Accept: application/json',
		// 'Content-Type: application/json',

		// );
		curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (iPhone; U; CPU like Mac OS X; en) AppleWebKit/420.1 (KHTML, like Gecko) Version/3.0 Mobile/3B48b Safari/419.3');
		curl_setopt($ch, CURLOPT_URL, $url);
		//curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
		curl_setopt($ch, CURLOPT_HEADER, 0);
		//$body = '{}';

		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET"); 
		//curl_setopt($ch, CURLOPT_POSTFIELDS,$body);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_BINARYTRANSFER, true);

		// Timeout in seconds
		//curl_setopt($ch, CURLOPT_TIMEOUT, 30);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Host: graph.facebook.com'));
		$result = curl_exec($ch);
		return $result;
	}


	function post($url, $body){
		$ch = curl_init();
		$headers = array(
			'Accept: application/json',
			'Content-Type: application/json',

		);
		curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (iPhone; U; CPU like Mac OS X; en) AppleWebKit/420.1 (KHTML, like Gecko) Version/3.0 Mobile/3B48b Safari/419.3');
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
		curl_setopt($ch, CURLOPT_HEADER, 0);
		//$body = '{}';

		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST"); 
		curl_setopt($ch, CURLOPT_POSTFIELDS,http_build_query($body));
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

		// Timeout in seconds
		curl_setopt($ch, CURLOPT_TIMEOUT, 30);

		$result = curl_exec($ch);
		return $result;
	}
}
