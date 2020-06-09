<?php
/* Smarty version 3.1.34-dev-7, created on 2020-06-09 02:02:36
  from 'D:\xpp\Nowy folder\htdocs\Projekt_Maciej_Dolata_komis\app\views\SpecEdit.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5eded19cea3273_12051143',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '80026f76f4fc39ac75f847240cb319e441ddde29' => 
    array (
      0 => 'D:\\xpp\\Nowy folder\\htdocs\\Projekt_Maciej_Dolata_komis\\app\\views\\SpecEdit.tpl',
      1 => 1591660793,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5eded19cea3273_12051143 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_3396557745eded19ce87cf5_96087377', 'top');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "main.tpl");
}
/* {block 'top'} */
class Block_3396557745eded19ce87cf5_96087377 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'top' => 
  array (
    0 => 'Block_3396557745eded19ce87cf5_96087377',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


<div class="bottom-margin">
<form action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
specSave" method="post" class="pure-form pure-form-aligned">
	<fieldset>
		<legend>Wartość specyfikacji</legend>
		<div class="pure-control-group">
            <label for="wartosc">wartosc</label>
            <input id="wartosc" type="text" placeholder="wartosc" name="wartosc" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->wartosc;?>
">
        </div>
		<div class="pure-controls">
			<input type="submit" class="pure-button pure-button-primary" value="Zapisz"/>
			<a class="pure-button button-secondary" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
companyList">Powrót</a>
		</div>
	</fieldset>
    <input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->id;?>
">
</form>	
</div>

<?php
}
}
/* {/block 'top'} */
}
