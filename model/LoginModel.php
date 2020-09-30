<?php
class LoginModel
{
    private $db;

    public function __construct()
    {
        $this->db = new PDO('mysql:host=localhost;'
        .'dbname=thecave;charset=utf8', 'root', '');
    }
    
    public function login()
    {
        try {
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $email = $_POST['email'];
            $password = $_POST['password'];
            if (empty($email)||empty($password)) {
                return "Error: Empty Fields";
            } else {
                $query = "SELECT * FROM users WHERE email = :email";
                $stmt = $this->db->prepare($query);
                $stmt->execute(
                    array('email' => $email)
                );
                $result = $stmt->fetchAll(PDO::FETCH_OBJ);
                if ($stmt->rowCount() == 0) {
                    return 'Error: No user with that email';
                }
                foreach ($result as $r) {
                    if ((password_verify($password, $r->pwd))) {
                        session_start();
                        $_SESSION['uidUsers'] = $r->id;
                        $_SESSION['logged'] = true;
                        if ($r->isadmin == 1) {
                            $_SESSION['isAdmin'] = true;
                        } else {
                            $_SESSION['isAdmin'] = false;
                        }
                        return 'connectionSucces';
                    } else {
                        return 'Error: Invalid Password';
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
                $username = $_POST['username'];
                $email = $_POST['email'];
                $password = $_POST['password'];
                $passwordRepeat = $_POST['password-repeat'];
                if (empty($username) ||empty($email)||empty($password)
                ||empty($passwordRepeat)) {
                    return "Error: Empty Fields";
                } elseif ((!filter_var($email, FILTER_VALIDATE_EMAIL))&&(!preg_match("/^[a-zA-Z0-9]*$/", $username))) {
                    return "Error: Invalid Fields";
                } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    return "Error: Invalid Email";
                } elseif (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
                    return "Error: Invalid User";
                } elseif ($password !== $passwordRepeat) {
                    return "Error: Password Not Match";
                } else {
                    $query = "SELECT * FROM users WHERE email= :email";
                    $statement = $this->db->prepare($query);
                    
                    $statement->execute(
                        array(
                                'email' => $email
                            )
                    );

                    $count = $statement->rowCount();
                    if ($count > 0) {
                        return "Error: Email already taken";
                    } else {
                        $sql = "INSERT INTO users (username, email, pwd, isadmin) VALUES(?, ?, ?, ?)";
                        $stmt = $this->db->prepare($sql);
                        $hashedPwd = password_hash($password, PASSWORD_DEFAULT);
                        $stmt->execute(
                            array($username, $email, $hashedPwd, 0)
                        );
                        $result = $statement->fetchAll(PDO::FETCH_OBJ);
                        return "registerSuccess";
                    }
                }
            } catch (PDOException $error) {
                return $error;
            }
        }
    }
}
