{extends file="main.tpl"}



{block name=bottom}

<div class="bottom-margin">
<a class="pure-button button-success" href="{$conf->action_root}CarNew">+ Nowy samochod</a>
</div>	

<table id="tab_Car" class="pure-table pure-table-bordered">
<thead>
	<tr>
		<th>marka</th>
		<th>model</th>
		<th>rejstracja</th>
		<th>pojemnosc</th>
                <th>moc</th>
                <th>opis</th>
                <th>bezwypadkowy</th>
                <th>opcje</th>
	</tr>
</thead>
<tbody>
{foreach $Cars as $p}
{strip}
	<tr>
		<td>{$p["marka"]}</td>
		<td>{$p["model"]}</td>
		<td>{$p["rejstracja"]}</td>
                <td>{$p["pojemnosc"]}</td>
                <td>{$p["moc"]}</td>
                <td>{$p["opis"]}</td>
                <td>{$p["bezwypadkowy"]}</td>
		<td>
			<a class="button-small pure-button button-secondary" href="{$conf->action_url}CarEdit/{$p['idsamochod']}">Edytuj</a>
			&nbsp;
			<a class="button-small pure-button button-warning" href="{$conf->action_url}CarDelete/{$p['idsamochod']}">Usuń</a>
		</td>
	</tr>
{/strip}
{/foreach}
</tbody>
</table>

{/block}

