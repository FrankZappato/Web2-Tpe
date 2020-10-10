<?php

require_once "../libs/smarty/Smarty.class.php";
class AdminView
{
    public function __construct()
    {
    }

    public function showAdmin($products)
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        $smarty = new Smarty();
        $smarty->assign('products_s', $products);
        $smarty->display('../templates/admin.tpl');
    }

    public function showPurchases($purchases)
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        $smarty = new Smarty();
        $smarty->assign('purchases_s', $purchases);
        $smarty->display('../templates/purchases.tpl');
    }

    public function showMessages($messages)
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        $smarty = new Smarty();
        $smarty->assign('messages_s', $messages);
        $smarty->display('../templates/messages.tpl');
    }
}