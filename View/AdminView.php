<?php

require_once "../libs/smarty/Smarty.class.php";
class AdminView
{
    public function __construct()
    {
    }

    public function showAdmin($error_msg_modify = null, $error_msg = null, $products, $categories)
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        $smarty = new Smarty();        
        $smarty->assign('error_msg_modify', $error_msg_modify);
        $smarty->assign('error_msg', $error_msg);
        $smarty->assign('products_s', $products);
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

    public function showError($msgError) {
        echo "<h1>ERROR!</h1>";
        echo "<h2>{$msgError}</h2>";
    }
}
