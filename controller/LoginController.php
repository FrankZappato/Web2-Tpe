<?php

require_once "../model/LoginModel.php";
require_once "ProductsController.php";
require_once "../view/LoginView.php";

    class LoginController
    {
        private $loginModel;
        private $productsController;
        private $loginView;

        public function __construct()
        {
            $this->loginModel = new LoginModel();
            $this->productsController = new ProductsController();
            $this->loginView = new LoginView();
        }

        public function login()
        {
            $code = $this->loginModel->login();
            if ($code == "connectionSucces") {
                $this->productsController->home(); // aca pasarle la sesion o algo que nos diga que fue ok, alguna variable para algun cartel
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

        public function logout()
        {
        }
    }
