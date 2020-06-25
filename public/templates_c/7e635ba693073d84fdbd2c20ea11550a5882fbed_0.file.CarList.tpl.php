<?php
/* Smarty version 3.1.34-dev-7, created on 2020-06-24 23:06:27
  from 'D:\xpp\Nowy folder\htdocs\Projekt_Maciej_Dolata_komis\app\views\CarList.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5ef3c053e22f37_05564581',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7e635ba693073d84fdbd2c20ea11550a5882fbed' => 
    array (
      0 => 'D:\\xpp\\Nowy folder\\htdocs\\Projekt_Maciej_Dolata_komis\\app\\views\\CarList.tpl',
      1 => 1593032784,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ef3c053e22f37_05564581 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_12688488355ef3c053d7ded1_67064616', 'top');
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_5625404205ef3c053d92cb1_25393479', 'bottom');
?>


<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, "main.tpl");
}
/* {block 'top'} */
class Block_12688488355ef3c053d7ded1_67064616 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'top' => 
  array (
    0 => 'Block_12688488355ef3c053d7ded1_67064616',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


<div class="bottom-margin">
<form class="pure-form pure-form-stacked" action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
carList/<?php echo $_smarty_tpl->tpl_vars['companyId']->value;?>
">
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
class Block_5625404205ef3c053d92cb1_25393479 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'bottom' => 
  array (
    0 => 'Block_5625404205ef3c053d92cb1_25393479',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


<div class="bottom-margin">
<a class="button-success pure-button" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
carNew/<?php echo $_smarty_tpl->tpl_vars['companyId']->value;?>
">+ Nowy samochod</a>
<a class="button-warning pure-button" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
companyList">Powrót</a>
</div>	

<table id="tab_samochod" class="pure-table pure-table-bordered">
<thead>
	<tr>
		<th>marka</th>
		<th>model</th>
		<th>rejstracja</th>
                <th>pojemność</th>
                <th>moc</th>
                <th>bezwypadkowy</th>
                <th>rodzaj paliwa</th>
                <th>opis</th>
                <th>firma</th>
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
</td><td><?php if ($_smarty_tpl->tpl_vars['p']->value["bezwypadkowy"]) {?>tak<?php } else { ?> nie <?php }?></td><td><?php echo $_smarty_tpl->tpl_vars['p']->value["rodzajpaliwa"];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['p']->value["opis"];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['p']->value["nazwa"];?>
</td><td><a class="button-small pure-button button-secondary" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
carEdit/<?php echo $_smarty_tpl->tpl_vars['p']->value['idsamochod'];?>
">Edytuj</a>&nbsp;<a class="button-small button-error pure-button" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
carDelete/<?php echo $_smarty_tpl->tpl_vars['p']->value['idfirma'];?>
/<?php echo $_smarty_tpl->tpl_vars['p']->value['idsamochod'];?>
">Usuń</a>&nbsp;<a class="button-small pure-button button-success" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
photoList/<?php echo $_smarty_tpl->tpl_vars['p']->value['idsamochod'];?>
">Zdjęcia</a>&nbsp;<a class="button-small pure-button button-warning" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
specList/<?php echo $_smarty_tpl->tpl_vars['p']->value['idsamochod'];?>
">Specyfikacja</a></td></tr>
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
