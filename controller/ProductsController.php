<?php

require_once "../view/ProductsView.php";
require_once "../model/ProductsModel.php";

class ProductsController{

    private $view;
    private $model;

    function __construct(){
        $this->view = new ProductsView();
        $this->model = new ProductsModel();

    }


    function Home(){
        $products = $this->model->GetAllProducts();
        $this->view->ShowHome($products);
    }




}




?>