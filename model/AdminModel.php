<?php

class AdminModel{

    private $db;

    function __construct()
    {
    $this->db = new PDO('mysql:host=localhost;'
    .'dbname=thecave;charset=utf8', 'root', '');
    }

    public function getAllProducts()
    {
        $query = $this->db->prepare("SELECT * FROM products ORDER by id ASC");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    public function getProductsByCategories(){
        $query = $this->db->prepare("SELECT * FROM products,categories WHERE id_category = categories.id
                                    AND categories.name = '?'");//Necesito un value de nombre de categoria que venga por POST y filtrar
    }

    public function addProduct(){
        $id_category = $_POST['product-category'];        
        $imageName = $_POST['product-image'];
        $productName = $_POST['product-name'];
        $price = $_POST['product-price'];

        $query = $this->db->prepare("INSERT INTO products ('id_category','image','name','price')
                                    VALUES ('id','imageName','productName','price')");
        $query->execute(
            array(
                'id' => $id_category,
                'imageName' => $imageName,
                'productName' => $productName,
                'price' => $price
            )
        );        
        
    }
}
