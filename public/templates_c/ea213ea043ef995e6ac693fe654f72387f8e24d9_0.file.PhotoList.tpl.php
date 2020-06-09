<?php
/* Smarty version 3.1.34-dev-7, created on 2020-06-09 02:55:46
  from 'D:\xpp\Nowy folder\htdocs\Projekt_Maciej_Dolata_komis\app\views\PhotoList.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5edede120d2554_98971725',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ea213ea043ef995e6ac693fe654f72387f8e24d9' => 
    array (
      0 => 'D:\\xpp\\Nowy folder\\htdocs\\Projekt_Maciej_Dolata_komis\\app\\views\\PhotoList.tpl',
      1 => 1591664084,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5edede120d2554_98971725 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_10746931115edede1207d5c9_99371095', 'top');
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_15936778165edede120928d5_45378533', 'bottom');
?>


<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, "main.tpl");
}
/* {block 'top'} */
class Block_10746931115edede1207d5c9_99371095 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'top' => 
  array (
    0 => 'Block_10746931115edede1207d5c9_99371095',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


<div class="bottom-margin">
<form class="pure-form pure-form-stacked" action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
photoList">
	<legend>Opcje wyszukiwania</legend>
	<fieldset>
		<input type="text" placeholder="url" name="sf_url" value="<?php echo $_smarty_tpl->tpl_vars['searchForm']->value->url;?>
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
class Block_15936778165edede120928d5_45378533 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'bottom' => 
  array (
    0 => 'Block_15936778165edede120928d5_45378533',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


<div class="bottom-margin">
<a class="button-success pure-button" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
photoNew">+ Nowe zdjęcie</a>
</div>	

<table id="tab_zdjecie" class="pure-table pure-table-bordered">
<thead>
	<tr>
		<th>url</th>
		<th>opcje</th>
	</tr>
</thead>
<tbody>
<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['zdjecie']->value, 'p');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['p']->value) {
?>
<tr><td><?php echo $_smarty_tpl->tpl_vars['p']->value["url"];?>
</td><td><a class="button-small pure-button button-secondary" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
photoEdit/<?php echo $_smarty_tpl->tpl_vars['p']->value['idzdjecie'];?>
">Edytuj</a>&nbsp;<a class="button-small button-error pure-button" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
photoDelete/<?php echo $_smarty_tpl->tpl_vars['p']->value['idzdjecie'];?>
">Usuń</a>&nbsp;<a class="button-small pure-button button-warning" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
photoEdit/<?php echo $_smarty_tpl->tpl_vars['p']->value['idzdjecie'];?>
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
