{extends file="main.tpl"}

{block name=top}

<div class="bottom-margin">
<form action="{$conf->action_root}specSave" method="post" class="pure-form pure-form-aligned">
	<fieldset>
		<legend>Wartość specyfikacji</legend>
		<div class="pure-control-group">
            <label for="wartosc">wartosc</label>
            <input id="wartosc" type="text" placeholder="wartosc" name="wartosc" value="{$form->wartosc}">
        </div>
		<div class="pure-controls">
			<input type="submit" class="pure-button pure-button-primary" value="Zapisz"/>
			<a class="pure-button button-secondary" href="{$conf->action_root}companyList">Powrót</a>
		</div>
	</fieldset>
    <input type="hidden" name="id" value="{$form->id}">
</form>	
</div>

{/block}