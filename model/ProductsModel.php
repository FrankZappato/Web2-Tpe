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
        $query = $this->db->prepare("SELECT products.id, products.name_product, products.img_product, categories.category_name, products.price, products.details
        FROM products
        LEFT JOIN categories ON products.id_category = categories.id");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }
    public function getAllCategories()
    {
        $query = $this->db->prepare("SELECT * FROM categories ORDER by id ASC");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    public function addProduct($imagen = null)
    {
        $id_category = $_POST['product-category'];        
        $productName = $_POST['product-name'];
        $price = $_POST['product-price'];
        $details = $_POST['details'];

        $pathImg = null;
        if ($imagen)
            $pathImg = $this->uploadImage($imagen);


        $query = $this->db->prepare("INSERT INTO products (id_category, img_product, name_product, price, details)
                                    VALUES (?,?,?,?,?)");
        $query->execute(
            array($id_category,$pathImg,$productName,$price, $details)
        );
    }
    private function uploadImage($image){
        $target = "../images/";
        $targetPiece =  uniqid() . "." . strtolower(pathinfo($image['name'], PATHINFO_EXTENSION));  
        move_uploaded_file($image['tmp_name'], $target . $targetPiece);
        return $targetPiece;
    }

    public function deleteProduct()
    {
        $id_product = $_POST['id_product'];
        $query = $this->db->prepare("DELETE from products where id = ?");
        $query->execute(
            array($id_product)
        );
    }

    
    public function getProductsByCategories($search)
    {        
        $query = $this->db->prepare("SELECT * FROM products,categories WHERE id_category = categories.id
                                    AND categories.category_name = ?");//Necesito un value de nombre de categoria que venga por POST y filtrar
        $query->execute(array($search));
        return $query->fetchAll(PDO::FETCH_OBJ);                            
    }

    public function modifyProduct()
    {
        $product_id = $_POST['product-id'];
        $id_category = $_POST['product-category'];
        $imageName = $_POST['product-image'];
        $productName = $_POST['product-name'];
        $price = $_POST['product-price'];
        $details = $_POST['details'];


        $data = [
            'category_id' => $id_category,
            'imgName' => $imageName,
            'nameProd' => $productName,
            'price' => $price,
            'ide' =>  $product_id,
            'details' => $details
        ];
        $query = $this->db->prepare("UPDATE products SET price=:price, 
        id_category=:category_id, img_product=:imgName, name_product=:nameProd, details=:details WHERE id=:ide");
        $query->execute($data);
    }
}
