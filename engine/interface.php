<?php
/*

	KKomnata Web Service
	Made by Asterleen @ 2018
	https://asterleen.com

*/

function display($template, $content = Array())
{
	require_once 'engine/content/header.tpl';
	require_once 'engine/content/'.$template.'.tpl';
	require_once 'engine/content/footer.tpl';

	die();
}

function display404()
{
	$content = Array ('title' => '404 Not Found');
	header ('HTTP/1.1 404 Not Found');
	display ('404', $content);
}