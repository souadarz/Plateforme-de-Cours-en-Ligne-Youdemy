<?php

class EnseignantContoller extends BaseController{
    private $CategoryModel;
    private $TagModel;

    public function __construct()
    {
        $this->CategoryModel = new Category();
        $this->TagModel = new Tag();
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
        $tags = $_POST['tags_cours'];
        $ContentModel = new CourseContentDocument($title,$description,$categorie,$tags);
        $this->$ContentModel->AddCourse();
    }
}
?>