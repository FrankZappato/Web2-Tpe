<?php

require_once "../libs/smarty/Smarty.class.php";
class HomeView
{
    public function __construct()
    {
    }

    public function showHome()
    {
        session_start();
        $smarty = new Smarty();
        $smarty->display('../templates/home.tpl');
    }
}
