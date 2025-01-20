<?php


class EtudiantContoller extends BaseController{

    public function __construct()
    {
    }

// la pages des cours de etudiant

    public function studentCoursePage(){
        $this->render('/student/mycourses');
    } 
}
?>