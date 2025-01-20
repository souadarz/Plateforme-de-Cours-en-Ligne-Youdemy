<?php
// require_once __DIR__ . 'db.php';
abstract class CourseContent {

    protected $content_id;
    protected $course_id;
    protected $course_type;

    public function __construct($course_id)
    {
        $this->course_id = $course_id;
        // $this->content_id = $content_id;
        // $this->course_type = $course_type;
        // $this->conn = Database::getInstance()->getConnection();
        
    }

    abstract public function save();
    abstract public function display($course_id);
}