<?php
// require_once 'ContentType.php';
require_once 'CourseContent.php';
require_once 'db.php';
class CourseContentDocument extends CourseContent{
    private $document_path;
    private $conn ;

    public function __construct($course_id,$document_path) {
        parent::__construct($course_id);
        $this->document_path = $document_path;
        $this->conn = db::getInstance()->getConnection();
    }

    public function save(){
        // var_dump($this->document_path);die();  
        try{
            $this->conn->beginTransaction();
            $stmt = $this->conn->prepare("INSERT INTO content (course_id, course_type) VALUES (?, 'document')");
            $stmt->execute([$this->course_id,]);

            $content_id = $this->conn->lastInsertId();
            $stmt = $this->conn->prepare("INSERT INTO content_document (content_id, document_path) VALUES (?, ?)");
            $stmt->execute([$content_id,$this->document_path]);
            $this->conn->commit();
             
            $this->content_id = $content_id;
        }catch(Exception $e){
            $this->conn->rollBack();
            echo "error in save function, " .$e->getMessage();
        }
    }

    public function display($course_id){
        $stmt =$this->conn->prepare("SELECT title ,description, type FROM course 
        JOIN content ON course.course_id = content.course_id 
        JOIN content_document ON content.content_id = content_document.content_id;
        WHERE course_id = ?");
        // $result = $this->conn->fetch($stmt,);
        // return $result;
    }
    
}

?>