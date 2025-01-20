<?php
require_once 'ContentType.php';
require_once 'CourseContent.php';
class CourseContentDocument extends CourseContent{
    private $document_path;

    public function __construct($course_id,$document_path) {
        parent::__construct($course_id);
        $this->document_path = $document_path;
    }

    public function save(){
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
}

?>