<div id="chat">
	<div id="chat-messages">
	
	</div>

	<div id="chat-panel">
		<table id="chat-controls">
			<tr>
				<td id="chat-settings-button">
				</td>

				<td id="chat-message-field">
					<textarea id="chat-text" placeholder="press enter"></textarea>
				</td>

				<td id="chat-unauthorized">
					Для использования чата необходимо авторизоваться через <a href="https://oauth.vk.com/authorize?client_id=<?php echo(VK_CLIENT_ID); ?>&display=page&redirect_uri=<?php echo(VK_REDIRECT_URI); ?>&response_type=code">ВКонтакте</a> или <a href="https://www.facebook.com/v2.12/dialog/oauth?client_id=<?php echo(FB_CLIENT_ID); ?>&redirect_uri=<?php echo(FB_REDIRECT_URI); ?>&state=kk&response_type=code">Facebook</a>.
				</td>
			</tr>
		</table>
	</div>
</div>

<script type="text/javascript" src="/assets/saria.js"></script>
<script type="text/javascript">
	$(document).ready(function() {saria_init('<?php echo ((preg_match('/^[a-zA-Z0-9]+$/', $_GET['auth']) == 1) ? $_GET['auth'] : null);?>'); });
</script>