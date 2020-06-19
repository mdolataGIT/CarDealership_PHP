{extends file="main.tpl"}

{block name=top}

<div class="bottom-margin">
<form action="{$conf->action_root}specSave/{$form->carId}" method="post" class="pure-form pure-form-aligned">
	<fieldset>
		<legend>Wartość specyfikacji</legend>
                {foreach $records as $r}
                    <div class="pure-control-group">      
                        <label for="spec_elem_{$r['idspec_elem']}">{$r['nazwa']}</label>
                        <input id="spec_elem_{$r['idspec_elem']}" type="text" placeholder="{$r['typ']}" name="spec_elem[{$r['idspec_elem']}]">
                    </div>
                {/foreach}
		<div class="pure-controls">
			<input type="submit" class="pure-button pure-button-primary" value="Zapisz"/>
			<a class="pure-button button-secondary" href="{$conf->action_root}specList/{$form->carId}">Powrót</a>
		</div>
	</fieldset>
    <input type="hidden" name="idsamochod" value="{$form->carId}">
</form>	
</div>

{/block}