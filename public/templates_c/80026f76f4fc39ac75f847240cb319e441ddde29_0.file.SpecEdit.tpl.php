<?php
/* Smarty version 3.1.34-dev-7, created on 2020-06-19 11:10:02
  from 'D:\xpp\Nowy folder\htdocs\Projekt_Maciej_Dolata_komis\app\views\SpecEdit.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5eec80ead2fee8_45451397',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '80026f76f4fc39ac75f847240cb319e441ddde29' => 
    array (
      0 => 'D:\\xpp\\Nowy folder\\htdocs\\Projekt_Maciej_Dolata_komis\\app\\views\\SpecEdit.tpl',
      1 => 1592557796,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5eec80ead2fee8_45451397 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_17611252095eec80eace9961_91409400', 'top');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "main.tpl");
}
/* {block 'top'} */
class Block_17611252095eec80eace9961_91409400 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'top' => 
  array (
    0 => 'Block_17611252095eec80eace9961_91409400',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


<div class="bottom-margin">
<form action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
specSave/<?php echo $_smarty_tpl->tpl_vars['form']->value->carId;?>
" method="post" class="pure-form pure-form-aligned">
	<fieldset>
		<legend>Wartość specyfikacji</legend>
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['records']->value, 'r');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['r']->value) {
?>
                    <div class="pure-control-group">      
                        <label for="spec_elem_<?php echo $_smarty_tpl->tpl_vars['r']->value['idspec_elem'];?>
"><?php echo $_smarty_tpl->tpl_vars['r']->value['nazwa'];?>
</label>
                        <input id="spec_elem_<?php echo $_smarty_tpl->tpl_vars['r']->value['idspec_elem'];?>
" type="text" placeholder="<?php echo $_smarty_tpl->tpl_vars['r']->value['typ'];?>
" name="spec_elem[<?php echo $_smarty_tpl->tpl_vars['r']->value['idspec_elem'];?>
]">
                    </div>
                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
		<div class="pure-controls">
			<input type="submit" class="pure-button pure-button-primary" value="Zapisz"/>
			<a class="pure-button button-secondary" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
specList/<?php echo $_smarty_tpl->tpl_vars['form']->value->carId;?>
">Powrót</a>
		</div>
	</fieldset>
    <input type="hidden" name="idsamochod" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->carId;?>
">
</form>	
</div>

<?php
}
}
/* {/block 'top'} */
}
