<!DOCTYPE html>
<!-- 

	                   KKomnata Web Service
	
	  made by _____________________  __    _____________   __
	   /   | / ___/_  __/ ____/ __ \/ /   / ____/ ____/ | / /
	  / /| | \__ \ / / / __/ / /_/ / /   / __/ / __/ /  |/ / 
	 / ___ |___/ // / / /___/ _, _/ /___/ /___/ /___/ /|  /  
	/_/  |_/____//_/ /_____/_/ |_/_____/_____/_____/_/ |_/  
	                https://asterleen.com

	This project is open-source. See the source code
	at https://github.com/kkomnata/kkweb

-->
<html>
<head>
	<meta charset="utf-8">
	<meta name="description" content="ККомната. Звуки из комнаты.">
	<meta name="keywords" content="">

	<link href="https://fonts.googleapis.com/css?family=Alegreya+Sans+SC:100|Open+Sans:300,400,400i,700,700i" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="/assets/kkomnata.css">

	<script src="//static.https.cat/js/jquery.js" type="text/javascript"></script>
	<script src="//static.https.cat/js/jquery.mousewheel.js" type="text/javascript"></script>
	<script src="//static.https.cat/js/jquery.stylesheet.js" type="text/javascript"></script>
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
		<div id="logo"><a href="https://<?php echo(BASE_DOMAIN); ?>">ККомната</a></div>
		<div id="player">
			<div id="player-control" onclick="radioToggle()">
				<svg id="player-control-paused" class="player-control-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 183.93 210.54"><polygon points="2.5 4.31 2.5 206.23 178.9 105.27 2.5 4.31" style="fill:none;stroke-miterlimit:10;stroke-width:5px"/></svg>

				<svg id="player-control-playing" class="player-control-icon" viewBox="0 0 156.43 206.52"><path d="M2.5,204H53.22V2.5H2.5ZM103.21,2.5V204h50.72V2.5Z" style="fill:none;stroke-miterlimit:10;stroke-width:5px"/></svg>
			</div>
		</div>
	</div>

	<main>