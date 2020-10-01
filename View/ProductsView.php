<?php
    require_once "../libs/smarty/Smarty.class.php";

class ProductsView
{
    public function __construct()
    {
    }

    public function showProducts($products, $isLogged)
    {
        $smarty = new Smarty();
        $smarty->assign('products_s', $products);
        $smarty->assign('isLogged_s', $isLogged);
        $smarty->display('../templates/products.tpl');
    }
}
