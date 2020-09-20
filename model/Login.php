<?php
class Login{

    private $db;

    function __construct(){
        $this->db = mysqli_connect('localhost','root','','the_cave_users');
    }

    function login(){    
        echo $_POST["email"];
        echo "<br>----------Aca llegue a la base---------------<br>";   
    }
}