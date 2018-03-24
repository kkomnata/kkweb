<?php
/*

	KKomnata Web Service
	Made by Asterleen @ 2018
	https://asterleen.com

*/

function mknonce($len = 64)
{
	$SNChars = '0123456789qwertyuiopasdfghjklzxcvbnmQWERTYUIOPASDFGHJKLZXCVBNM';
	$SNCCount = strlen($SNChars);
	$s = '';
	while (strlen($s) < $len)
	{
		$s .= $SNChars[random_int(0, $SNCCount-1)];
	}
	return $s;
}

function curl_request ($url, $type = 'get', $data = Array())
{
	$curl = curl_init();

	if($curl)
	{
		curl_setopt($curl, CURLOPT_PROTOCOLS, CURLPROTO_HTTP | CURLPROTO_HTTPS);
		curl_setopt($curl, CURLOPT_URL, $url.($type == 'get' ? '?'.http_build_query($data) : ''));
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($curl, CURLOPT_TIMEOUT, 5);
		curl_setopt($curl, CURLOPT_USERAGENT, 'KKomnata Webserver');
		
		if ($type == 'post')
		{
			curl_setopt($curl, CURLOPT_POST, true);
			curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
		}
		
		$out = curl_exec($curl);
		curl_close($curl);
		return (empty ($out)) ? false : $out;
	} else
		return false;
}

function normalize_name($name)
{
	return preg_replace('/\s/', '_', $name);
}