<?php
/* Smarty version 3.1.34-dev-7, created on 2020-06-24 19:00:44
  from 'D:\xpp\Nowy folder\htdocs\Projekt_Maciej_Dolata_komis\app\views\PhotoEdit.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5ef386bc42fb82_26823166',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'de76371ee03010875d92968f00ec90f63c6d6dde' => 
    array (
      0 => 'D:\\xpp\\Nowy folder\\htdocs\\Projekt_Maciej_Dolata_komis\\app\\views\\PhotoEdit.tpl',
      1 => 1593018041,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ef386bc42fb82_26823166 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_4521320385ef386bc3ff3f9_71778235', 'top');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "main.tpl");
}
/* {block 'top'} */
class Block_4521320385ef386bc3ff3f9_71778235 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'top' => 
  array (
    0 => 'Block_4521320385ef386bc3ff3f9_71778235',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


<div class="bottom-margin">
<form action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
photoSave/<?php echo $_smarty_tpl->tpl_vars['carId']->value;?>
" method="post" class="pure-form pure-form-aligned">
	<fieldset>
		<legend>Wartość specyfikacji</legend>
		<div class="pure-control-group">
            <label for="url">url</label>
            <input id="url" type="text" placeholder="url" name="url" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->url;?>
">
        </div>
		<div class="pure-controls">
			<input type="submit" class="pure-button pure-button-primary" value="Zapisz"/>
			<a class="pure-button button-secondary" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
photoList/<?php echo $_smarty_tpl->tpl_vars['carId']->value;?>
">Powrót</a>
		</div>
	</fieldset>
    <input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->id;?>
">
    <input type="hidden" name="idsamochod" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->idsamochod;?>
">
</form>	
</div>

<?php
}
}
/* {/block 'top'} */
}
