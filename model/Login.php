<?php


class Login{

    private $db;

    function __construct(){
        $this->db = mysqli_connect('localhost','root','','the_cave_users');
    }

    function login($keys){
        $username = $keys[1];
        $password = $keys[2];
        $query = "SELECT * FROM users where username = '$username' and password='$password'";
        $result = mysqli_query($this->db,$query);
        echo "<br>-------------------------<br>";
        var_dump($result);
    }
}