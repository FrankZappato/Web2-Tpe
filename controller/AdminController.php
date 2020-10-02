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

    public function showAdmin()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        if ($_SESSION['isAdmin']) {
            $products = $this->productsModel->getAllProducts();
            $this->adminView->showAdmin($products);
        } else {
            header('Location: home');
        }
    }

    public function showPurchases()
    {
        $purchases = $this->adminModel->getAllPurchases();
        $this->adminView->showPurchases($purchases);
    }
   
}
