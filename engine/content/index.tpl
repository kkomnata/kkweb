<div id="chat">
	<div id="chat-messages">
	
	</div>

	<div id="chat-panel">
		<table id="chat-controls">
			<tr>
				<td id="chat-settings-button">
				</td>

				<td id="chat-message-field">
					<textarea id="chat-text" placeholder="Enter — отправить сообщение"></textarea>
				</td>

				<td id="chat-unauthorized">
					Для использования чата необходимо авторизоваться через <a href="https://oauth.vk.com/authorize?client_id=<?php echo(VK_CLIENT_ID); ?>&display=page&redirect_uri=<?php echo(VK_REDIRECT_URI); ?>&response_type=code">ВКонтакте</a> или <a href="https://www.facebook.com/v2.12/dialog/oauth?client_id=<?php echo(FB_CLIENT_ID); ?>&redirect_uri=<?php echo(FB_REDIRECT_URI); ?>&state=kk&response_type=code">Facebook</a>.
				</td>
			</tr>
		</table>
	</div>
</div>

<div id="chat-settings-overlay" onclick="toggleSettings()"></div>
<div id="chat-settings">
	<div id="settings-close">
		[<a href="javascript:void(0)" onclick="toggleSettings()">закрыть</a>]
	</div>
	<div class="settings-control">
		<input type="text" placeholder="Ник (только буквы и цифры)" id="username" name="username" autocomplete="off">
	</div>
	<!--
	<div class="settings-control">
		<label><input type="checkbox" id="play-sound" onchange="setSoundState(this)">Звук</label>
	</div>
	-->
	<div class="settings-control">
		Менять заголовок:
		<select id="title-change-level" onchange="setTitleLevel(this)">
			<option value="0">никогда</option>
			<option value="1">если мне написали</option>
			<option value="2">при любом сообщении</option>
		</select>
	</div>
</div>

<script type="text/javascript" src="/assets/saria.js"></script>
<script type="text/javascript">
	$(document).ready(function() {saria_init('<?php echo ((preg_match('/^[a-zA-Z0-9]+$/', $_GET['auth']) == 1) ? $_GET['auth'] : null);?>'); });
</script>