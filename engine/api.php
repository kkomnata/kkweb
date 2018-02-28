<?php

array_shift($route); // we're in /api/ section

switch ($route[0])
{
	case 'auth' :
		require_once 'engine/auth.php';
		break;

	default :
		display404();
		break;
}