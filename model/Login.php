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
                //if(isset($_POST['login'])){
                    $mailuid = $_POST['emailuid'];
                    $password = $_POST['password'];
                    if(empty($mailuid)||empty($password)){
                        return "errorEmptyFields";               
                    }
                    else {
                        $query = "SELECT * FROM users WHERE uidUsers = :papa";                        
                        
                        
                        $stmt = $this->db->prepare($query);

                        $stmt->execute(
                                array(
                                     'papa' => $mailuid                                       
                                )
                        );                                
                            
                        $result = $stmt->fetchAll(PDO::FETCH_OBJ);    //trabajar con el arrayde objetos result                     
                        
                        foreach($result as $r){                            
                            if((password_verify($password,$r->pwdUsers))){
                                $_SESSION['uidUsers'] = $mailuid;    
                                return 'connectionSucces';
                                echo "PAPAAAAAAAAAAAAAAAAAAA";
                                echo '<p>'.$r->uidUsers.'</p>'.'<p>'. $r->pwdUsers.'</p>';
                            }
                            else{
                                return 'invalidPassword';
                            }
                        }                       
                    }
                //}
            }catch(PDOException $error){
                return $error;
            }
        }
    }            
