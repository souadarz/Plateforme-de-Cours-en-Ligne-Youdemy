<?php
require_once( __DIR__ .'/../models/CourseContentDoc.php');
require_once(__DIR__ .'/../models/CourseContentVideo.php');
require_once(__DIR__ .'/../models/Course.php');
class EnseignantContoller extends BaseController{
    private $CategoryModel;
    private $TagModel;
    private $CourseModel;

    public function __construct()
    {
        $this->CategoryModel = new Category();
        $this->TagModel = new Tag();
        $this->CourseModel = new Course ();
    }

    public function teacherDashboard(){
        $user_id = $_SESSION['user_loged_in_id'];
        $nbre_courses = $this->CourseModel->getNbrCourseTeacher($user_id);
        $this->render('/teacher/dashboard',["nbr_courses"=>$nbre_courses]);
    } 

// la pages des cours de l'enseignant

    public function teacherCoursePage(){
        $tags = $this->TagModel->getTags();
        $categories = $this->CategoryModel->getCategories();
        $this->render('/teacher/courses',["categories"=>$categories,"tags"=>$tags]);
    }
    
    public function AddCourse(){
        if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['btn_add_cours'])){
            $title = $_POST['title_cours'];
            $description = $_POST['descri_cours'];
            $categorie = $_POST['categorie_cours'];
            $tags = $_POST['tags_cours'];
            $type = $_POST['type_cours'];
            $file_name = "assets/uploads/".basename($_FILES["file"]["name"]);
            move_uploaded_file($_FILES["file"]["tmp_name"], $file_name);

            $course = new Course();
            $teacher_id = $_SESSION['user_loged_in_id'];
            $course_id = $course->addCourse($title,$description,$categorie,$teacher_id,$tags);
            
            if($type === 'document'){
        
                $ContentModelDoc = new CourseContentDocument($course_id,$file_name);
                $ContentModelDoc->save();
            }
            else{
                $ContentModelVid = new CourseContentVideo($course_id,$file_name);
                $ContentModelVid->save();
            }
            header('Location:/teacher/courses');
        }
    }

    public function showCourses(){
        $user_id = $_SESSION['user_loged_in_id'];
        $courses = $this->CourseModel->getCoursesTeacher($user_id);
        $categories = $this->CategoryModel->getCategories();
        $tags = $this->TagModel->getTags();
        $this->render('/teacher/courses',["courses"=>$courses,"categories"=>$categories,"tags"=>$tags]);
    }

    public function getCourseById($course_id){
        $course = $this->CourseModel->getCourseById($course_id);
        $this->render('/teacher/course_updated', ["course"=>$course]);
    }

    public function updateCourse(){
        if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update_course'])){
            $course_id = $_POST['course_id'];
            $title = $_POST['title_cours'];
            $description = $_POST['descri_cours'];
            // $categorie = $_POST['categorie_cours'];
            // $tags = $_POST['tags_cours'];
            // $type = $_POST['type_cours'];
        //      echo "<pre>";
        // var_dump($_POST);die();
        // echo "<pre>";
            $this->CourseModel->updateCourse($title,$description,$course_id);
            header('Location:/teacher/courses');
        }
    }

    public function deleteCourse(){
        if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete_course'])){
            $course_id = $_POST['course_id'];
            $this->CourseModel->deleteCourse($course_id);
            header('Location:/teacher/courses');
        }
    }
}
?>
