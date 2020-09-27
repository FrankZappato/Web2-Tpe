<?php
   require_once 'RouterClass.php';
   require_once '../controller/ProductsController.php';
   require_once '../controller/LoginController.php';
   require_once '../controller/ContactController.php';

    define("BASE_URL", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/');

    $r = new Router();
    $r->setDefaultRoute("ProductsController", "home");
    $r->addRoute("home", "GET", "ProductsController", "home");
    $r->addRoute("login", "POST", "LoginController", "login");
    $r->addRoute("login", "GET", "LoginController", "showLoginForm");
    $r->addRoute("signup", "GET", "LoginController", "showSignUpForm");
    $r->addRoute("signup", "POST", "LoginController", "signUp");
    $r->addRoute("contact", "GET", "ContactController", "showContactForm");
    
    $r->route($_GET['action'], $_SERVER['REQUEST_METHOD']);
