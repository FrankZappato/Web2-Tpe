<?php

class ProductsModel
{
    private $db;

    public function __construct()
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

    public function addProduct(){
        $id_category = $_POST['product-category'];        
        $imageName = $_POST['product-image'];
        $productName = $_POST['product-name'];
        $price = $_POST['product-price'];

        $query = $this->db->prepare("INSERT INTO products (id_category, img_product, name_product, price)
                                    VALUES (?,?,?,?)");
        $query->execute(
            array($id_category,$imageName,$productName,$price)
        );    
    }

    public function modifyProduct(){
        $product_id = $_POST['product-id'];
        $id_category = $_POST['product-category'];        
        $imageName = $_POST['product-image'];
        $productName = $_POST['product-name'];
        $price = $_POST['product-price'];

        $query = $this->db->prepare("UPDATE products SET (id_category, img_product, name_product, price)
                                    VALUES (?,?,?,?) WHERE id = ?");
        $query->execute(
            array($id_category,$imageName,$productName,$price,$product_id)
        );    
    }
}
