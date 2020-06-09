{extends file="main.tpl"}

{block name=top}

<div class="bottom-margin">
<form class="pure-form pure-form-stacked" action="{$conf->action_url}photoList">
	<legend>Opcje wyszukiwania</legend>
	<fieldset>
		<input type="text" placeholder="url" name="sf_url" value="{$searchForm->url}" /><br />
		<button type="submit" class="pure-button pure-button-primary">Filtruj</button>
	</fieldset>
</form>
</div>	

{/block}

{block name=bottom}

<div class="bottom-margin">
<a class="button-success pure-button" href="{$conf->action_root}photoNew">+ Nowe zdjęcie</a>
</div>	

<table id="tab_zdjecie" class="pure-table pure-table-bordered">
<thead>
	<tr>
		<th>url</th>
		<th>opcje</th>
	</tr>
</thead>
<tbody>
{foreach $zdjecie as $p}
{strip}
	<tr>
		<td>{$p["url"]}</td>
		<td>
			<a class="button-small pure-button button-secondary" href="{$conf->action_url}photoEdit/{$p['idzdjecie']}">Edytuj</a>
			&nbsp;
			<a class="button-small button-error pure-button" href="{$conf->action_url}photoDelete/{$p['idzdjecie']}">Usuń</a>
                        &nbsp;
			<a class="button-small pure-button button-warning" href="{$conf->action_url}photoEdit/{$p['idzdjecie']}">Wejdź</a>
		</td>
	</tr>
{/strip}
{/foreach}
</tbody>
</table>

{/block}

