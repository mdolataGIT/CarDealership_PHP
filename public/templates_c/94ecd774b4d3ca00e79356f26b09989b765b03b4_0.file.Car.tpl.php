<?php
/* Smarty version 3.1.34-dev-7, created on 2020-06-05 23:55:57
  from 'D:\xpp\Nowy folder\htdocs\Projekt_Maciej_Dolata_komis\app\views\Car.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5edabf6d097719_69402311',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '94ecd774b4d3ca00e79356f26b09989b765b03b4' => 
    array (
      0 => 'D:\\xpp\\Nowy folder\\htdocs\\Projekt_Maciej_Dolata_komis\\app\\views\\Car.tpl',
      1 => 1591394155,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5edabf6d097719_69402311 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>




<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1560909115edabf6d03b371_87283908', 'bottom');
?>


<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, "main.tpl");
}
/* {block 'bottom'} */
class Block_1560909115edabf6d03b371_87283908 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'bottom' => 
  array (
    0 => 'Block_1560909115edabf6d03b371_87283908',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


<div class="bottom-margin">
<a class="pure-button button-success" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
CarNew">+ Nowy samochod</a>
</div>	

<table id="tab_Car" class="pure-table pure-table-bordered">
<thead>
	<tr>
		<th>marka</th>
		<th>model</th>
		<th>rejstracja</th>
		<th>pojemnosc</th>
                <th>moc</th>
                <th>opis</th>
                <th>bezwypadkowy</th>
                <th>opcje</th>
	</tr>
</thead>
<tbody>
<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['Cars']->value, 'p');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['p']->value) {
?>
<tr><td><?php echo $_smarty_tpl->tpl_vars['p']->value["marka"];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['p']->value["model"];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['p']->value["rejstracja"];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['p']->value["pojemnosc"];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['p']->value["moc"];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['p']->value["opis"];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['p']->value["bezwypadkowy"];?>
</td><td><a class="button-small pure-button button-secondary" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
CarEdit/<?php echo $_smarty_tpl->tpl_vars['p']->value['idsamochod'];?>
">Edytuj</a>&nbsp;<a class="button-small pure-button button-warning" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
CarDelete/<?php echo $_smarty_tpl->tpl_vars['p']->value['idsamochod'];?>
">Usuń</a></td></tr>
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
