<?php
class CommentaryModel
{
    private $db;

    public function __construct()
    {
        $this->db = new PDO('mysql:host=localhost;'
        .'dbname=thecave;charset=utf8', 'root', '');
    }



    public function getCommentaries($id_product){        
        $statement = $this->db->prepare("SELECT * FROM commentaries WHERE id_product=?");
        $statement->execute(array($id_product));
        return $statement->fetch(PDO::FETCH_OBJ);        
    }

}