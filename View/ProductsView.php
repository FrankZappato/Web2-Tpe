<?php
    require_once "../libs/smarty/Smarty.class.php";

class ProductsView
{
    public function __construct()
    {
    }

    public function showProducts($products, $categories)
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        $smarty = new Smarty();
        $smarty->assign('products_s', $products);
        $smarty->assign('categories_s' , $categories);
        $smarty->display('../templates/products.tpl');
    }
}
