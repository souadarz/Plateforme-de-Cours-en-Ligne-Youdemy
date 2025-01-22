<?php

require_once 'db.php';
class Enrollement {
    private $conn;

    public function __construct() {
        $this->conn = db::getInstance()->getConnection();
    }
    public function enrollement($user_id,$course_id){
        try{
            $stmt = $this->conn->prepare("INSERT INTO enrollment (user_id,course_id) VALUES (?,?)");
            $stmt->execute([$user_id,$course_id]);
        }catch(PDOException $e){
            echo "Error in enrolle: " . $e->getMessage();
        }
    }
}

?>