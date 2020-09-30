<?php

class AdminModel{

    private $db;

    function __construct()
    {
    $this->db = new PDO('mysql:host=localhost;'
    .'dbname=thecave;charset=utf8', 'root', '');
<<<<<<< HEAD
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
    
=======
    } 
>>>>>>> mariano
}
