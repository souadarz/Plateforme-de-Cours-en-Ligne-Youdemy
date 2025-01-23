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

    // public function update

    public function updateCourse($title,$description,$course_id){
        try{
            $stmt = $this->conn->prepare("UPDATE course SET title = ?,description = ? WHERE course_id = ?");
            $stmt->execute([$title,$description,$course_id]);
        }catch(Exception $e){
            echo "error ". $e->getMessage();
        }
    }

    public function getCoursesTeacher($user_id){
        try{
            $stmt = $this->conn->prepare("SELECT course.*,categories.category_name FROM course 
                                        JOIN categories ON course.category_id = categories.category_id
                                        WHERE course.user_id = ?");
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
            echo "Error in get course by id : " . $e->getMessage();
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

    public function getNbreCourse(){
        $query = $this->conn->prepare("SELECT COUNT(*) AS total_course FROM course");
        $query->execute();
        $total_courses = $query->fetch(PDO::FETCH_ASSOC);
        return $total_courses;
    }

    public function getCourseByCategry(){
        $query = $this->conn->prepare("SELECT COUNT(*) AS total_courses, category_name FROM course 
                                    JOIN categories WHERE course.category_id = categories.category_id
                                    GROUP BY category_name;");
        $query->execute();
        $total_Courses = $query->fetchAll(PDO::FETCH_ASSOC);
        return $total_Courses;
    }

    public function getNbrCourseTeacher($user_id){
        $query = $this->conn->prepare("SELECT COUNT(*) AS total_cours FROM course WHERE user_id = ?");
        $query->execute([$user_id]);
        $total_courses = $query->fetch(PDO::FETCH_ASSOC);
        return $total_courses;
    }

    public function getCoursesStudent($user_id){
        $stmt = $this->conn->prepare("SELECT enrollment.* , course.* FROM enrollment  
                                    LEFT JOIN course ON enrollment.course_id = course.course_id
                                    WHERE enrollment.user_id = ?");
        $stmt->execute([$user_id]);
        $coursesStudent = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $coursesStudent;
    }
    public function getDetailsCourse($course_id){
        $stmt =$this->conn->prepare("SELECT course.*,categories.category_name,content_document.document_path AS url,users.full_name,content.course_type FROM course
                                    JOIN categories ON course.category_id = categories.category_id
                                    JOIN content ON content.course_id = course.course_id
                                    JOIN content_document ON content_document.content_id = content.content_id
                                    JOIN users ON course.user_id = users.user_id
                                    WHERE course.course_id = ?
                                    UNION
                                    SELECT course.*,categories.category_name,content_video.video_url AS url,users.full_name,content.course_type FROM course
                                    JOIN categories ON course.category_id = categories.category_id
                                    JOIN content ON content.course_id = course.course_id
                                    JOIN content_video ON content_video.content_id = content.content_id
                                    JOIN users ON course.user_id = users.user_id
                                    WHERE course.course_id = ?");
        $stmt->execute([$course_id,$course_id]);
        $courseDetails = $stmt->fetch(PDO::FETCH_ASSOC);
        return $courseDetails;
}
}