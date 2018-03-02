<?php
/*

	KKomnata Web Service
	Made by Asterleen @ 2018
	https://asterleen.com

*/

require_once 'engine/enconfig.php';
require_once 'engine/database.php';
require_once 'engine/functions.php';
require_once 'engine/interface.php';

error_reporting(E_ALL ^ E_NOTICE);

$route = explode('/', $_GET['route']);

if (empty($route[0]))
{
	$content = Array('title' => 'ККомната');
	display ('index', $content);
}
	else
{
	switch ($route[0])
	{
		case 'api' :
			require_once 'engine/api.php';
			break;

		case 'pp' :
			$content = Array ('title' => 'Privacy Policy');
			display ('pp', $content);
			break;

		default :
			display404();
		break;
	}
}