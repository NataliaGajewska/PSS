<?php
/* Smarty version 3.1.30, created on 2024-06-01 15:38:28
  from "C:\xampp\htdocs\php_05\app\CalcView.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_665b2454e39a39_98707775',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '8383c08cb91a5ac2311ced950c3be6015bb08df8' => 
    array (
      0 => 'C:\\xampp\\htdocs\\php_05\\app\\CalcView.html',
      1 => 1717248502,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:../templates/main.html' => 1,
  ),
),false)) {
function content_665b2454e39a39_98707775 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_731730633665b2454e2a349_57441651', 'footer');
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1238017886665b2454e394e3_95930065', 'content');
$_smarty_tpl->inheritance->endChild();
$_smarty_tpl->_subTemplateRender("file:../templates/main.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, false);
}
/* {block 'footer'} */
class Block_731730633665b2454e2a349_57441651 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
Super ważna stopka!<?php
}
}
/* {/block 'footer'} */
/* {block 'content'} */
class Block_1238017886665b2454e394e3_95930065 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


<h3>Kalkulator kredytowy</h2>

<form class="pure-form pure-form-stacked" action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_url;?>
/app/calc.php" method="post">
	<fieldset>
		<label for="cr_amt">Kwota</label>
                <input id="cr_amt" type="text" placeholder="super kwota" name="cr_amt" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->cr_amt;?>
">
                <label for="year">Liczba lat</label>
                <input id="year" type="text" placeholder="super liczba lat" name="year" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->year;?>
">
                <label for="rate">Oprocentowanie</label>
                <input id="rate" type="text" placeholder="super malutkie oprocentowanie" name="rate" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->rate;?>
">
	</fieldset>
	<button type="submit" class="pure-form pure-form-stacked">Oblicz miesięczną rate</button>
</form>

<div class="messages">


<?php if ($_smarty_tpl->tpl_vars['msgs']->value->isError()) {?>
	<h4>Wystąpiły błędy: </h4>
	<ol class="err">
	<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['msgs']->value->getErrors(), 'err');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['err']->value) {
?>
	<li><?php echo $_smarty_tpl->tpl_vars['err']->value;?>
</li>
	<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

	</ol>
<?php }?>


<?php if ($_smarty_tpl->tpl_vars['msgs']->value->isInfo()) {?>
	<h4>Informacje: </h4>
	<ol class="inf">
	<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['msgs']->value->getInfos(), 'inf');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['inf']->value) {
?>
	<li><?php echo $_smarty_tpl->tpl_vars['inf']->value;?>
</li>
	<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

	</ol>
<?php }?>

<?php if (isset($_smarty_tpl->tpl_vars['res']->value->result)) {?>
	<h4>Miesięczna rata</h4>
	<p class="res">
	<?php echo $_smarty_tpl->tpl_vars['res']->value->result;?>

	</p>
<?php }?>

</div>

<?php
}
}
/* {/block 'content'} */
}
