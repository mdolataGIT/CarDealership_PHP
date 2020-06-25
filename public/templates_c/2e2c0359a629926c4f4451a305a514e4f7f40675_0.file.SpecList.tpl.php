<?php
/* Smarty version 3.1.34-dev-7, created on 2020-06-25 14:17:09
  from 'D:\xpp\Nowy folder\htdocs\Projekt_Maciej_Dolata_komis\app\views\SpecList.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5ef495c54f49e6_81468198',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2e2c0359a629926c4f4451a305a514e4f7f40675' => 
    array (
      0 => 'D:\\xpp\\Nowy folder\\htdocs\\Projekt_Maciej_Dolata_komis\\app\\views\\SpecList.tpl',
      1 => 1593087425,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ef495c54f49e6_81468198 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_15768696235ef495c549cb21_34929494', 'top');
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_12690026275ef495c54b16f9_74712323', 'bottom');
?>


<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, "main.tpl");
}
/* {block 'top'} */
class Block_15768696235ef495c549cb21_34929494 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'top' => 
  array (
    0 => 'Block_15768696235ef495c549cb21_34929494',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


<div class="bottom-margin">
<form class="pure-form pure-form-stacked" action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
specList">
	<legend>Opcje wyszukiwania</legend>
	<fieldset>
		<input type="text" placeholder="wartosc" name="sf_wartosc" value="<?php echo $_smarty_tpl->tpl_vars['searchForm']->value->wartosc;?>
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
class Block_12690026275ef495c54b16f9_74712323 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'bottom' => 
  array (
    0 => 'Block_12690026275ef495c54b16f9_74712323',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


<div class="bottom-margin">
<a class="button-success pure-button" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
specelemNew/<?php echo $_smarty_tpl->tpl_vars['carId']->value;?>
">+ Nowy element</a>
<a class="button-secondary pure-button" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
specNew/<?php echo $_smarty_tpl->tpl_vars['carId']->value;?>
">Edytuj</a>
<a class="button-warning pure-button" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
photoList/<?php echo $_smarty_tpl->tpl_vars['carId']->value;?>
">Zdjęcia</a>
</div>	

<table id="tab_specyfikacja" class="pure-table pure-table-bordered">
<thead>
	<tr>
                <th>nazwa</th>
		<th>wartość</th>
                <th>usuń</th>
	</tr>
</thead>
<tbody>
<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['specyfikacja']->value, 'p');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['p']->value) {
?>
<tr><td><?php echo $_smarty_tpl->tpl_vars['p']->value["nazwa"];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['p']->value["wartosc"];?>
</td><td><a class="button-small pure-button button-error" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
specDelete/<?php echo $_smarty_tpl->tpl_vars['carId']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['p']->value["idspecyfikacja"];?>
">Usuń</a>&nbsp;</td></tr>
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
