<?php

require_once "../view/AdminView.php";
require_once "../model/AdminModel.php";
require_once "../model/ProductsModel.php";

class AdminController
{
    private $adminView;
    private $productsModel;

    public function __construct()
    {
        $this->adminView = new AdminView();
        $this->productsModel = new ProductsModel();
    }

    public function showAdmin()
    {
        $products = $this->productsModel->getAllProducts();
        $this->adminView->showAdmin($products);
    }
}
