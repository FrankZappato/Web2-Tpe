<?php
   require_once 'RouterClass.php';
   require_once '../controller/ProductsController.php';
   require_once '../controller/LoginController.php';
   require_once '../controller/ContactController.php';
   require_once '../controller/HomeController.php';
   require_once '../controller/AdminController.php';


    define("BASE_URL", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/');

    $r = new Router();
    $r->setDefaultRoute("HomeController", "showHome");
    $r->addRoute("home", "GET", "HomeController", "showHome");
    $r->addRoute("login", "POST", "LoginController", "login");
    $r->addRoute("login", "GET", "LoginController", "showLoginForm");
    $r->addRoute("signup", "GET", "LoginController", "showSignUpForm");
    $r->addRoute("signup", "POST", "LoginController", "signUp");
    $r->addRoute("contact", "GET", "ContactController", "showContactForm");
    $r->addRoute("products", "GET", "ProductsController", "showProducts");
    $r->addRoute("admin", "GET", "AdminController", "showAdmin");
    $r->addRoute("add-product", "POST", "AdminController", "addProduct");
    $r->addRoute("modify-product", "POST", "AdminController", "modifyProduct");
    $r->addRoute("delete-product", "POST", "ProductsController", "deleteProduct");

    $r->route($_GET['action'], $_SERVER['REQUEST_METHOD']);
