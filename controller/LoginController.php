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

        public function login(){
                $email = $_POST['email'];
                $password = $_POST['password'];
                if (empty($email)||empty($password)) {                
                $this->loginView->showLoginForm("Error: Empty Fields",null);
                }else{
                   $user = $this->loginModel->getUser($email);                   
                   if(isset($user) && $user){          
                       //Si existe el usuario
                    if(password_verify($password, $user->pwd)){//verifico el pass
                        session_start();
                        $_SESSION['uidUsers'] = $user->id;
                        $_SESSION['logged'] = true;
                        if ($user->isadmin == 1) {
                            $_SESSION['isAdmin'] = true;
                            $this->adminController-> showAdmin();
                        } else {
                            $_SESSION['isAdmin'] = false;
                            $this->productsController->showProducts($_SESSION['logged']);
                        }                        
                      }else{                          
                          $this->loginView->showLoginForm('Error: Invalid Password',null);
                      }
                   }else{$this->loginView->showLoginForm('Error: No user with that email',null);}
                }
        } 

        

        public function showLoginForm()
        {
            $this->loginView->showLoginForm(null, null);
        }

        public function signUp()
        {
            if (isset($_POST['signup-submit'])) {
                $username = $_POST['username'];
                $email = $_POST['email'];
                $password = $_POST['password'];
                $passwordRepeat = $_POST['password-repeat'];
                if (empty($username) ||empty($email)||empty($password)
                ||empty($passwordRepeat)) {
                    $this->loginView->showSignUpForm("Error: Empty Fields");
                    
                }elseif ((!filter_var($email, FILTER_VALIDATE_EMAIL))&&(!preg_match("/^[a-zA-Z0-9]*$/", $username))) {
                    $this->loginView->showSignUpForm("Error: Invalid Fields");
                    
                } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $this->loginView->showSignUpForm("Error: Invalid Email");
                    
                } elseif (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
                    $this->loginView->showSignUpForm("Error: Invalid User");
                    
                } elseif ($password !== $passwordRepeat) {
                    $this->loginView->showSignUpForm("Error: Password Not Match");
                    
                } else {
                    $user = $this->loginModel->checkUser($email);
                    //var_dump($user);
                    if($user && ($user->email == $email)){
                        $this->loginView->showSignUpForm("Error: Email already taken");
                        
                    }else{
                        $hashedPwd = password_hash($password , PASSWORD_DEFAULT);
                        $isAdmin = 0;
                        $this->loginModel->addNewUser($username, $email, $hashedPwd, $isAdmin);
                        $this->loginView->showLoginForm(null, null);
                    }
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
            $this->loginView->showLoginForm(null, "");
        }
    }
