<?php
require_once __DIR__ . '/../config/database.php';
class Course extends DataBase{

    public function __construct(){
        parent::__construct();
    }
   
    public function addCourse($title, $description,$category_id,$teacher_id){
        $stmt = $this->conn->prepare("INSERT INTO course (title,description,category_id,user_id) VALUES (?,?,?,?)");
        $stmt->execute([$title, $description,$category_id,$teacher_id]);
        $courseId = $this->conn->lastInsertId();
        return $courseId;
    }
    
}