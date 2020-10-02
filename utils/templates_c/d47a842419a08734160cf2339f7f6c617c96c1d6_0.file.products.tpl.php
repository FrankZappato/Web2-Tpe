<?php
/* Smarty version 3.1.34-dev-7, created on 2020-10-01 00:18:51
  from 'C:\xampp\htdocs\web2-tp\templates\products.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5f75044bbe0862_56574133',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd47a842419a08734160cf2339f7f6c617c96c1d6' => 
    array (
      0 => 'C:\\xampp\\htdocs\\web2-tp\\templates\\products.tpl',
      1 => 1601421958,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:./head.tpl' => 1,
    'file:./navbar.tpl' => 1,
  ),
),false)) {
function content_5f75044bbe0862_56574133 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:./head.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
<body>
    <?php $_smarty_tpl->_subTemplateRender("file:./navbar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
    <div class="container">
        <div class="row row_products">
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['products_s']->value, 'product');
$_smarty_tpl->tpl_vars['product']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['product']->value) {
$_smarty_tpl->tpl_vars['product']->do_else = false;
?>
                <div class="col-sm-4 col-md-3">
                    <form method="post" action="index.php?action=add&id=<?php echo $_smarty_tpl->tpl_vars['product']->value->id;?>
">
                        <div class="products">
                            <img src="images/<?php echo $_smarty_tpl->tpl_vars['product']->value->img_product;?>
" alt="" class="img-responsive product-img" />
                            <h4 class="text-info name-text"><?php echo $_smarty_tpl->tpl_vars['product']->value->name_product;?>
</h4>
                            <h4><?php echo $_smarty_tpl->tpl_vars['product']->value->price;?>
</h4>
                            <input type="text" name="quantity" class="form-control" value="1" />
                            <input type="hidden" name="name" value="<?php echo $_smarty_tpl->tpl_vars['product']->value->name_product;?>
" />
                            <input type="hidden" name="price" value="<?php echo $_smarty_tpl->tpl_vars['product']->value->price;?>
" />
                            <input type="submit" name="add_to_cart" class="btn btn-info add-to-cart-btn" value="Add To Cart" />
                        </div>
                    </form>
                </div>
            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
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
