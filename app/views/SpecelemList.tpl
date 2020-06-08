{extends file="main.tpl"}

{block name=top}

<div class="bottom-margin">
<form class="pure-form pure-form-stacked" action="{$conf->action_url}specelemList">
	<legend>Opcje wyszukiwania</legend>
	<fieldset>
		<input type="text" placeholder="nazwa" name="sf_nazwa" value="{$searchForm->nazwa}" /><br />
		<button type="submit" class="pure-button pure-button-primary">Filtruj</button>
	</fieldset>
</form>
</div>	

{/block}

{block name=bottom}

<div class="bottom-margin">
<a class="button-success pure-button" href="{$conf->action_root}specelemNew">+ Nowy element specyfikacji</a>
</div>	

<table id="tab_samochod" class="pure-table pure-table-bordered">
<thead>
	<tr>
		<th>nazwa</th>
		<th>typ</th>
                <th>opcje</th>
	</tr>
</thead>
<tbody>
{foreach $spec_elem as $p}
{strip}
	<tr>
		<td>{$p["nazwa"]}</td>
		<td>{$p["typ"]}</td>
		<td>
			<a class="button-small pure-button button-secondary" href="{$conf->action_url}specelemEdit/{$p['idspec_elem']}">Edytuj</a>
			&nbsp;
			<a class="button-small button-error pure-button" href="{$conf->action_url}specelemDelete/{$p['idspec_elem']}">Usuń</a>
                        &nbsp;
			<a class="button-small pure-button button-warning" href="{$conf->action_url}specelemEdit/{$p['idspec_elem']}">Wejdź</a>
		</td>
	</tr>
{/strip}
{/foreach}
</tbody>
</table>

{/block}

