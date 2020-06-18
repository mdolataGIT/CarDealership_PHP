{extends file="main.tpl"}

{block name=top}

<div class="bottom-margin">
<form class="pure-form pure-form-stacked" action="{$conf->action_url}carList/{$companyId}">
	<legend>Opcje wyszukiwania</legend>
	<fieldset>
		<input type="text" placeholder="marka" name="sf_marka" value="{$searchForm->marka}" /><br />
		<button type="submit" class="pure-button pure-button-primary">Filtruj</button>
	</fieldset>
</form>
</div>	

{/block}

{block name=bottom}

<div class="bottom-margin">
<a class="button-success pure-button" href="{$conf->action_root}carNew/{$companyId}">+ Nowy samochod</a>
</div>	

<table id="tab_samochod" class="pure-table pure-table-bordered">
<thead>
	<tr>
		<th>marka</th>
		<th>model</th>
		<th>rejstracja</th>
                <th>pojemnosc</th>
                <th>moc</th>
                <th>bezwypadkowy</th>
                <th>rodzajpaliwa</th>
                <th>opis</th>
                <th>firma</th>
		<th>opcje</th>
	</tr>
</thead>
<tbody>
{foreach $samochod as $p}
{strip}
	<tr>
		<td>{$p["marka"]}</td>
		<td>{$p["model"]}</td>
		<td>{$p["rejstracja"]}</td>
                <td>{$p["pojemnosc"]}</td>
                <td>{$p["moc"]}</td>
                <td>{$p["bezwypadkowy"]}</td>
                <td>{$p["rodzajpaliwa"]}</td>
                <td>{$p["opis"]}</td>
                <td>{$p["nazwa"]}</td>
		<td>
			<a class="button-small pure-button button-secondary" href="{$conf->action_url}carEdit/{$p['idsamochod']}">Edytuj</a>
			&nbsp;
			<a class="button-small button-error pure-button" href="{$conf->action_url}carDelete/{$p['idsamochod']}">Usuń</a>
                        &nbsp;
			<a class="button-small pure-button button-warning" href="{$conf->action_url}specList/{$p['idsamochod']}">Wejdź</a>
		</td>
	</tr>
{/strip}
{/foreach}
</tbody>
</table>

{/block}

