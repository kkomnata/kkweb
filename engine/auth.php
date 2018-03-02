<?php
/*

	KKomnata Web Service
	Made by Asterleen @ 2018
	https://asterleen.com

*/

function finish ($status, $payload = '')
{
	if ($status == 0)
	{
		header ('Location: https://'.BASE_DOMAIN.'/?auth='.$payload);
		die ('Redirecting...');
	}
		else
		die ('<h1>Failed to authorize: '.$payload.'</h1>');
}

function processIncomingLogin ($login)
{
	$res = getToken($login);
	if (!empty($res['internal_token']))
	{
		$ntoken = '';
		if ($res['active'])
		{
			$ntoken = $res['internal_token'];
		}
		else
		{
			$ntoken = mknonce();
			updateToken ($login, $ntoken);
			setTokenActive ($ntoken, true);
		}
		
		finish(0, $ntoken);
	}
		else
	{
		$ntoken = mknonce();
		addToken($ntoken, $login);
		finish (0, $ntoken);
	}
}

array_shift($route); // we're in /api/auth/ section

switch ($route[0])
{
	case 'vk' :
		require_once 'engine/auth/vk.php';
		break;

	case 'fb' :
		require_once 'engine/auth/fb.php';
		break;
	
	default:
		display404();
		break;
}