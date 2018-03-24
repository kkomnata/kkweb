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
					'https://graph.facebook.com/v2.12/oauth/access_token',
					'get',
					Array(
							'client_id'     => FB_CLIENT_ID,
							'redirect_uri'  => FB_REDIRECT_URI,
							'client_secret' => FB_CLIENT_SECRET,
							'code'          => $code
						)
					);

$json = json_decode($res, true);
if (empty($json))
{
	error_log('WARNING: Bad Facebook response at phase 1: '.$res);
	finish(1, 'Bad response from Facebook auth server');
}
	else
{
	if (!empty($json['error']))
	{
		finish (2, sprintf('Authentication error: %s (code %s, type %s)', $json['error']['message'], $json['error']['code'], $json['error']['type']));	
	}
		else
	{
		$res = curl_request('https://graph.facebook.com/debug_token', 'get',
						    Array('input_token'  => $json['access_token'],
								  'access_token' => FB_CLIENT_ID.'|'.FB_CLIENT_SECRET));

		$access_token = $json['access_token'];

		$json = json_decode($res, true);
		if (empty($json))
		{
			error_log('WARNING: Bad Facebook response at phase 2: '.$res);
			finish(1, 'Bad response from Facebook auth server');
		}
			else
		if (!empty($json['error']))
		{
			finish (2, sprintf('Authentication error: %s (code %s, type %s)', $json['error']['message'], $json['error']['code'], $json['error']['type']));	
		}
			else
			{
				$res = curl_request('https://graph.facebook.com/me', 'get',
									Array('access_token' => $access_token));
				$uinfo = json_decode($res, true);

				if (!empty($uinfo['error']))
					finish (2, sprintf('Stage 2 auth error: %s (code %s, type %s)', $uinfo['error']['message'], $uinfo['error']['code'], $uinfo['error']['type']));
				else
					processIncomingLogin('fb_'.(int)$json['data']['user_id'], normalize_name($uinfo['name']));
			}
	}
}
