<?php

class AdminModel
{
    private $db;

    public function __construct()
    {
        $this->db = new PDO('mysql:host=localhost;'
    .'dbname=thecave;charset=utf8', 'root', '');
    }

<<<<<<< HEAD
    function signup(){
        echo $_POST['uid'];
    if(isset($_POST['signup-submit'])){
        
        $username = $_POST['uid'];    
        $email = $_POST['mail'];    
        $password = $_POST['pwd'];    
        $passwordRepeat = $_POST['pwd-repeat'];

        if(empty($username) ||empty($email)||empty($password)
        ||empty($passwordRepeat)){
            return "emptyFields";
        }
        else if((!filter_var($email , FILTER_VALIDATE_EMAIL))&&(!preg_match("/^[a-zA-Z0-9]*$/",$username))){
            return "invalidEmailAndUser";
        }
        else if(!filter_var($email , FILTER_VALIDATE_EMAIL)){
            return "invalidEmail";
        }else if(!preg_match("/^[a-zA-Z0-9]*$/",$username)){
            return "invalidUser";
        }
        else if($password !== $passwordRepeat){
            return "passwordUnmatch";
        }
        else{       
            $sql = "SELECT uidUsers FROM users WHERE uidUsers=?";
            $statement = mysqli_stmt_init($this->db);
            if(!mysqli_stmt_prepare($statement,$sql)){
            return "SQLConnectionError";
            }
            else{
                mysqli_stmt_bind_param($statement,"s",$username);
                mysqli_stmt_execute($statement);
                mysqli_stmt_store_result($statement);
                $resultCheck = mysqli_stmt_num_rows($statement);
                if($resultCheck > 0){
                    return "userTaken";
                }
                    else {
                        $sql = "INSERT INTO users (uidUsers, emailUsers, pwdUsers) VALUES(?, ?, ?)";
                        $stmt =   mysqli_stmt_init($this->db);
                        if(!mysqli_stmt_prepare($stmt,$sql)){
                            return "SQLError";
                        }
                        else{
                            $hashedPwd = password_hash($password, PASSWORD_DEFAULT);

                            mysqli_stmt_bind_param($stmt,"sss",$username, $email, $hashedPwd);
                            mysqli_stmt_execute($stmt);
                            return "RegisterSuccess";              
                        }
                    }
                } 
                mysqli_stmt_close($statement);
                mysqli_close($this->db);
            }

            echo "<br>----------Aca llegue a la base---------------<br>"; 
        }
=======
    public function getAllPurchases()
    {
        $query = $this->db->prepare("SELECT * FROM purchases ORDER by date_milis ASC");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
>>>>>>> mariano
    }
}
