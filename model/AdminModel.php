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
}
