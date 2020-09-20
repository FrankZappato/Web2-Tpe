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
        $this->login->login();
    }

    function showLoginForm(){
        $this->view->showLoginForm();
    }

    function logout(){
        
    }
}
?>