<?php

require_once "../view/AdminView.php";
require_once "../model/AdminModel.php";
require_once "../model/ProductsModel.php";

class AdminController
{
    private $adminView;
    private $productsModel;
    private $adminModel;

    public function __construct()
    {
        $this->adminView = new AdminView();
        $this->productsModel = new ProductsModel();
        $this->adminModel = new AdminModel();
    }

    public function showAdmin( $error_msg_modify = null, $error_msg = null)
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        if ($_SESSION['isAdmin']) {
            $products = $this->productsModel->getAllProductsAdmin();
            $categories = $this->adminModel-> getAllCategories();
            $this->adminView->showAdmin($error_msg_modify, $error_msg, $products, $categories);
        } else {
            header('Location: home');
        }
    }

    public function showPurchases()
    {
        $purchases = $this->adminModel->getAllPurchases();
        $this->adminView->showPurchases($purchases);
    }

    public function showContactMessages()
    {
        $messages = $this->adminModel->getAllMessages();
        $this->adminView->showMessages($messages);
    }
    
    public function showUsers()
    {
        $users = $this->adminModel->getAllUsers();
        $this->adminView->showUsers($users);
    }

    public function deleteUser()
    {   
        if(isset($_POST['id_user'])){
            $id_user = $_POST['id_user'];
            $this->adminModel->deleteUser($id_user);
            $this->showUsers();
        }else{
            $this->showUsers("No existe el usuario con ese id");
        }
    }
    
    public function makeUserAdmin()
    {
        $id_user = $_POST['id_user'];
        $isUserAdmin = $this->adminModel->getUser($id_user);
        $userAdminValue = 0;
        
        if($isUserAdmin->isadmin == 1){
            $this->adminModel->updateUserAdmin($id_user,$userAdminValue);
        }else {
            $userAdminValue = 1;
            $this->adminModel->updateUserAdmin($id_user,$userAdminValue);
        }
        $this->showUsers(); 
    }
}
