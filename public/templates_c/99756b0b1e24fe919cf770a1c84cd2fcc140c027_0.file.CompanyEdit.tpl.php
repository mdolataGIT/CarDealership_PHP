<?php
/* Smarty version 3.1.34-dev-7, created on 2020-06-24 19:42:30
  from 'D:\xpp\Nowy folder\htdocs\Projekt_Maciej_Dolata_komis\app\views\CompanyEdit.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5ef3908600a489_56593913',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '99756b0b1e24fe919cf770a1c84cd2fcc140c027' => 
    array (
      0 => 'D:\\xpp\\Nowy folder\\htdocs\\Projekt_Maciej_Dolata_komis\\app\\views\\CompanyEdit.tpl',
      1 => 1593020516,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ef3908600a489_56593913 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_16940852915ef39085f00261_04313844', 'top');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "main.tpl");
}
/* {block 'top'} */
class Block_16940852915ef39085f00261_04313844 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'top' => 
  array (
    0 => 'Block_16940852915ef39085f00261_04313844',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


<div class="bottom-margin">
<form action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
companySave" method="post" class="pure-form pure-form-aligned">
	<fieldset>
		<legend>Dane firmy</legend>
		<div class="pure-control-group">
            <label for="nazwa">nazwa</label>
            <input id="nazwa" type="text" placeholder="nazwa" name="nazwa" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->nazwa;?>
">
        </div>
		<div class="pure-control-group">
            <label for="miejscowosc">miejscowość</label>
            <input id="miejscowosc" type="text" placeholder="miejscowosc" name="miejscowosc" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->miejscowosc;?>
">
        </div>
		<div class="pure-control-group">
            <label for="adres">adres</label>
            <input id="adres" type="text" placeholder="adres" name="adres" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->adres;?>
">
        </div>
        	<div class="pure-control-group">
            <label for="arch">arch</label>
            <input id="arch" type="checkbox" name="arch" value="1" <?php if ($_smarty_tpl->tpl_vars['form']->value->arch) {?>checked="checked"<?php }?>>
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
