{extends file="main.tpl"}

{block name=top}

<div class="bottom-margin">
<form action="{$conf->action_root}companySave" method="post" class="pure-form pure-form-aligned">
	<fieldset>
		<legend>Dane firmy</legend>
		<div class="pure-control-group">
            <label for="nazwa">nazwa</label>
            <input id="nazwa" type="text" placeholder="nazwa" name="nazwa" value="{$form->nazwa}">
        </div>
		<div class="pure-control-group">
            <label for="miejscowosc">miejscowosc</label>
            <input id="miejscowosc" type="text" placeholder="miejscowosc" name="miejscowosc" value="{$form->miejscowosc}">
        </div>
		<div class="pure-control-group">
            <label for="adres">adres</label>
            <input id="adres" type="text" placeholder="adres" name="adres" value="{$form->adres}">
        </div>
        	<div class="pure-control-group">
            <label for="arch">arch</label>
            <input id="arch" type="checkbox" name="arch" value="1" {if $form->arch}checked="checked"{/if}>
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