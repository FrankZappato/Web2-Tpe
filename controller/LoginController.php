<?php

require_once "../model/Login.php";
require_once "ProductsController.php";
require_once "../view/LoginView.php";

    class LoginController{

    private $login;
    private $productsController;
    private $view;

    function __construct(){
        $this->login = new LoginModel();
        $this->productsController = new ProductsController();
        $this->view = new LoginView();

    }      

    function login(){
        $responses = $this->login->login();
        echo $responses;
        switch($responses){
            case 'errorEmptyFields':
                $this->view->showLoginForm($responses);
            break;
            case 'errorSQLConnection':
                $this->view->showLoginForm($responses);
            break;
            case 'errorWrongPassword':
                $this->view->showLoginForm($responses);
            break;
            case 'connectionSucces':
                $this->view->showLoginForm($responses);
            break;
            case 'errorNoUser':
                $this->view->showLoginForm($responses);
            break;                    
        }
    }

    function showLoginForm(){
        $this->view->showLoginForm(null);
    }

    function logout(){
        
    }
}
?>