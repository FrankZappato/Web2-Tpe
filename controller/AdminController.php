<?php

    require_once "../view/AdminFormView.php";
    require_once "../Model/AdminModel.php";
    require_once "../model/Login.php";


class AdminController{

    private $admin;
    private $view;

    function __construct(){
        
        $this->admin = new LoginModel();
        $this->view = new AdminFormView();
        
    }

    function signup(){
        $this->admin->signUp();        
    }

    function showAdminForm(){
        $this->view->showAdminForm();
    }

}