<?php
    require_once "../libs/smarty/Smarty.class.php";

class LoginView
{
    public function __construct()
    {
    }

    public function showLoginForm($code, $extra_param)
    {
        $smarty = new Smarty();
        $smarty->assign('error_code', $code);
        $smarty->assign('extra_param', $extra_param);
        $smarty->display('../templates/loginform.tpl');
    }

    public function showSignUpForm($code)
    {
        $smarty = new Smarty();
        $smarty->assign('error_code', $code);
        $smarty->display('../templates/signup.tpl');
    }
}
