{extends file="main.tpl"}

{block name=top}

<div class="bottom-margin">
<form action="{$conf->action_root}photoSave" method="post" class="pure-form pure-form-aligned">
	<fieldset>
		<legend>Wartość specyfikacji</legend>
		<div class="pure-control-group">
            <label for="url">url</label>
            <input id="url" type="text" placeholder="url" name="url" value="{$form->url}">
        </div>
		<div class="pure-controls">
			<input type="submit" class="pure-button pure-button-primary" value="Zapisz"/>
			<a class="pure-button button-secondary" href="{$conf->action_root}photoList">Powrót</a>
		</div>
	</fieldset>
    <input type="hidden" name="id" value="{$form->id}">
</form>	
</div>

{/block}