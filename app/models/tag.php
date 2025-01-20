<?php
require_once 'db.php';

class Tag {
    private $conn ;
    public function __construct()
    {
        $this->conn = db::getInstance()->getConnection();
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

    public function AddTag($tag){
        try {
                $stmt = $this->conn->prepare("SELECT tag_id FROM tags WHERE tag_name = ?");
                $stmt->execute([$tag]);
                if($stmt->rowCount() === 0){
                        $stmt = $this->conn->prepare("INSERT INTO tags (tag_name) VALUES (?)");
                        $stmt->execute([$tag]);
                }
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