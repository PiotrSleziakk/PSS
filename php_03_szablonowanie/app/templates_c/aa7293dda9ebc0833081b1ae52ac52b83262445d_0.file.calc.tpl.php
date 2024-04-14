<?php
/* Smarty version 4.3.2, created on 2024-04-14 19:00:17
  from 'D:\xampp\htdocs\php_01_widok_kontroler\app\calc.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.2',
  'unifunc' => 'content_661c0ba1594201_88691651',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'aa7293dda9ebc0833081b1ae52ac52b83262445d' => 
    array (
      0 => 'D:\\xampp\\htdocs\\php_01_widok_kontroler\\app\\calc.tpl',
      1 => 1713114014,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_661c0ba1594201_88691651 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_776123361661c0ba158c0c6_34983044', 'content');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "../templates/main.html");
}
/* {block 'content'} */
class Block_776123361661c0ba158c0c6_34983044 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_776123361661c0ba158c0c6_34983044',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

                 <!-- Content -->
                <div class="content">
                    <form class="pure-form pure-form-stacked" action="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/app/calc.php" method="post">
                        <fieldset>
                            <div class="row gtr-50">
                                <div class="col-4 col-12-mobile">
                                    <input id="id_amount" type="text" name="amount" placeholder="Kwota" value="<?php if ((isset($_smarty_tpl->tpl_vars['amount']->value))) {
echo $_smarty_tpl->tpl_vars['amount']->value;
}?>" />
                                </div>
                                <div class="col-4 col-12-mobile">
                                    <input id="id_years" type="text" name="years" placeholder="Na ile lat" value="<?php if ((isset($_smarty_tpl->tpl_vars['years']->value))) {
echo $_smarty_tpl->tpl_vars['years']->value;
}?>" />
                                </div>
                                <div class="col-4 col-12-mobile">
                                    <input id="id_interest" type="text" name="interest" placeholder="Oprocentowanie" value="<?php if ((isset($_smarty_tpl->tpl_vars['interest']->value))) {
echo $_smarty_tpl->tpl_vars['interest']->value;
}?>" />
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
<?php if ((isset($_smarty_tpl->tpl_vars['messages']->value))) {?>
	<?php if (count($_smarty_tpl->tpl_vars['messages']->value) > 0) {?> 
		<h4>Wystąpiły błędy: </h4>
		<ol class="err">
		<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['messages']->value, 'msg');
$_smarty_tpl->tpl_vars['msg']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['msg']->value) {
$_smarty_tpl->tpl_vars['msg']->do_else = false;
?>
		<li><?php echo $_smarty_tpl->tpl_vars['msg']->value;?>
</li>
		<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
		</ol>
	<?php }
}?>

<?php if ((isset($_smarty_tpl->tpl_vars['infos']->value))) {?>
	<?php if (count($_smarty_tpl->tpl_vars['infos']->value) > 0) {?> 
		<h4>Informacje: </h4>
		<ol class="inf">
		<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['infos']->value, 'msg');
$_smarty_tpl->tpl_vars['msg']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['msg']->value) {
$_smarty_tpl->tpl_vars['msg']->do_else = false;
?>
		<li><?php echo $_smarty_tpl->tpl_vars['msg']->value;?>
</li>
		<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
		</ol>
	<?php }
}?>

<?php if ((isset($_smarty_tpl->tpl_vars['result']->value))) {?>
	<h4>Miesięczna rata wynosi:</h4>
	<p class="res">
	<?php echo $_smarty_tpl->tpl_vars['result']->value;?>

	</p>
<?php }?>

</div>
</div>

<?php
}
}
/* {/block 'content'} */
}
