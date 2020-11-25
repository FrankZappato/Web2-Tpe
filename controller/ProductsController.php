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

    public function showProducts()
    {
        if (isset($_GET['search'])) {
            $search = $_GET['search'];
        } else {
            $search = null;
        }

        $dataToReturn = $this->model->getAllProducts($search);
        var_dump($dataToReturn);
        $categories = $this->model->getAllCategories();
        $this->view->showProducts($dataToReturn, $categories);
    }

    public function showFilteredProducts()
    {
        $search = $_POST['search'];
        if ($search == 'All' && isset($_POST['search'])) {
            $this->showProducts();
        } else {
            $dataToReturn = $this->model->getProductsByCategories($search);
            var_dump($dataToReturn);
            echo "---------";
            $categories = $this->model->getAllCategories();
            $this->view->showProducts($dataToReturn, $categories);
        }
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

    public function modifyProduct()
    {
        $this->model->modifyProduct();
        $this->adminController->showAdmin();
    }

    public function deleteFromCart()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        foreach ($_SESSION['shopping_cart'] as $key => $product) {
            if ($product['id'] == $_POST['id_item_on_cart']) {
                unset($_SESSION['shopping_cart'][$key]);
            }
        }
        $this->showProducts();
    }

    public function addToCart()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        //create cart if not created
        if (isset($_SESSION['shopping_cart'])) {
            $count = count($_SESSION['shopping_cart']);
            //we isolate the ids into a new array
            $products_ids = array_column($_SESSION['shopping_cart'], 'id');
            //check if product already exist in cart
            if (!in_array($_POST['id'], $products_ids)) {
                $_SESSION['shopping_cart'][ $count ] = array(
                    'id' => $_POST['id'],
                    'price' => $_POST['price'],
                    'name' => $_POST['name'],
                    'quantity' => $_POST['quantity'],
                    'total' => $_POST['quantity'] * $_POST['price']
                );
            } else {
                for ($i = 0; $i < count($products_ids); $i++) {
                    if ($products_ids[$i] == $_POST['id']) {
                        //just add quantity into the existing item on session
                        $_SESSION['shopping_cart'][$i]['quantity'] += $_POST['quantity'];
                        $_SESSION['shopping_cart'][$i]['total'] += $_POST['quantity'] * $_POST['price'];
                    }
                }
            }
        } else {
            //if cart is not created, we create one
            $_SESSION['shopping_cart'][0] = array(
                'id' => $_POST['id'],
                'price' => $_POST['price'],
                'name' => $_POST['name'],
                'quantity' => $_POST['quantity'],
                'total' => $_POST['quantity'] * $_POST['price']
            );
        }
        //session_destroy();
        $this->showProducts();
    }
}
