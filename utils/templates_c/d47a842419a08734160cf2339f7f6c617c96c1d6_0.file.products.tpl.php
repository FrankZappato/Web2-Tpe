<?php
/* Smarty version 3.1.34-dev-7, created on 2020-10-07 14:44:02
  from 'C:\xampp\htdocs\web2-tp\templates\products.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5f7db812bf9604_25126740',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd47a842419a08734160cf2339f7f6c617c96c1d6' => 
    array (
      0 => 'C:\\xampp\\htdocs\\web2-tp\\templates\\products.tpl',
      1 => 1602074625,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:./head.tpl' => 1,
    'file:./navbar.tpl' => 1,
    'file:./footer.tpl' => 1,
  ),
),false)) {
function content_5f7db812bf9604_25126740 (Smarty_Internal_Template $_smarty_tpl) {
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
                            <div class="btn_box">
                                <button type="submit" name="add_to_cart" class="btn btn-info add-to-cart-btn">
                                    <i class="fa fa-cart-plus" aria-hidden="true"></i>
                                </button>
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal<?php echo $_smarty_tpl->tpl_vars['product']->value->id;?>
">
                                    <i class="fa fa-info-circle" aria-hidden="true"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal fade" id="modal<?php echo $_smarty_tpl->tpl_vars['product']->value->id;?>
" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Details for <?php echo $_smarty_tpl->tpl_vars['product']->value->name_product;?>
</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <?php echo $_smarty_tpl->tpl_vars['product']->value->details;?>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        </div>
    </div>
    <?php $_smarty_tpl->_subTemplateRender("file:./footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

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
