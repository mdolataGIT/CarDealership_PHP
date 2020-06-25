{extends file="main.tpl"}

{block name=top}

<div class="bottom-margin">
<form action="{$conf->action_root}photoSave/{$carId}" method="post" class="pure-form pure-form-aligned">
	<fieldset>
		<legend>Wartość specyfikacji</legend>
		<div class="pure-control-group">
            <label for="url">url</label>
            <input id="url" type="text" placeholder="url" name="url" value="{$form->url}">
        </div>
		<div class="pure-controls">
			<input type="submit" class="pure-button pure-button-primary" value="Zapisz"/>
			<a class="pure-button button-secondary" href="{$conf->action_root}photoList/{$carId}">Powrót</a>
		</div>
	</fieldset>
    <input type="hidden" name="id" value="{$form->id}">
    <input type="hidden" name="idsamochod" value="{$form->idsamochod}">
</form>	
</div>

{/block}