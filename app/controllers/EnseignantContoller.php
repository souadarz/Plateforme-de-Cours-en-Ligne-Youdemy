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
        $this->render('/teacher/dashboard');
    } 

// la pages des cours de l'enseignant

    public function teacherCoursePage(){
        $tags = $this->TagModel->getTags();
        $categories = $this->CategoryModel->getCategories();
        $this->render('/teacher/courses',["categories"=>$categories,"tags"=>$tags]);
    }
    
    // public function saveContent(){
    //     $title = $_POST['title_cours'];
    //     $description = $_POST['descri_cours'];
    //     $categorie = $_POST['categorie_cours'];
    //     $ContentModel = new CourseContentDocument($title);
    //     $this->conn->ContentModel->
    // }
    public function AddCourse(){
       
        $title = $_POST['title_cours'];
        $description = $_POST['descri_cours'];
        $categorie = $_POST['categorie_cours'];
        // $tags = $_POST['tags_cours'];
        $type = $_POST['type_cours'];
        $document_path = $_POST['path'];
        echo "<pre>";
        // var_dump($_POST);die();
        $course = new Course();
        $teacher_id = $_SESSION['user_loged_in_id'];
        $course_id = $course->addCourse($title,$description,$categorie,$teacher_id);
        
        if($type === 'document'){
      
            $ContentModelDoc = new CourseContentDocument($course_id,$document_path);
            $ContentModelDoc->save();
        }
        else{
            $ContentModelVid = new CourseContentVideo($course_id,$document_path);
            $ContentModelVid->save();
        }
    }
    
}
?>
