<?php
    require_once "../libs/smarty/Smarty.class.php";

class ProductsView
{
    public function __construct()
    {
    }

    public function showHome($products)
    {
        $smarty = new Smarty();
        $smarty->assign('products_s', $products);
        $smarty->display('../templates/products.tpl');
    }
}
