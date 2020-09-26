<?php

class ProductsModel
{
    private $db;

    public function __construct()
    {
        $this->db = new PDO('mysql:host=localhost;'
    .'dbname=the_cave;charset=utf8', 'root', '');
    }

    public function GetAllProducts()
    {
        $query = $this->db->prepare("SELECT * FROM products ORDER by id ASC");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }
}
