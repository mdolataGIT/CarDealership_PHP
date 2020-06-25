<?php
/* Smarty version 3.1.34-dev-7, created on 2020-06-25 14:05:27
  from 'D:\xpp\Nowy folder\htdocs\Projekt_Maciej_Dolata_komis\app\views\SpecelemEdit.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5ef4930769a9e4_68004517',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '01103a48a33253e987144ffee484293a14820d11' => 
    array (
      0 => 'D:\\xpp\\Nowy folder\\htdocs\\Projekt_Maciej_Dolata_komis\\app\\views\\SpecelemEdit.tpl',
      1 => 1593086721,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ef4930769a9e4_68004517 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_20730987455ef4930766fb91_16262072', 'top');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "main.tpl");
}
/* {block 'top'} */
class Block_20730987455ef4930766fb91_16262072 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'top' => 
  array (
    0 => 'Block_20730987455ef4930766fb91_16262072',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


<div class="bottom-margin">
<form action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
specelemSave/<?php echo $_smarty_tpl->tpl_vars['carId']->value;?>
" method="post" class="pure-form pure-form-aligned">
	<fieldset>
		<legend>Element specyfikacji</legend>
		<div class="pure-control-group">
            <label for="nazwa">nazwa</label>
            <input id="nazwa" type="text" placeholder="nazwa" name="nazwa" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->nazwa;?>
">
        </div>
		<div class="pure-control-group">
            <label for="typ">typ</label>
            <input id="typ" type="text" placeholder="typ" name="typ" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->typ;?>
">
        </div>
		<div class="pure-controls">
			<input type="submit" class="pure-button pure-button-primary" value="Zapisz"/>
			<a class="pure-button button-secondary" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
specList/<?php echo $_smarty_tpl->tpl_vars['carId']->value;?>
">Powrót</a>
		</div>
	</fieldset>
    <input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->id;?>
">
    <input type="hidden" name="carId" value="<?php echo $_smarty_tpl->tpl_vars['carId']->value;?>
">
</form>	
</div>

<?php
}
}
/* {/block 'top'} */
}
