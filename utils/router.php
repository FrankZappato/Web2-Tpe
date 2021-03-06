<?php
   require_once 'RouterClass.php';
   require_once '../controller/ProductsController.php';
   require_once '../controller/LoginController.php';
   require_once '../controller/ContactController.php';
   require_once '../controller/HomeController.php';
   require_once '../controller/AdminController.php';
   require_once '../controller/CategoryController.php';


    define("BASE_URL", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/');

    $r = new Router();
    $r->setDefaultRoute("HomeController", "showHome");
    $r->addRoute("home", "GET", "HomeController", "showHome");
    $r->addRoute("login", "POST", "LoginController", "login");
    $r->addRoute("login", "GET", "LoginController", "showLoginForm");
    $r->addRoute("signup", "GET", "LoginController", "showSignUpForm");
    $r->addRoute("signup", "POST", "LoginController", "signUp");
    $r->addRoute("logout", "GET", "LoginController", "logOut");
    $r->addRoute("contact", "GET", "ContactController", "showContactForm");
    $r->addRoute("contact", "POST", "ContactController", "saveMessage");
    $r->addRoute("products", "GET", "ProductsController", "showProducts");
    $r->addRoute("category-search", "POST", "ProductsController", "showFilteredProducts");    
    $r->addRoute("productsAdmin", "GET", "AdminController", "showAdmin");
    //Products
    $r->addRoute("add-product", "POST", "ProductsController", "addProduct");
    $r->addRoute("delete-product", "POST", "ProductsController", "deleteProduct");
    $r->addRoute("purchases", "GET", "AdminController", "showPurchases");
    $r->addRoute("modify-product", "POST", "ProductsController", "modifyProduct");
    $r->addRoute("search", "POST", "ProductsController", "showFilteredProducts");
    //Categories
    $r->addRoute("modify-category", "POST", "CategoryController", "modifyCategory");
    $r->addRoute("add-category", "POST", "CategoryController", "addCategory");
    $r->addRoute("categories", "GET", "CategoryController", "showCategories");
    $r->addRoute("delete-category", "POST", "CategoryController", "deleteCategory");

    $r->addRoute("delete-Category", "POST", "CategoryController", "deleteCategory");
    $r->addRoute("messages", "GET", "AdminController", "showContactMessages");
    $r->addRoute("add_to_cart", "POST", "ProductsController", "addToCart");
    $r->addRoute("delete_from_cart", "POST", "ProductsController", "deleteFromCart");
   //usersHandlers
    $r->addRoute("users", "GET", "AdminController", "showUsers");
    $r->addRoute("delete-user", "POST", "AdminController", "deleteUser");
    $r->addRoute("modify-admin-user", "POST", "AdminController", "makeUserAdmin");

    $r->route($_GET['action'], $_SERVER['REQUEST_METHOD']);
