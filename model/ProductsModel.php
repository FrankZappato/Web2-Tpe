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

    public function addProduct()
    {
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

    public function deleteProduct()
    {
        $id_product = $_POST['id_product'];
        $query = $this->db->prepare("DELETE from products where id = ?");
        $query->execute(
            array($id_product)
        );
    }

    
    public function getProductsByCategories()
    {
        $query = $this->db->prepare("SELECT * FROM products,categories WHERE id_category = categories.id
                                    AND categories.name = '?'");//Necesito un value de nombre de categoria que venga por POST y filtrar
    }

    public function modifyProduct(){
        var_dump($_POST);
        $product_id = $_POST['product-id'];
        $id_category = $_POST['product-category'];        
        $imageName = $_POST['product-image'];
        $productName = $_POST['product-name'];
        $price = $_POST['product-price'];

        $data = [
                'category_id' => $id_category,
                'imgName' => $imageName,
                'nameProd' => $productName,
                'price' => $price,
                'ide' => $product_id,
        ];
        $query = $this->db->prepare("UPDATE products SET id_category=:category_id, img_product=:imgName, name_product=:nameProd,
                                     price=:price WHERE id=:ide");
        $query->execute($data);    
    }
}
