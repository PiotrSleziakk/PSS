<?php
/* Smarty version 4.3.2, created on 2024-04-20 11:12:36
  from 'D:\xampp\htdocs\php_01_widok_kontroler\app\views\templates\main.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.2',
  'unifunc' => 'content_662387049c4035_23294662',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '855432f0eaf2c41ec0ccdd36b227f6b171bf56c3' => 
    array (
      0 => 'D:\\xampp\\htdocs\\php_01_widok_kontroler\\app\\views\\templates\\main.tpl',
      1 => 1713604354,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_662387049c4035_23294662 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, false);
?>
<!DOCTYPE HTML>
<!--
	Twenty by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html lang="pl">
<head>
    <title><?php echo (($tmp = $_smarty_tpl->tpl_vars['page_title']->value ?? null)===null||$tmp==='' ? "Tytuł domyślny" ?? null : $tmp);?>
</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_url;?>
/assets/css/main.css" />
    <noscript><link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_url;?>
/assets/css/noscript.css" /></noscript>
</head>
<body class="contact is-preload">
    <div id="page-wrapper">

        <!-- Header -->
        <header id="header">
            <h1 id="logo">Minima_/Credic</h1>
            <nav id="nav">
                <ul>
                    <li><a href="#" class="button primary">Login</a></li>
                </ul>
            </nav>
        </header>

        <!-- Main -->
        <article id="main">

            <header class="special container">
                    <h2>kalkulator kredytowy</h2>
            </header>

            <!-- One -->
            <section class="wrapper style4 special container medium">

                 <!-- Content -->
                <div class="content">
                    <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_723114673662387049c3a93_56451076', 'content');
?>

                </div>

            </section>

        </article>

        <!-- Footer -->
        <footer id="footer">

            <ul class="icons">
                <li><a href="#" class="icon brands circle fa-twitter"><span class="label">Twitter</span></a></li>
                <li><a href="#" class="icon brands circle fa-facebook-f"><span class="label">Facebook</span></a></li>
                <li><a href="#" class="icon brands circle fa-google-plus-g"><span class="label">Google+</span></a></li>
                <li><a href="#" class="icon brands circle fa-github"><span class="label">Github</span></a></li>
                <li><a href="#" class="icon brands circle fa-dribbble"><span class="label">Dribbble</span></a></li>
            </ul>

            <ul class="copyright">
                <li>&copy; Untitled</li><li>Design: <a href="http://html5up.net">HTML5 UP</a></li>
            </ul>

        </footer>

        </div>

            <!-- Scripts -->
            <?php echo '<script'; ?>
 src="<?php echo '<?php'; ?>
 print(_APP_ROOT); <?php echo '?>'; ?>
assets/js/jquery.min.js"><?php echo '</script'; ?>
>
            <?php echo '<script'; ?>
 src="<?php echo '<?php'; ?>
 print(_APP_ROOT); <?php echo '?>'; ?>
assets/js/jquery.dropotron.min.js"><?php echo '</script'; ?>
>
            <?php echo '<script'; ?>
 src="<?php echo '<?php'; ?>
 print(_APP_ROOT); <?php echo '?>'; ?>
assets/js/jquery.scrolly.min.js"><?php echo '</script'; ?>
>
            <?php echo '<script'; ?>
 src="<?php echo '<?php'; ?>
 print(_APP_ROOT); <?php echo '?>'; ?>
assets/js/jquery.scrollgress.min.js"><?php echo '</script'; ?>
>
            <?php echo '<script'; ?>
 src="<?php echo '<?php'; ?>
 print(_APP_ROOT); <?php echo '?>'; ?>
assets/js/jquery.scrollex.min.js"><?php echo '</script'; ?>
>
            <?php echo '<script'; ?>
 src="<?php echo '<?php'; ?>
 print(_APP_ROOT); <?php echo '?>'; ?>
assets/js/browser.min.js"><?php echo '</script'; ?>
>
            <?php echo '<script'; ?>
 src="<?php echo '<?php'; ?>
 print(_APP_ROOT); <?php echo '?>'; ?>
assets/js/breakpoints.min.js"><?php echo '</script'; ?>
>
            <?php echo '<script'; ?>
 src="<?php echo '<?php'; ?>
 print(_APP_ROOT); <?php echo '?>'; ?>
assets/js/util.js"><?php echo '</script'; ?>
>
            <?php echo '<script'; ?>
 src="<?php echo '<?php'; ?>
 print(_APP_ROOT); <?php echo '?>'; ?>
assets/js/main.js"><?php echo '</script'; ?>
>

</body>
</html><?php }
/* {block 'content'} */
class Block_723114673662387049c3a93_56451076 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_723114673662387049c3a93_56451076',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
 Domyślna treść zawartości .... <?php
}
}
/* {/block 'content'} */
}
