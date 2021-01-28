<?php
    require_once "../libs/smarty/Smarty.class.php";

class LoginView
{
    public function __construct()
    {
    }

    public function showLoginForm($code)
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        $smarty = new Smarty();
        $smarty->assign('error_code', $code);
        $smarty->display('../templates/loginform.tpl');
    }

    public function showSignUpForm($code)
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        $smarty = new Smarty();
        $smarty->assign('error_code', $code);
        $smarty->display('../templates/signup.tpl');
    }
}
