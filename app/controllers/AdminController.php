<?php
require_once __DIR__ . '/../models/User.php';
require_once __DIR__ . '/../models/Category.php';

class AdminController extends BaseController{
    private $UserModel;
    private $CategoryModel;

    public function __construct()
    {
        $this->UserModel = new User();
        $this->CategoryModel = new Category();
    }

    public function adminDashboard(){
        $this->render('admin/dashboard');
    }

    
//gestion des utilisateurs
    
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
    
//gestions des categories
    
    public function showCategorie(){
        $categories = $this->CategoryModel->getCategories();
        $this->render('admin/categories',["categories"=>$categories]);
    }

    public function addCategory(){
        if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_modify_category'])){
            // $id_category = $_POST['category_id_input'];
            $name_category = $_POST['category_name_input'];
            $this->CategoryModel->AddCategory($name_category);
            header('location:/admin/categories');
        }
    }

    public function updateCategory(){
        if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_modify_category'])){
            $id_category = $_POST['category_id_input'];
            $name_category = $_POST['category_name_input'];
            $this->CategoryModel->UpdateCategory($name_category,$id_category);
            header('location:/admin/categories');
        }
    }

    public function deleteCategory(){
        if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete_category'])){
            $id_category = $_POST['id_category'];
            $this->CategoryModel->deleteCategory($id_category);
            header('location:/admin/categories');
        }
    }
}

?>