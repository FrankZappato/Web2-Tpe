<?php

require_once "../libs/smarty/Smarty.class.php";
class ContactView
{
    public function __construct()
    {
    }

    public function showContactForm($code)
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        $smarty = new Smarty();
        $smarty->assign('code', $code);

        $smarty->display('../templates/contact.tpl');
    }
}
