<?php
require_once 'db.php';
class Course {
    private $conn ;
    public function __construct(){
       
        $this->conn = db::getInstance()->getConnection();
    }
   
    public function addCourse($title, $description,$category_id,$teacher_id,$tags){
        try{
            $this->conn->beginTransaction();
            $stmt = $this->conn->prepare("INSERT INTO course (title,description,category_id,user_id) VALUES (?,?,?,?)");
            $stmt->execute([$title, $description,$category_id,$teacher_id]);
            $course_id = $this->conn->lastInsertId();
            
            $stmt = $this->conn->prepare("INSERT INTO tagcourse (course_id,tag_id) VALUES (?,?)");
            foreach($tags as $tag){
                $stmt->execute([$course_id,$tag]);
            }
                $this->conn->commit();
            
            return $course_id;
        }catch(Exception $e){
            $this->conn->rollBack();
            echo "Error in add couse" .$e->getMessage();
        }
    }

    public function getAllCourses(){
        try{
            $stmt = $this->conn->prepare("SELECT * FROM course ");
            $stmt->execute();
            $AllCourses = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $AllCourses;
        }catch(PDOException $e){
            echo "Error in get All courses: " . $e->getMessage();
        }
    }

    public function updateCourse($course_id){
        try{
            $stmt = $this->conn->prepare("UPDATE course SET title = ?,description = ?,category_id = ? WHERE course_id = ?");
            $stmt->execute([$course_id]);
        }catch(Exception $e){
            echo "error ". $e->getMessage();
        }
    }

    // public function update

    public function getCourses($user_id){
        try{
            $stmt = $this->conn->prepare("SELECT * FROM course WHERE user_id = ?");
            $stmt->execute([$user_id]);
            $courses = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $courses;
        }catch(PDOException $e){
            echo "Error in get courses: " . $e->getMessage();
        }
    }

    public function getCourseById($course_id){
        try{
            $stmt = $this->conn->prepare("SELECT * FROM course WHERE course_id = ?");
            $stmt->execute([$course_id]);
            $course = $stmt->fetch(PDO::FETCH_ASSOC);
            return $course;
        }catch(PDOException $e){
            echo "Error in get courses: " . $e->getMessage();
        }
    }

    public function deleteCourse($course_id) {
        try{
            $stmt = $this->conn->prepare("DELETE FROM course WHERE course_id = ?");
            $stmt->execute([$course_id]);
        }catch(PDOException $e){
            echo "Error in get course: " . $e->getMessage();
        }
    }
}