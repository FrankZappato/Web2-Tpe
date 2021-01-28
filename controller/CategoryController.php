<?php

require_once "../view/AdminView.php";
require_once "../model/AdminModel.php";

class CategoryController
{
    private $adminView;
    private $adminModel;

    public function __construct()
    {
        $this->adminView = new AdminView();
        $this->adminModel = new AdminModel();
    }

    public function showCategories($error_code = null)
    {
        $categories = $this->adminModel->getAllCategories();
        $this->adminView->showCategories($categories, $error_code);
    }

    public function modifyCategory()
    {
        if (
            isset($_POST['category-id']) && !empty($_POST['category-id']) &&
            isset($_POST['category-name']) && !empty($_POST['category-name']) &&
            isset($_POST['category-color']) && !empty($_POST['category-color'])
            ) {
            $id_category = $_POST['category-id'];
            $name_category = $_POST['category-name'];
            $color_category = $_POST['category-color'];
            $this->adminModel->modifyCategory($id_category, $name_category, $color_category);
            $this->showCategories(null);
        } else {
            $this->showCategories("Error : missing fields");
        }
    }

    public function addCategory()
    {
        if (
            isset($_POST['category-name']) && !empty($_POST['category-name']) &&
            isset($_POST['category-color']) && !empty($_POST['category-color'])
            ) {
            $this->adminModel->addCategory($name_category, $color_category);
            $this->showCategories(null);
        } else {
            $this->showCategories("Error : missing fields");
        }
    }

    public function deleteCategory()
    {
        if (isset($_POST['id_category']) && !empty($_POST['id_category'])) {
            $id_category = $_POST['id_category'];
            $this->adminModel->deleteCategory($id_category);
            $this->showCategories();
        } else {
            $this->showCategories("Error : missing id");
        }
    }
}
