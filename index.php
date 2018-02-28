<?php
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

		default :
			display404();
		break;
	}
}