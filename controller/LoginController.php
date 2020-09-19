<?php

require_once "../model/Login.php";
require_once "ProductsController.php";

class LoginController{

private $login;
private $productsController;

function __construct(){
    $this->login = new Login();
    $this->productsController = new ProductsController();

}

function Login($keys){
    var_dump($keys);
    $this->login->login($keys);
    /*
    if($this->login->Login($keys)){
        //iniciar session
    }
    $this->productsController->Home();
    */
}
}



?>