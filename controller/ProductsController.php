<?php

require_once "../view/ProductsView.php";
require_once "../model/ProductsModel.php";
require_once '../controller/AdminController.php';

class ProductsController
{
    private $view;
    private $model;
    private $adminController;

    public function __construct()
    {
        $this->view = new ProductsView();
        $this->model = new ProductsModel();
        $this->adminController = new AdminController();
    }

    public function showProducts($isLogged)
    {
        $products = $this->model->getAllProducts();
        $this->view->showProducts($products, $isLogged);
    }

    public function deleteProduct()
    {
        $this->model->deleteProduct();
        $this->adminController->showAdmin();
    }

    public function addProduct()
    {
        $this->model->addProduct();
        $this->adminController->showAdmin();
    }
}
