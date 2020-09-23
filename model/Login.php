<?php
class LoginModel{

    private $db;

    function __construct(){
        $this->db = mysqli_connect('localhost','root','','the_cave_users');
    }
    
    function login(){          
            echo $_POST["emailuid"];

            $mailuid = $_POST['emailuid'];
            $password = $_POST['password'];

            if(empty($mailuid)||empty($password)){
                return "errorEmptyFields";               
            }
            else {
                $sql = "SELECT * FROM users WHERE uidUsers=? OR emailUsers=?;";
                $stmt = mysqli_stmt_init($this->db);
                if(!mysqli_stmt_prepare($stmt, $sql)){
                    return "errorSQLConnection";                    
                }
                else{
                    mysqli_stmt_bind_param($stmt, "ss", $mailuid, $mailuid);
                    mysqli_stmt_execute($stmt);
                    $result = mysqli_stmt_get_result($stmt);
                    if($row = mysqli_fetch_assoc($result)){
                        $pwdCheck = password_verify($password, $row['pwdUsers']);
                        if($pwdCheck == false){
                            return "errorWrongPassword";
                        }
                        else if($pwdCheck == true){//Aca anduvo si pusiste todo Ok!
                           session_start();
                           $_SESSION['userId']= $row['idUsers'];     
                           $_SESSION['userUid']= $row['uidUsers'];
        
                           return "connectionSucces";
                           
                        }
                        else{
                            return "errorWrongPassword"; 
                        }
                    }
                    else{
                        return "errorNoUser";
                    }
                }
            
            echo "<br>----------Aca llegue a la base---------------<br>";  
            
        }
    }
}