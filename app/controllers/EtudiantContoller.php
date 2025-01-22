<?php
require_once(__DIR__ .'/../models/Course.php');
require_once(__DIR__ .'/../models/Enrollement.php');

class EtudiantContoller extends BaseController{
    private $EnrollementModel;
    private $CourseModel;

    public function __construct(){
        $this->EnrollementModel = new Enrollement;
        $this->CourseModel = new Course;
    }

// la pages des cours des etudiant

    public function studentCoursePage(){
        $user_id = $_SESSION['user_loged_in_id'];
        $courses = $this->CourseModel->getCoursesStudent($user_id);
        $this->render('/student/myCourses',["courses"=>$courses]);
    }

    public function enroll($course_id)
    {
        if (isset($_SESSION['user_loged_in_id'])) {
            $this->EnrollementModel->enrollement($_SESSION['user_loged_in_id'], $course_id);
            header("Location:/student/myCourses");
        } else {
            header("Location:/login");
        }
    }


}
?>