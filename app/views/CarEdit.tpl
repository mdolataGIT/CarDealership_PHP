{extends file="main.tpl"}

{block name=top}

<div class="bottom-margin">
<form action="{$conf->action_root}carSave/{$companyId}" method="post" class="pure-form pure-form-aligned">
	<fieldset>
		<legend>Dane samochodu</legend>
		<div class="pure-control-group">
            <label for="marka">marka</label>
            <input id="marka" type="text" placeholder="marka" name="marka" value="{$form->marka}">
        </div>
		<div class="pure-control-group">
            <label for="model">model</label>
            <input id="model" type="text" placeholder="model" name="model" value="{$form->model}">
        </div>
		<div class="pure-control-group">
            <label for="rejstracja">rejstracja</label>
            <input id="rejstracja" type="text" placeholder="rejstracja" name="rejstracja" value="{$form->rejstracja}">
        </div>
        	<div class="pure-control-group">
            <label for="pojemnosc">pojemność</label>
            <input id="pojemnosc" type="text" placeholder="pojemnosc" name="pojemnosc" value="{$form->pojemnosc}">
        </div>
        	<div class="pure-control-group">
            <label for="moc">moc</label>
            <input id="moc" type="text" placeholder="moc" name="moc" value="{$form->moc}">
        </div>
        	<div class="pure-control-group">
            <label for="bezwypadkowy">bezwypadkowy</label>
            <input id="bezwypadkowy" type="checkbox" name="bezwypadkowy" value="1" {if $form->bezwypadkowy}checked="checked"{/if}>
        </div>
        	<div class="pure-control-group">
            <label for="rodzajpaliwa">rodzaj paliwa</label>
            <input id="rodzajpaliwa" type="text" placeholder="rodzajpaliwa" name="rodzajpaliwa" value="{$form->rodzajpaliwa}">
        </div>
        	<div class="pure-control-group">
            <label for="opis">opis</label>
            <input id="opis" type="text" placeholder="opis" name="opis" value="{$form->opis}">
        </div>
		<div class="pure-controls">
			<input type="submit" class="pure-button pure-button-primary" value="Zapisz"/>
			<a class="pure-button button-secondary" href="{$conf->action_root}carList/{$companyId}">Powrót</a>
		</div>
	</fieldset>
    <input type="hidden" name="id" value="{$form->id}">
    <input type="hidden" name="idfirma" value="{$form->idfirma}">
</form>	
</div>

{/block}