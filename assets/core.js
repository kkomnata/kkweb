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
		rgbi = parseInt(color, 16),

		rgb = {
			r : (rgbi >> 16) & 0xff,
			g : (rgbi >>  8) & 0xff,
			b : (rgbi >>  0) & 0xff
		};

    return (rgb.r * 299 + rgb.g * 587 + rgb.b * 114) / 1000;
}

function setColors (main, accent)
{
	// Backgrounds
	$('html, body, #top, #chat-panel, #chat-text, #chat-settings, #chat-settings input, #chat-settings select').css('background', main);
	$('#settings-close').css('background', accent);
	
	// Accents
	$('html, body, a, #chat-text, #chat-settings, #chat-settings input, #chat-settings select').css('color', accent);
	$('#settings-close, #settings-close a').css('color', main);
	$('.chat-message.forme').css('border-left', '3px solid #'+accent);

	// SVG icons
	$('.player-control-icon polygon').css('stroke', accent);
	$('.player-control-icon path').css('stroke', accent);
	$('#chat-settings-icon path').css('fill', accent);

	console.log (getBrightness(main));

	var isBgDark = (getBrightness(main) < 112) ? true : false,
		conditionalColors = {
			error         : (isBgDark) ? '#ffd3d3' : '#7a0404',
			warning       : (isBgDark) ? '#fffbd3' : '#905f0a',
			info          : (isBgDark) ? '#d3fff8' : '#0111c5',
			neutral       : (isBgDark) ? '#f0f0f0' : '#202020',
			message_id    : (isBgDark) ? '#959595' : '#2f2f2f',
			message_name  : (isBgDark) ? '#a0a0a0' : '#141414',
			message_hl    : (isBgDark) ? '#303030' : '#c0c0c0',
			message_forme : (isBgDark) ? '#3c3c3c' : '#b5b5b5'
		};

	$('.service-message.neutral').css('color', conditionalColors.neutral);
	$('.service-message.neutral').css('border-left', '3px solid '+conditionalColors.neutral);
	$('.service-message.error').css('color', conditionalColors.error);
	$('.service-message.error').css('border-left', '3px solid '+conditionalColors.error);
	$('.service-message.warning').css('color', conditionalColors.warning);
	$('.service-message.warning').css('border-left', '3px solid '+conditionalColors.warning);
	$('.service-message.info').css('color', conditionalColors.info);
	$('.service-message.info').css('border-left', '3px solid '+conditionalColors.info);
	$('.chat-message-id').css('color', conditionalColors.message_id);
	$('.chat-message-name').css('color', conditionalColors.message_name);
	$('.chat-message.highlighted').css('background', conditionalColors.message_hl+'!important');
	$('.chat-message.forme').css('background', conditionalColors.message_forme);
	


	$.stylesheet('.service-message.neutral').css('color', conditionalColors.neutral);
	$.stylesheet('.service-message.neutral').css('border-left', '3px solid '+conditionalColors.neutral);
	$.stylesheet('.service-message.error').css('color', conditionalColors.error);
	$.stylesheet('.service-message.error').css('border-left', '3px solid '+conditionalColors.error);
	$.stylesheet('.service-message.warning').css('color', conditionalColors.warning);
	$.stylesheet('.service-message.warning').css('border-left', '3px solid '+conditionalColors.warning);
	$.stylesheet('.service-message.info').css('color', conditionalColors.info);
	$.stylesheet('.service-message.info').css('border-left', '3px solid '+conditionalColors.info);
	$.stylesheet('.chat-message-id').css('color', conditionalColors.message_id);
	$.stylesheet('.chat-message-name').css('color', conditionalColors.message_name);
	$.stylesheet('.chat-message.highlighted').css('background', conditionalColors.message_hl+'!important');
	$.stylesheet('.chat-message.forme').css('background', conditionalColors.message_forme);

}

function core_init()
{
	
}

var localStorageAvailable = isLSAvailable();

$(document).ready(radioInit);