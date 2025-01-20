<?php
require_once 'db.php';
class Course {
    private $conn ;
    public function __construct(){
       
        $this->conn = db::getInstance()->getConnection();
    }
   
    public function addCourse($title, $description,$category_id,$teacher_id){
     
        $stmt = $this->conn->prepare("INSERT INTO course (title,description,category_id,user_id) VALUES (?,?,?,?)");
        $stmt->execute([$title, $description,$category_id,$teacher_id]);
        $courseId = $this->conn->lastInsertId();
        return $courseId;
    }
    

}