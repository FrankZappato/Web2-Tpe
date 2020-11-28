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

        public function login($newUser)
        {
            if ($newUser != null) {
                session_start();
                $_SESSION['userId'] = $user->id;
                $_SESSION['isLogged'] = true;
                if ($user->isadmin == 1) {
                    $_SESSION['isAdmin'] = true;
                    $this->adminController-> showAdmin();
                } else {
                    $_SESSION['isAdmin'] = false;
                    $this->productsController->showProducts();
                }
            }
            if (isset($_POST['email']) && isset($_POST['password'])) {
                $email = $_POST['email'];
                $password = $_POST['password'];
           
                if (empty($email)||empty($password)) {
                    $this->loginView->showLoginForm("Error: Empty Fields");
                } else {
                    $user = $this->loginModel->getUser($email);
                    if (isset($user) && $user) {
                        if (password_verify($password, $user->pwd)) {
                            session_start();
                            $_SESSION['userId'] = $user->id;
                            $_SESSION['isLogged'] = true;
                            if ($user->isadmin == 1) {
                                $_SESSION['isAdmin'] = true;
                                $this->adminController-> showAdmin();
                            } else {
                                $_SESSION['isAdmin'] = false;
                                $this->productsController->showProducts();
                            }
                        } else {
                            $this->loginView->showLoginFormF('Error: Invalid Password');
                        }
                    } else {
                        $this->loginView->showLoginForm('Error: No user with that email');
                    }
                }
            } else {
                $this->loginView->showLoginForm('Error: missing fields');
            }
        }

        public function showLoginForm()
        {
            $this->loginView->showLoginForm(null);
        }

        public function signUp()
        {
            if (isset($_POST['signup-submit'])) {
                
                if (isset($_POST['email']) && isset($_POST['password']) && isset($_POST['username']) && isset($_POST['password-repeat'])){
                    $username = $_POST['username'];
                    $email = $_POST['email'];
                    $password = $_POST['password'];
                    $passwordRepeat = $_POST['password-repeat'];
                    if (empty($username) ||empty($email)||empty($password)
                ||empty($passwordRepeat)) {
                        $this->loginView->showSignUpForm("Error: Empty Fields");
                    } elseif ((!filter_var($email, FILTER_VALIDATE_EMAIL))&&(!preg_match("/^[a-zA-Z0-9]*$/", $username))) {
                        $this->loginView->showSignUpForm("Error: Invalid Fields");
                    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                        $this->loginView->showSignUpForm("Error: Invalid Email");
                    } elseif (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
                        $this->loginView->showSignUpForm("Error: Invalid User");
                    } elseif ($password !== $passwordRepeat) {
                        $this->loginView->showSignUpForm("Error: Password Not Match");
                    } else {
                        $user = $this->loginModel->checkUser($email);
                        if ($user && ($user->email == $email)) {
                            $this->loginView->showSignUpForm("Error: Email already taken");
                        } else {
                            $hashedPwd = password_hash($password, PASSWORD_DEFAULT);
                            $isAdmin = 0;
                            $newUser = $this->loginModel->addNewUser($username, $email, $hashedPwd, $isAdmin);
                            $this->login($newUser);
                        }
                    }
                } else{
                    $this->loginView->showSignUpForm("Error: Missing fields");
                }
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
            $this->loginView->showLoginForm(null);
        }
    }
