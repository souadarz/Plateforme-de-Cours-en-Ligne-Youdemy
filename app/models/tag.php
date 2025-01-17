<?php
require_once __DIR__ . '/../config/database.php';

class Tag extends  DataBase{

    public function __construct()
    {
        parent::__construct();
    }

    public function getTags(){
        try{
            $stmt = $this->conn->prepare("SELECT * FROM tags");
            $stmt->execute();
            $Tags = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $Tags;
        }catch(PDOException $e){
            echo "Error in get Tags: " . $e->getMessage();
        }
    }

    public function AddTag($tag_name){
        try {
            $stmt = $this->conn->prepare("INSERT INTO tags (tag_name) VALUES (?)");
            $stmt->execute([$tag_name]);

        } catch (PDOException $e) {
            echo " Error in add tag" . $e->getMessage();
        }
    }

    public function UpdateTag($tag_name,$id_tag){
        try{
            $stmt = $this->conn->prepare("UPDATE tags SET tag_name = ? WHERE tag_id = ? ");
            $stmt->execute([$tag_name,$id_tag]);
        }catch (PDOException $e) {
            echo " Error in update tag" . $e->getMessage();
        }
    }

    public function DeleteTag($id_tag){
        try{
            $stmt = $this->conn->prepare("DELETE FROM tags WHERE tag_id = ?");
            $stmt->execute([$id_tag]);
        }catch (PDOException $e){
            echo "Eror in delete tag" . $e->getMessage();
        }
    }
}

?>