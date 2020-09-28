<?php

require_once "../view/AdminView.php";
require_once "../model/AdminModel.php";

class AdminController
{
    private $adminView;
    private $model;

    public function __construct()
    {
        $this->adminView = new AdminView();
        $this->model = new AdminModel();
    }

    public function showAdmin()
    {
        $products = $this->model->getAllProducts();
        $this->adminView->showAdmin($products);
    }
}