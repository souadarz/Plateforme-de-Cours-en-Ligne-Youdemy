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

    public function showCategorie(){
        $this->render('admin/categories');
    }

    // function to show all users
    public function enseignantsPage(){
        $users = $this->UserModel->getUsers();
        $this->render('admin/enseignants',["users"=>$users]);
    }

    // function to delete a user
    public function deleteUser(){
        if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['delete_user'])){
            $user_id = $_POST["user_id"];

            $this->UserModel->deleteUser($user_id);
            header('location:/admin/enseignants');
        }
    }

    public function changeUserStatus(){
        if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['change_status'])){
            $user_id = $_POST['user_id'];

            $current_status = $this->UserModel->getUserStatus($user_id);
            $new_status = ($current_status == 'Active')? 'blocked' : 'Active';
            $this->UserModel->changeUserStatus($new_status,$user_id);
            
            header('location:/admin/enseignants');
        }
    }

}

?>