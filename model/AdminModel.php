<?php

class AdminModel
{
    private $db;

    public function __construct()
    {
        $this->db = new PDO('mysql:host=localhost;'
    .'dbname=thecave;charset=utf8', 'root', '');
    }

    public function getAllPurchases()
    {
        $query = $this->db->prepare("SELECT * FROM purchases ORDER by date_milis ASC");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }
}
