<?php
    require_once "../libs/smarty/Smarty.class.php";

class LoginView{


    function __construct(){}

    function showLoginForm($code, $extra_param){
        $smarty = new Smarty();
        $smarty->assign('error_code', $code);
        $smarty->assign('extra_param', $extra_param);
        $smarty->display('../templates/loginform.tpl');
    }
}
    
?>