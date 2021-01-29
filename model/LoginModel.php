<?php
require_once "../model/DbUtils.php";

class LoginModel
{
    private $db;

    public function __construct()
    {
        $this->db = DbUtils::getDB();
    }

    public function getUser($email){        
        $statement = $this->db->prepare("SELECT * FROM users WHERE email=?");
        $statement->execute(array($email));
        return $statement->fetch(PDO::FETCH_OBJ);            
    }
    public function checkUser($username){
        $statement = $this->db->prepare( "SELECT * FROM users WHERE email=?");
        $statement->execute(array($username));
        return $statement->fetch(PDO::FETCH_OBJ);        
    }

    public function addNewUser($username, $email, $hashedPwd, $isAdmin){
        $sql = "INSERT INTO users (username, email, pwd, isadmin) VALUES(?, ?, ?, ?)";
        $stmt = $this->db->prepare($sql);
        $stmt->execute(
            array($username, $email, $hashedPwd, $isAdmin)
        );
        return  $stmt->fetchAll(PDO::FETCH_OBJ);        
    }   
    
}
