/*

	KKomnata Web Service
	Made by Asterleen @ 2018
	https://asterleen.com

*/

function error (text)
{
	alert (text); // TODO: make error messages
}

// uses implementation from https://github.com/bgrins/TinyColor
function getBrightness (color)
{
	color = color.substring(1);

	var 
		rgbi = parseInt(c, 16),

		rgb = {
			r : (rgbi >> 16) & 0xff,
			g : (rgbi >>  8) & 0xff,
			b : (rgbi >>  0) & 0xff
		};

    return (rgb.r * 299 + rgb.g * 587 + rgb.b * 114) / 1000;
}

function setColors (main, accent)
{

}

function core_init()
{
	
}

var localStorageAvailable = isLSAvailable();

$(document).ready(radioInit);