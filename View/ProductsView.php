<?php
    require_once "../libs/smarty/Smarty.class.php";

class ProductsView
{
    public function __construct()
    {
    }

    public function showProducts($dataToReturn, $categories)
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        $smarty = new Smarty();
        $smarty->assign('products_s', $dataToReturn["products"]);
        $smarty->assign('page', $dataToReturn["page"]);
        $smarty->assign('pages', $dataToReturn["pages"]);
        $smarty->assign('search', $dataToReturn["search"]);
        $smarty->assign('categories_s' , $categories);
        $smarty->display('../templates/products.tpl');
    }
}
