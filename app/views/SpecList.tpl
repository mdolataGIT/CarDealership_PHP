{extends file="main.tpl"}

{block name=top}

<div class="bottom-margin">
<form class="pure-form pure-form-stacked" action="{$conf->action_url}specList">
	<legend>Opcje wyszukiwania</legend>
	<fieldset>
		<input type="text" placeholder="wartosc" name="sf_wartosc" value="{$searchForm->wartosc}" /><br />
		<button type="submit" class="pure-button pure-button-primary">Filtruj</button>
	</fieldset>
</form>
</div>	

{/block}

{block name=bottom}

<div class="bottom-margin">
<a class="button-success pure-button" href="{$conf->action_root}specNew">+ Nowa wartość</a>
</div>	

<table id="tab_specyfikacja" class="pure-table pure-table-bordered">
<thead>
	<tr>
		<th>wartość</th>
		<th>opcje</th>
	</tr>
</thead>
<tbody>
{foreach $specyfikacja as $p}
{strip}
	<tr>
		<td>{$p["wartosc"]}</td>
		<td>
			<a class="button-small pure-button button-secondary" href="{$conf->action_url}specEdit/{$p['idspecyfikacja']}">Edytuj</a>
			&nbsp;
			<a class="button-small button-error pure-button" href="{$conf->action_url}specDelete/{$p['idspecyfikacja']}">Usuń</a>
                        &nbsp;
			<a class="button-small pure-button button-warning" href="{$conf->action_url}specEdit/{$p['idspecyfikacja']}">Wejdź</a>
		</td>
	</tr>
{/strip}
{/foreach}
</tbody>
</table>

{/block}

