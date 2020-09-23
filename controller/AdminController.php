<?php

    require_once "../view/AdminFormView.php";
    require_once "../Model/AdminModel.php";
    //require_once "..view/AdminFormView";


class AdminController{

    private $admin;
    private $view;

    function __construct(){
        
        $this->admin = new AdminModel();
        $this->view = new AdminFormView();
        
    }

    function signup(){
        $this->admin->signup();        
    }

    function showAdminForm(){
        $this->view->showAdminForm();
    }

}