<?php
require_once __DIR__ . '/../models/User.php';

class AdminController extends BaseController{
    private $UserModel;

    public function __construct()
    {
        $this->UserModel = new User();
    }

    public function adminDashboard(){
        $this->render('admin/dashboard');
    }

    public function enseignantsPage(){
        $users = $this->UserModel->getUsers();
        $this->render('admin/enseignants',["users"=>$users]);
    }
    public function showCategorie(){
        $this->render('admin/categories');
    }

}

?>