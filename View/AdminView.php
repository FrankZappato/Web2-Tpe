<?php

require_once "../libs/smarty/Smarty.class.php";
class AdminView
{
    public function __construct()
    {
    }

    public function showAdmin($allData, $categories)
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        $smarty = new Smarty();
        $smarty->assign('products_s', $allData['products']);
        $smarty->assign('categories', $categories);
        $smarty->display('../templates/adminProducts.tpl');
    }
    public function showCategories($categories)
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        $smarty = new Smarty();
        $smarty->assign('categories_s', $categories);
        $smarty->display('../templates/adminCategory.tpl');
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

    public function showUsers($users)
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        $smarty = new Smarty();
        $smarty->assign('users_s', $users);
        $smarty->display('../templates/usersList.tpl');
    }
}
