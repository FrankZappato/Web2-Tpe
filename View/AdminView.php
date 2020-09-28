<?php

require_once "../libs/smarty/Smarty.class.php";
class AdminView
{
    public function __construct()
    {
    }

    public function showAdmin($products)
    {
        $smarty = new Smarty();
        $smarty->assign('products_s', $products);
        $smarty->display('../templates/admin.tpl');
    }
}
