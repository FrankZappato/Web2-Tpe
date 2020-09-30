<?php

require_once "../view/AdminView.php";
require_once "../model/AdminModel.php";
require_once "../model/ProductsModel.php";

class AdminController
{
    private $adminView;
    private $model;

    public function __construct()
    {
        $this->adminView = new AdminView();
        $this->model = new ProductsModel();
    }

    public function showAdmin()
    {
        $products = $this->model->getAllProducts();
        $this->adminView->showAdmin($products);
    }

    public function addProduct()
    {
        $this->model->addProduct();
        $products = $this->model->getAllProducts();
        $this->adminView->showAdmin($products);
    }

    function modifyProduct()    
    {        
        $this->model->modifyProduct();
        $products = $this->model->getAllProducts();
        $this->adminView->showAdmin($products);

    }
}