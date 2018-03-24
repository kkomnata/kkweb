<?php
/*

	KKomnata Web Service
	Made by Asterleen @ 2018
	https://asterleen.com

*/

if (!empty($_GET['error']))
{
	finish (2, sprintf('[%s] %s, %s', $_GET['error'], $_GET['error_reason'], $_GET['error_description']));
}

$code = $_GET['code'];

if (empty($code))
{
	header ('HTTP/1.1 500 Server Error');
	finish(1, 'Bad request');
}


$res = curl_request(
					'https://oauth.vk.com/access_token',
					'get',
					Array(
							'client_id'     => VK_CLIENT_ID,
							'client_secret' => VK_CLIENT_SECRET,
							'redirect_uri'  => VK_REDIRECT_URI,
							'code'          => $code
						)
					);

$json = json_decode($res, true);
if (empty($json))
{
	error_log('WARNING: Bad VK response: '.$res);
	finish(1, 'Bad response from VK auth server');
}
	else
if (!empty($json['error']))
{
	finish (2, sprintf('Authentication error: %s (%s)', $json['error'], $json['error_description']));
}
	else
{
	$res = curl_request('https://api.vk.com/method/users.get', 'get',
					     Array('user_ids' => $json['user_id']
					     	   'v=' => VK_API_VERSION));

	$uinfo = json_decode($res, true);

	if (!empty($uinfo['error']))
	{
		finish (2, sprintf('Stage 2 auth error: %s (%s)', $uinfo['error'], $uinfo['error_description']));
	}
	else
		processIncomingLogin('vk_'.(int)$json['user_id'], $uinfo['response'][0]['first_name']);
}