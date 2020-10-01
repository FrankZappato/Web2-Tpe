<?php

require_once "../model/LoginModel.php";
require_once "ProductsController.php";
require_once "../view/LoginView.php";
require_once '../controller/AdminController.php';

    class LoginController
    {
        private $loginModel;
        private $productsController;
        private $loginView;
        private $adminController;

        public function __construct()
        {
            $this->loginModel = new LoginModel();
            $this->productsController = new ProductsController();
            $this->loginView = new LoginView();
            $this->adminController = new AdminController();
        }

        public function login()
        {
            $code = $this->loginModel->login();
            if ($code == "connectionSucces") {
                if ($_SESSION['isAdmin']) {
                    $this->adminController-> showAdmin();
                } else {
                    $this->productsController->showProducts($_SESSION['logged']); // aca pasarle la sesion o algo que nos diga que fue ok, alguna variable para algun cartel
                }
            } else {
                $this->loginView->showLoginForm($code, "");
            }
        }

        public function showLoginForm()
        {
            $this->loginView->showLoginForm(null, null);
        }

        public function signUp()
        {
            $code = $this->loginModel->signUp();
            if ($code == "registerSuccess") {
                $this->loginView->showLoginForm(null, null);
            } else {
                $this->loginView->showSignUpForm($code);
            }
        }

        public function showSignUpForm()
        {
            $this->loginView->showSignUpForm(null);
        }

        public function logOut()
        {
            if (session_status() == PHP_SESSION_NONE) {
                session_start();
                session_destroy();
            }
            $this->loginView->showLoginForm(null, "");
        }
    }
