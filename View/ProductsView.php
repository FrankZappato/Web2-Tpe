<?php
    require_once "../libs/smarty/Smarty.class.php";

class ProductsView
{
    public function __construct()
    {
    }

    public function showProducts($products)
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        $smarty = new Smarty();
        $smarty->assign('products_s', $products);
        $smarty->display('../templates/products.tpl');
    }
}
