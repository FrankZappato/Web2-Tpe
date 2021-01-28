<?php
class CommentaryModel
{
    private $db;

    public function __construct()
    {
        $this->db = new PDO(getenv("DB_DNS").';',
         getenv("DB_USER"), getenv("DB_PASS"));
    }

    public function getCommentaries($id_product){        
        $statement = $this->db->prepare("SELECT * FROM commentaries WHERE id_product=?");
        $statement->execute(array($id_product));
        return $statement->fetchAll(PDO::FETCH_OBJ);        
    }

    public function addCommentary($from, $body, $rating, $id_product){
        $statement = $this->db->prepare("INSERT INTO commentaries (rating, from_user, id_product, commentary) VALUES (?,?,?,?)");
        $statement->execute(array($rating, $from, $id_product, $body));
    }

    public function deleteCommentary($id_product)
    {
        $query = $this->db->prepare("DELETE from commentaries where id = ?");
        $query->execute(
            array($id_product)
        );        
    }
}