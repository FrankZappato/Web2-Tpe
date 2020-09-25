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
                        echo $password;
                        $hashedPwd = password_hash($password, PASSWORD_DEFAULT);
                        echo $hashedPwd;
                        
                        $stmt = $this->db->prepare($query);

                        $stmt->execute(
                                array(
                                     'papa' => $mailuid                                       
                                )
                        );                                
                            
                        $result = $stmt->fetchAll(PDO::FETCH_OBJ);    //trabajar con el arrayde objetos result                     
                        
                        foreach($result as $r){
                            
                            if(($r->uidUsers == $mailuid)){
                                echo '<p>'.$r->uidUsers.'</p>'.'<p>'. $r->pwdUsers.'</p>';
                            }
                        }
                        /**$count = $stmt->rowCount();
                        echo '<p>'.$count.'</p>';
                        if($count >0){//FALTA VERIFICAR POR PASS Y USUARIO ANDA MAL PERO POR AHI VA LA ONDA
                            $_SESSION['uidUsers'] = $mailuid;
                            
                            return 'connectionSucces';
                        }**/
                        
                    }
                //}
            }catch(PDOException $error){
                return $error;
            }
        }
    }


            /**echo $_POST["emailuid"];
            
                
                
                
                

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
    }**/
