<?php
class LoginModel{

    private $db;

    function __construct(){
        $this->db = new PDO('mysql:host=localhost;'
        .'dbname=the_cave_users;charset=utf8'
        , 'root', '');
    }
    
    function login(){
        session_start();                
            try{
                $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    $mailuid = $_POST['emailuid'];
                    $password = $_POST['password'];
                    if(empty($mailuid)||empty($password)){
                        return "errorEmptyFields";               
                    }
                    else {
                        $query = "SELECT * FROM users";
                        echo $password;
                        $hashedPwd = password_hash($password, PASSWORD_DEFAULT);
                        echo $hashedPwd;
                        
                        $stmt = $this->db->prepare($query);

                        $stmt->execute();                                
                            
                        $result = $stmt->fetchAll(PDO::FETCH_OBJ);    //trabajar con el arrayde objetos result                     
                        
                        foreach($result as $r){
                            
                            if(($r->uidUsers == $mailuid)){
                                echo '<p>'.$r->uidUsers.'</p>'.'<p>'. $r->pwdUsers.'</p>';
                            }
                        }                     
                    }
            
            }catch(PDOException $error){
                return $error;
            }
        }
    }