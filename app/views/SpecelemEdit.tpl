{extends file="main.tpl"}

{block name=top}

<div class="bottom-margin">
<form action="{$conf->action_root}specelemSave/{$carId}" method="post" class="pure-form pure-form-aligned">
	<fieldset>
		<legend>Element specyfikacji</legend>
		<div class="pure-control-group">
            <label for="nazwa">nazwa</label>
            <input id="nazwa" type="text" placeholder="nazwa" name="nazwa" value="{$form->nazwa}">
        </div>
		<div class="pure-control-group">
            <label for="typ">typ</label>
            <input id="typ" type="text" placeholder="typ" name="typ" value="{$form->typ}">
        </div>
		<div class="pure-controls">
			<input type="submit" class="pure-button pure-button-primary" value="Zapisz"/>
			<a class="pure-button button-secondary" href="{$conf->action_root}specList/{$carId}">Powrót</a>
		</div>
	</fieldset>
    <input type="hidden" name="id" value="{$form->id}">
    <input type="hidden" name="carId" value="{$carId}">
</form>	
</div>

{/block}