<?php

class AdminModel{

    private $db;

    function __construct()
    {
    $this->db = new PDO('mysql:host=localhost;'
    .'dbname=thecave;charset=utf8', 'root', '');
    } 
}
