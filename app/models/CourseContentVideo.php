<?php
require_once 'ContentType.php';
require_once 'CourseContent.php';
class CourseContentVideo extends CourseContent{
    private $video_url;

    public function __construct($course_id,$video_url) {
        parent::__construct($course_id);
        $this->video_url = $video_url;
    }

    public function save(){
        try{
            $this->conn->beginTransaction();
            $stmt = $this->conn->prepare("INSERT INTO content (course_id, course_type) VALUES (?, 'video')");
            $stmt->execute([$this->course_id]);

            $content_id = $this->conn->lastInsertId();
            $stmt = $this->conn->prepare("INSERT INTO content_document (content_id, document_path) VALUES (?, ?)");
            $stmt->execute([$content_id,$this->video_url]);
            $this->conn->commit();
            $this->content_id = $content_id;
        }catch(Exception $e){
            $this->conn->rollBack();
            echo "error in save function, " .$e->getMessage();
        }
    }
}