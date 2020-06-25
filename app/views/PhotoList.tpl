{extends file="main.tpl"}

{block name=top}

{/block}

{block name=bottom}

<div class="bottom-margin">
<a class="button-success pure-button" href="{$conf->action_root}photoNew/{$carId}">+ Nowe zdjęcie</a>
<a class="button-warning pure-button" href="{$conf->action_url}specList/{$carId}">Specyfikacja</a>
</div>	

<table id="tab_zdjecie" class="pure-table pure-table-bordered">
<thead>
	<tr>
		<th>zdjęcia</th>
		<th>opcje</th>
	</tr>
</thead>
<tbody>
{foreach $zdjecie as $p}
{strip}
	<tr>
		
            <td> <img src={$p["url"]} alt="alternatetext" width="1024" height="720"> <td>
                
			<a class="button-small pure-button button-secondary" href="{$conf->action_url}photoEdit/{$p['idzdjecie']}">Edytuj</a>
			&nbsp;
			<a class="button-small button-error pure-button" href="{$conf->action_url}photoDelete/{$p['idzdjecie']}/{$p['idsamochod']}">Usuń</a>
                        
	</tr>
{/strip}
{/foreach}
</tbody>
</table>

{/block}

