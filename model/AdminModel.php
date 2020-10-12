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

    public function getAllMessages()
    {
        $query = $this->db->prepare("SELECT * FROM messages");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    public function saveMessage()
    {
        session_start();
        $username = $_POST['name'];
        $email = $_POST['email'];
        $message = $_POST['message'];
        $userId = $_SESSION['userId'];
        $query = $this->db->prepare("INSERT INTO messages (id_user, msg, from_email, username) values
        (?,?,?,?)");

        return $query->execute(
            array($userId,$message,$email,$username)
        );
    }
    
    public function getAllCategories()
    {
        $query = $this->db->prepare("SELECT * FROM categories");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    public function addCategory($name_category, $color_category)
    {
        $query = $this->db->prepare("INSERT INTO categories (color , category_name)
                                    VALUES (?,?)");
        $query->execute(
            array($color_category, $name_category)
        );
    }

    public function modifyCategory($id_category, $name_category, $color_category)
    {
        $data = [
            'category_id' => $id_category,
            'category_name' => $name_category,
            'categoryColor' => $color_category            
        ];
        $query = $this->db->prepare("UPDATE categories SET category_name=:category_name, color=:categoryColor
                                     WHERE id=:category_id");
        $query->execute($data);
    }

    public function deleteCategory($id_category)
    {
        $query = $this->db->prepare("DELETE from categories where id = ?");
        $query->execute(array($id_category));
    }
}
