<?php

require_once "../model/Login.php";
require_once "ProductsController.php";
require_once "../view/LoginView.php";

    class LoginController{

    private $login;
    private $productsController;
    private $loginView;

    function __construct(){
        $this->login = new LoginModel();
        $this->productsController = new ProductsController();
        $this->loginView = new LoginView();
    }      

    function login(){
        $code = $this->login->login();
        if($code == "connectionSucces"){
            $this->productsController->Home(); //acá le pasaremos algun parametro para que se lo inyecte a la plantilla de smarty. por ejemplo algo par que desencadene un cartel que diga "succes" y que desaparesca al ratito
        }else{
        $this->loginView->showLoginForm($code, "");
        }
    }

    function showLoginForm(){
        $this->loginView->showLoginForm(null, null);
    }

    function logout(){
        
    }
}
?>