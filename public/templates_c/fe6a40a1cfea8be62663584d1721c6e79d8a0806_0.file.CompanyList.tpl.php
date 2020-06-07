<?php
/* Smarty version 3.1.34-dev-7, created on 2020-06-07 20:34:33
  from 'D:\xpp\Nowy folder\htdocs\Projekt_Maciej_Dolata_komis\app\views\CompanyList.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5edd33393bafc2_58919269',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'fe6a40a1cfea8be62663584d1721c6e79d8a0806' => 
    array (
      0 => 'D:\\xpp\\Nowy folder\\htdocs\\Projekt_Maciej_Dolata_komis\\app\\views\\CompanyList.tpl',
      1 => 1591554670,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5edd33393bafc2_58919269 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_594597625edd3339358760_72655565', 'top');
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_17648080155edd333936bb19_33501939', 'bottom');
?>


<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, "main.tpl");
}
/* {block 'top'} */
class Block_594597625edd3339358760_72655565 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'top' => 
  array (
    0 => 'Block_594597625edd3339358760_72655565',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


<div class="bottom-margin">
<form class="pure-form pure-form-stacked" action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
companyList">
	<legend>Opcje wyszukiwania</legend>
	<fieldset>
		<input type="text" placeholder="nazwa" name="sf_nazwa" value="<?php echo $_smarty_tpl->tpl_vars['searchForm']->value->nazwa;?>
" /><br />
		<button type="submit" class="pure-button pure-button-primary">Filtruj</button>
	</fieldset>
</form>
</div>	

<?php
}
}
/* {/block 'top'} */
/* {block 'bottom'} */
class Block_17648080155edd333936bb19_33501939 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'bottom' => 
  array (
    0 => 'Block_17648080155edd333936bb19_33501939',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


<div class="bottom-margin">
<a class="button-success pure-button" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
companyNew">+ Nowa firma</a>
</div>	

<table id="tab_firma" class="pure-table pure-table-bordered">
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
<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['firma']->value, 'p');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['p']->value) {
?>
<tr><td><?php echo $_smarty_tpl->tpl_vars['p']->value["nazwa"];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['p']->value["miejscowosc"];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['p']->value["adres"];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['p']->value["arch"];?>
</td><td><a class="button-small pure-button button-secondary" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
companyEdit/<?php echo $_smarty_tpl->tpl_vars['p']->value['idfirma'];?>
">Edytuj</a>&nbsp;<a class="button-small button-error pure-button" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
companyDelete/<?php echo $_smarty_tpl->tpl_vars['p']->value['idfirma'];?>
">Usuń</a>&nbsp;<a class="button-small pure-button button-warning" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
carList/<?php echo $_smarty_tpl->tpl_vars['p']->value['idfirma'];?>
">Wejdź</a></td></tr>
<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
</tbody>
</table>

<?php
}
}
/* {/block 'bottom'} */
}
