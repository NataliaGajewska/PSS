<?php
/* Smarty version 3.1.30, created on 2024-05-31 13:28:12
  from "C:\xampp\htdocs\php_04\app\calc.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_6659b44c1c06f1_52662574',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '61e8379c8710e6be74b64db284708275541d1892' => 
    array (
      0 => 'C:\\xampp\\htdocs\\php_04\\app\\calc.html',
      1 => 1717154887,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:../templates/main.html' => 1,
  ),
),false)) {
function content_6659b44c1c06f1_52662574 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_3656787626659b44c19b652_05899310', 'footer');
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_20559403626659b44c1bfc55_72186241', 'content');
$_smarty_tpl->inheritance->endChild();
$_smarty_tpl->_subTemplateRender("file:../templates/main.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, false);
}
/* {block 'footer'} */
class Block_3656787626659b44c19b652_05899310 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
Super ważna stopka!<?php
}
}
/* {/block 'footer'} */
/* {block 'content'} */
class Block_20559403626659b44c1bfc55_72186241 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


<h3>Kalkulator kredytowy</h2>


<form class="pure-form pure-form-stacked" action="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/app/calc.php" method="post">
	<fieldset>
		<label for="cr_amt">Kwota</label>
		<input id="cr_amt" type="text" placeholder="super kwota" name="cr_amt" value="<?php echo $_smarty_tpl->tpl_vars['form']->value['cr_amt'];?>
">
                <label for="year">Liczba lat</label>
		<input id="year" type="text" placeholder="super liczba lat" name="year" value="<?php echo $_smarty_tpl->tpl_vars['form']->value['year'];?>
">
                <label for="rate">Oprocentowanie</label>
		<input id="rate" type="text" placeholder="super malutkie oprocentowanie" name="rate" value="<?php echo $_smarty_tpl->tpl_vars['form']->value['rate'];?>
">
	</fieldset>
	<button type="submit" class="pure-form pure-form-stacked">Oblicz miesięczną rate</button>
</form>

<div class="messages">


<?php if (isset($_smarty_tpl->tpl_vars['messages']->value)) {?>
	<?php if (count($_smarty_tpl->tpl_vars['messages']->value) > 0) {?> 
		<h4>Wystąpiły błędy: </h4>
		<ol class="err">
		<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['messages']->value, 'msg');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['msg']->value) {
?>
		<li><?php echo $_smarty_tpl->tpl_vars['msg']->value;?>
</li>
		<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

		</ol>
	<?php }
}?>


<?php if (isset($_smarty_tpl->tpl_vars['infos']->value)) {?>
	<?php if (count($_smarty_tpl->tpl_vars['infos']->value) > 0) {?> 
		<h4>Informacje: </h4>
		<ol class="inf">
		<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['infos']->value, 'msg');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['msg']->value) {
?>
		<li><?php echo $_smarty_tpl->tpl_vars['msg']->value;?>
</li>
		<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

		</ol>
	<?php }
}?>

<?php if (isset($_smarty_tpl->tpl_vars['result']->value)) {?>
	<h4>Wynik</h4>
	<p class="res">
	<?php echo $_smarty_tpl->tpl_vars['result']->value;?>

	</p>
<?php }?>

</div>

<?php
}
}
/* {/block 'content'} */
}
