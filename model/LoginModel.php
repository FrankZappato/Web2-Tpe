<?php
class LoginModel
{
    private $db;

    public function __construct()
    {
        $this->db = new PDO('mysql:host=localhost;'
        .'dbname=the_cave_users;charset=utf8', 'root', '');
    }
    
    public function login()
    {
        session_start();
        try {
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $mailuid = $_POST['emailuid'];
            $password = $_POST['password'];
            if (empty($mailuid)||empty($password)) {
                return "Error:Empty Fields";
            } else {
                $query = "SELECT * FROM users WHERE uidUsers = :user";
                        
                        
                $stmt = $this->db->prepare($query);

                $stmt->execute(
                    array(
                                     'user' => $mailuid
                                )
                );
                            
                $result = $stmt->fetchAll(PDO::FETCH_OBJ);    //trabajar con el arrayde objetos result
                        
                foreach ($result as $r) {
                    if ((password_verify($password, $r->pwdUsers))) {
                        $_SESSION['uidUsers'] = $mailuid;
                        return 'connectionSucces';
                        echo "PAPAAAAAAAAAAAAAAAAAAA";
                        echo '<p>'.$r->uidUsers.'</p>'.'<p>'. $r->pwdUsers.'</p>';
                    } else {
                        return 'invalidPassword';
                    }
                }
            }
        } catch (PDOException $error) {
            return $error;
        }
    }
     
    
    public function signUp()
    {
        if (isset($_POST['signup-submit'])) {
            try {
                $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $username = $_POST['uid'];
                $email = $_POST['mail'];
                $password = $_POST['pwd'];
                $passwordRepeat = $_POST['pwd-repeat'];
        
                if (empty($username) ||empty($email)||empty($password)
                ||empty($passwordRepeat)) {
                    return "emptyFields";
                } elseif ((!filter_var($email, FILTER_VALIDATE_EMAIL))&&(!preg_match("/^[a-zA-Z0-9]*$/", $username))) {
                    return "invalidEmailAndUser";
                } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    return "invalidEmail";
                } elseif (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
                    return "invalidUser";
                } elseif ($password !== $passwordRepeat) {
                    return "passwordUnmatch";
                } else {
                    $query = "SELECT uidUsers FROM users WHERE uidUsers= :user";
                    $statement = $this->db->prepare($query);
                    
                    $statement->execute(
                        array(
                                'user' => $username
                            )
                    );

                    $count = $statement->rowCount();
                    echo $count;
                    if ($count > 0) {
                        echo "<br>----------El usuario ha sido tomado---------------<br>";
                        return "userTaken";
                    } else {
                        $sql = "INSERT INTO users (uidUsers, emailUsers, pwdUsers) VALUES(?, ?, ?)";
                        $stmt = $this->db->prepare($sql);
                        $hashedPwd = password_hash($password, PASSWORD_DEFAULT);
                        $stmt->execute(
                            array($username,$email,$hashedPwd)
                        );
                        $result = $statement->fetchAll(PDO::FETCH_OBJ);
                        foreach ($result as $r) {
                            echo $r->uidUsers;
                            echo $r->emailUsers;
                        }
                        echo "<br>----------Aca llegue a la base---------------<br>";
                        return "registerSuccess";
                    }
                }
            } catch (PDOException $error) {
                return $error;
            }
        }
    }
}
