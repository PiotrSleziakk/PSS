{extends file="main.tpl"}

{block name=content}
<form action="{$conf->action_url}login" method="post"  class="pure-form pure-form-stacked">
	<legend>Logowanie do systemu</legend>
	<fieldset>
        <div class="pure-control-group">
			<label for="id_login">Login: </label>
			<input id="id_login" type="text" name="login"/>
		</div>
        <div class="pure-control-group">
			<label for="id_pass">Hasło: </label>
			<input id="id_pass" type="password" name="pass" /><br />
		</div>
		<div class="pure-controls">
                        <input type="submit" value="zaloguj" class="button primary">
		</div>
	</fieldset>
</form>	

{include file='messages.tpl'}

{/block}
