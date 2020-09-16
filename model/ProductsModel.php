<?php

class ProductsModel{

    private $db;

    function __construct(){
        $this->db = mysqli_connect('localhost','root','','the_cave');
    }
         
      function GetAllProducts(){
        $query = 'SELECT * FROM products ORDER by id ASC';
        return $result = mysqli_query($this->db,$query);  
      }
      
      /*function InsertTask($title,$description,$completed,$priority){
          $sentencia = $this->db->prepare("INSERT INTO task(title, description, completed, priority) VALUES(?,?,?,?)");
          $sentencia->execute(array($title,$description,$completed,$priority));
      }
      
      function DeleteTaskDelModelo($task_id){
          $sentencia = $this->db->prepare("DELETE FROM task WHERE id=?");
          $sentencia->execute(array($task_id));
      }
      
      function MarkAsCompletedTask($task_id){
          $sentencia = $this->db->prepare("UPDATE task SET completed=1 WHERE id=?");
          $sentencia->execute(array($task_id));
      
      }
      */
      
}

?>
