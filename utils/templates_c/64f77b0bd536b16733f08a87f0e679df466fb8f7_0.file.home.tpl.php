<?php
/* Smarty version 3.1.34-dev-7, created on 2020-10-01 00:16:39
  from 'C:\xampp\htdocs\web2-tp\templates\home.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5f7503c76ac408_59853715',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '64f77b0bd536b16733f08a87f0e679df466fb8f7' => 
    array (
      0 => 'C:\\xampp\\htdocs\\web2-tp\\templates\\home.tpl',
      1 => 1601468613,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:./head.tpl' => 1,
    'file:./navbar.tpl' => 1,
    'file:./header.tpl' => 1,
    'file:./carousel.tpl' => 1,
  ),
),false)) {
function content_5f7503c76ac408_59853715 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:./head.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<body class="body_home">
    <?php $_smarty_tpl->_subTemplateRender("file:./navbar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

    <?php $_smarty_tpl->_subTemplateRender("file:./header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

    <?php $_smarty_tpl->_subTemplateRender("file:./carousel.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

    <div class="about container" id="about">
        <div class="row">
            <div class="col-md-6 text-center">
                <img src="images/mariano.jpg" class="profile-img">
            </div>
            <div class="col-md-6 text-center">
                <img src="images/francisco.jpg" class="profile-img">
            </div>
            <div class="col-md-12 text-center">
                <h3>Something about us</h3>
                <p>
                    We are a small company that was born from
                    the need to provide quality service. We specialize in
                    providing parts of computers and advice on their assembly and repair.
                    We have the latest products from the brand and at the best price.
                    We advise all our clients, so that their purchase is a pleasant experience.
                </p>
            </div>
        </div>
    </div>
</body>
<?php echo '<script'; ?>
 src="https://code.jquery.com/jquery-3.5.1.slim.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="https://kit.fontawesome.com/a076d05399.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"><?php echo '</script'; ?>
>

</html><?php }
}
