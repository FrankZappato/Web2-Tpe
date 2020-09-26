<?php

require_once "../view/ProductsView.php";
require_once "../model/ProductsModel.php";

class ProductsController
{
    private $view;
    private $model;

    public function __construct()
    {
        $this->view = new ProductsView();
        $this->model = new ProductsModel();
    }

    public function home()
    {
        $products = $this->model->GetAllProducts();
        $this->view->showHome($products);
    }
}
