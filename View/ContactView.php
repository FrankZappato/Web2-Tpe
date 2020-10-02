<?php

require_once "../libs/smarty/Smarty.class.php";
class ContactView
{
    public function __construct()
    {
    }

    public function showContactForm()
    {
        session_start();
        $smarty = new Smarty();
        $smarty->display('../templates/contact.tpl');
    }
}
