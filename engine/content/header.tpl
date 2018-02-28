<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="description" content="ККомната. Звуки из комнаты.">
	<meta name="keywords" content="">

	<link href="https://fonts.googleapis.com/css?family=Alegreya+Sans+SC:100|Open+Sans:300,400,400i,700,700i" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="/assets/kkomnata.css">

	<script src="//static.https.cat/js/jquery.js" type="text/javascript"></script>
	<script src="//static.https.cat/js/jquery.mousewheel.js" type="text/javascript"></script>
	<script src="//static.https.cat/js/util.js" type="text/javascript"></script>
	<script src="/assets/radio.js" type="text/javascript"></script>
	<script src="/assets/core.js" type="text/javascript"></script>

	<script type="text/javascript">
		var BASE_DOMAIN = '<?php echo(BASE_DOMAIN); ?>';
	</script>

	<title><?php echo ($content['title']); ?></title>
</head>
<body>
	<div id="top">
		<div id="logo">ККомната</div>
		<div id="player">
			<div id="player-control" class="player-paused" onclick="radioToggle()"></div>
		</div>
	</div>

	<main>