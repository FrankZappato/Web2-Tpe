<?php

class AdminModel
{
    private $db;

    public function __construct()
    {
        $this->db = DbUtils::getDB();
        
    }    

    public function getAllPurchases()
    {
        $query = $this->db->prepare("SELECT * FROM purchases ORDER by date_milis ASC");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);        
    }

    
    //Users
    public function getAllUsers()
    {
        $query = $this->db->prepare("SELECT * FROM users");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);        
    }
    public function getUser($id_user)
    {
        $query = $this->db->prepare("SELECT * FROM users where id = ?");
        $query->execute(array($id_user));
        return $query->fetch(PDO::FETCH_OBJ);        
    }

    public function deleteUser($id_user)
    {
        $query = $this->db->prepare("DELETE from users where id = ?");
        $query->execute(array($id_user));
    }
    
    public function updateUserAdmin($id_user,$userAdminValue)
    {
        $data = [
            'id_user' => $id_user,
            'userAdminValue' => $userAdminValue                       
        ];
        $query = $this->db->prepare("UPDATE users SET isadmin=:userAdminValue
                                     WHERE id=:id_user");
        $query->execute($data);        
    }
    
    //Messages
    public function getAllMessages()
    {
        $query = $this->db->prepare("SELECT * FROM messages");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);        
    }
    public function saveMessage($name, $email, $message)
    {
        session_start();      
        $query = $this->db->prepare("INSERT INTO messages (msg, from_email, username) values
        (?,?,?)");
        return $query->execute(
            array($message,$email,$name)
        );        
    }
    //Categories
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
