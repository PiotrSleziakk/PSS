<?php
/* Smarty version 4.3.2, created on 2024-04-18 10:41:49
  from 'D:\xampp\htdocs\php_01_widok_kontroler\app\calc.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.2',
  'unifunc' => 'content_6620dccd2ad867_96952378',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9215f775a7841c9913be5d4b720efbcc436ab9d2' => 
    array (
      0 => 'D:\\xampp\\htdocs\\php_01_widok_kontroler\\app\\calc.tpl',
      1 => 1713429704,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6620dccd2ad867_96952378 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_13115744386620dccd2a3ef6_50840926', 'content');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "../templates/main.html");
}
/* {block 'content'} */
class Block_13115744386620dccd2a3ef6_50840926 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_13115744386620dccd2a3ef6_50840926',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

                 <!-- Content -->
                <div class="content">
                    <form class="pure-form pure-form-stacked" action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_url;?>
/app/calc.php" method="post">
                        <fieldset>
                            <div class="row gtr-50">
                                <div class="col-4 col-12-mobile">
                                    <input id="id_amount" type="text" name="amount" placeholder="Kwota" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->amount;?>
" />
                                </div>
                                <div class="col-4 col-12-mobile">
                                    <input id="id_years" type="text" name="years" placeholder="Na ile lat" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->years;?>
" />
                                </div>
                                <div class="col-4 col-12-mobile">
                                    <input id="id_interest" type="text" name="interest" placeholder="Oprocentowanie" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->interest;?>
" />
                                </div>
                                <div class="col-12">
                                        <ul class="buttons">
                                                <li><input type="submit" class="special" value="Oblicz" /></li>
                                        </ul>
                                </div>
                            </div>
                        </fieldset>
                    </form>
                </div>
<?php if ($_smarty_tpl->tpl_vars['msgs']->value->isError()) {?>
        <h4>Wystąpiły błędy: </h4>
        <ol class="err">
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['msgs']->value->getErrors(), 'err');
$_smarty_tpl->tpl_vars['err']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['err']->value) {
$_smarty_tpl->tpl_vars['err']->do_else = false;
?>
        <li><?php echo $_smarty_tpl->tpl_vars['err']->value;?>
</li>
        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        </ol>
<?php }?>

<?php if ($_smarty_tpl->tpl_vars['msgs']->value->isInfo()) {?>
	<h4>Informacje: </h4>
	<ol class="inf">
	<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['msgs']->value->getInfos(), 'inf');
$_smarty_tpl->tpl_vars['inf']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['inf']->value) {
$_smarty_tpl->tpl_vars['inf']->do_else = false;
?>
	<li><?php echo $_smarty_tpl->tpl_vars['inf']->value;?>
</li>
	<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
	</ol>
<?php }?>

<?php if ((isset($_smarty_tpl->tpl_vars['res']->value->result))) {?>
	<h4>Miesięczna rata wynosi:</h4>
	<p class="res">
	<?php echo $_smarty_tpl->tpl_vars['res']->value->result;?>

	</p>
<?php }?>

</div>
</div>

<?php
}
}
/* {/block 'content'} */
}
