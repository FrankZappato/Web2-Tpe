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

    public function showCategories()
    {
        $categories = $this->adminModel->getAllCategories();
        $this->adminView->showCategories($categories);
    }

    public function modifyCategory()
    {
        $id_category = $_POST['category-id'];
        $name_category = $_POST['category-name'];
        $color_category = $_POST['category-color'];

        $this->adminModel->modifyCategory($id_category, $name_category, $color_category);
        $this->showCategories();
    }

    public function addCategory()
    {        
        $name_category = $_POST['category-name'];
        $color_category = $_POST['category-color'];

        $this->adminModel->addCategory($name_category, $color_category);        
        $this->showCategories();
    }

    public function deleteCategory()
    {
        $id_category = $_POST['id_category'];
        $this->adminModel->deleteCategory($id_category);        
        $this->showCategories();
    }

}    