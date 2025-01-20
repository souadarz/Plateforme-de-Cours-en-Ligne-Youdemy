<?php
require_once __DIR__ . '/../config/database.php';
abstract class CourseContent extends DataBase{

    protected $content_id;
    protected $course_id;
    protected $course_type;

    public function __construct($content_id,$course_id,$course_type)
    {
        $this->course_id = $course_id;
        $this->content_id = $content_id;
        $this->course_type = $course_type;
        
    }

    abstract public function save();
    // abstract public function ($courseId);
}