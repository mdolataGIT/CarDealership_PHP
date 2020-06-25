<?php
/* Smarty version 3.1.34-dev-7, created on 2020-06-25 15:13:39
  from 'D:\xpp\Nowy folder\htdocs\Projekt_Maciej_Dolata_komis\app\views\PhotoList.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5ef4a303a293b6_55120735',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ea213ea043ef995e6ac693fe654f72387f8e24d9' => 
    array (
      0 => 'D:\\xpp\\Nowy folder\\htdocs\\Projekt_Maciej_Dolata_komis\\app\\views\\PhotoList.tpl',
      1 => 1593090798,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ef4a303a293b6_55120735 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_17920675775ef4a3039dca85_74237521', 'top');
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_16893181895ef4a3039e24f3_99303664', 'bottom');
?>


<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, "main.tpl");
}
/* {block 'top'} */
class Block_17920675775ef4a3039dca85_74237521 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'top' => 
  array (
    0 => 'Block_17920675775ef4a3039dca85_74237521',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


<?php
}
}
/* {/block 'top'} */
/* {block 'bottom'} */
class Block_16893181895ef4a3039e24f3_99303664 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'bottom' => 
  array (
    0 => 'Block_16893181895ef4a3039e24f3_99303664',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


<div class="bottom-margin">
<a class="button-success pure-button" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
photoNew/<?php echo $_smarty_tpl->tpl_vars['carId']->value;?>
">+ Nowe zdjęcie</a>
<a class="button-warning pure-button" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
specList/<?php echo $_smarty_tpl->tpl_vars['carId']->value;?>
">Specyfikacja</a>
</div>	

<table id="tab_zdjecie" class="pure-table pure-table-bordered">
<thead>
	<tr>
		<th>zdjęcia</th>
		<th>opcje</th>
	</tr>
</thead>
<tbody>
<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['zdjecie']->value, 'p');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['p']->value) {
?>
<tr><td> <img src=<?php echo $_smarty_tpl->tpl_vars['p']->value["url"];?>
 alt="alternatetext" width="1024" height="720"> <td><a class="button-small pure-button button-secondary" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
photoEdit/<?php echo $_smarty_tpl->tpl_vars['p']->value['idzdjecie'];?>
">Edytuj</a>&nbsp;<a class="button-small button-error pure-button" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
photoDelete/<?php echo $_smarty_tpl->tpl_vars['p']->value['idzdjecie'];?>
/<?php echo $_smarty_tpl->tpl_vars['p']->value['idsamochod'];?>
">Usuń</a></tr>
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
