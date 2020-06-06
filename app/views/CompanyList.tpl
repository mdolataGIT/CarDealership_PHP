{extends file="main.tpl"}

{block name=top}

<div class="bottom-margin">
<form class="pure-form pure-form-stacked" action="{$conf->action_url}companyList">
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
<a class="button-success pure-button" href="{$conf->action_root}companyNew">+ Nowa firma</a>
</div>	

<table id="tab_people" class="pure-table pure-table-bordered">
<thead>
	<tr>
		<th>nazwa</th>
		<th>miejscowosc</th>
		<th>adres</th>
                <th>arch</th>
		<th>opcje</th>
	</tr>
</thead>
<tbody>
{foreach $firma as $p}
{strip}
	<tr>
		<td>{$p["nazwa"]}</td>
		<td>{$p["miejscowosc"]}</td>
		<td>{$p["adres"]}</td>
                <td>{$p["arch"]}</td>
		<td>
			<a class="button-small pure-button button-secondary" href="{$conf->action_url}companyEdit/{$p['idfirma']}">Edytuj</a>
			&nbsp;
			<a class="button-small pure-button button-warning" href="{$conf->action_url}companyDelete/{$p['idfirma']}">Usuń</a>
		</td>
	</tr>
{/strip}
{/foreach}
</tbody>
</table>

{/block}

