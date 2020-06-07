<?php
/* Smarty version 3.1.34-dev-7, created on 2020-06-07 20:30:18
  from 'D:\xpp\Nowy folder\htdocs\Projekt_Maciej_Dolata_komis\app\views\CarList.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5edd323a93f736_23081923',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7e635ba693073d84fdbd2c20ea11550a5882fbed' => 
    array (
      0 => 'D:\\xpp\\Nowy folder\\htdocs\\Projekt_Maciej_Dolata_komis\\app\\views\\CarList.tpl',
      1 => 1591554612,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5edd323a93f736_23081923 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_20494766495edd323a8b8ae4_28863759', 'top');
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_18731583615edd323a8cdb23_98893435', 'bottom');
?>


<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, "main.tpl");
}
/* {block 'top'} */
class Block_20494766495edd323a8b8ae4_28863759 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'top' => 
  array (
    0 => 'Block_20494766495edd323a8b8ae4_28863759',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


<div class="bottom-margin">
<form class="pure-form pure-form-stacked" action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
carList">
	<legend>Opcje wyszukiwania</legend>
	<fieldset>
		<input type="text" placeholder="marka" name="sf_marka" value="<?php echo $_smarty_tpl->tpl_vars['searchForm']->value->marka;?>
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
class Block_18731583615edd323a8cdb23_98893435 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'bottom' => 
  array (
    0 => 'Block_18731583615edd323a8cdb23_98893435',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


<div class="bottom-margin">
<a class="button-success pure-button" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
carNew">+ Nowy samochod</a>
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
		<th>opcje</th>
	</tr>
</thead>
<tbody>
<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['samochod']->value, 'p');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['p']->value) {
?>
<tr><td><?php echo $_smarty_tpl->tpl_vars['p']->value["marka"];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['p']->value["model"];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['p']->value["rejstracja"];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['p']->value["pojemnosc"];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['p']->value["moc"];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['p']->value["bezwypadkowy"];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['p']->value["rodzajpaliwa"];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['p']->value["opis"];?>
</td><td><a class="button-small pure-button button-secondary" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
carEdit/<?php echo $_smarty_tpl->tpl_vars['p']->value['idsamochod'];?>
">Edytuj</a>&nbsp;<a class="button-small button-error pure-button" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
carDelete/<?php echo $_smarty_tpl->tpl_vars['p']->value['idsamochod'];?>
">Usuń</a>&nbsp;<a class="button-small pure-button button-warning" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
carEdit/<?php echo $_smarty_tpl->tpl_vars['p']->value['idsamochod'];?>
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
