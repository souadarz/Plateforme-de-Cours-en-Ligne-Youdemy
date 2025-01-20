<?php
require_once __DIR__ . '/../models/User.php';
require_once __DIR__ . '/../models/Category.php';
require_once __DIR__ . '/../models/Tag.php';

class AdminController extends BaseController{
    private $UserModel;
    private $CategoryModel;
    private $TagModel;

    public function __construct()
    {
        $this->UserModel = new User();
        $this->CategoryModel = new Category();
        $this->TagModel = new Tag();
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
        // var_dump($_POST);
        // die;
        if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['change_status'])){
            $user_id = $_POST['user_id'];
            
            $current_status = $this->UserModel->getUserStatus($user_id);
            $new_status = ($current_status == 'Active')? 'blocked' : 'Active';
            $this->UserModel->changeUserStatus($new_status,$user_id);
            
            header('location:/admin/enseignants');
        }
    }

    public function activerStatus(){
        if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['activer_status'])){
            $user_id = $_POST['user_id'];
            
            $current_status = $this->UserModel->getUserStatus($user_id);
            $new_status = ($current_status == 'suspended')? 'Active' : $current_status;
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

//gestion des tags

    public function ShowTags(){
        $tags = $this->TagModel->getTags();
        $this->render('admin/tags',["tags"=>$tags]);
    }

    public function addTag()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_modify_tag'])) {
            $name_tags = trim($_POST['tag_name_input']);
            $tags = array_map('trim', explode(',', $name_tags));
            foreach($tags as $tag){
                if (!empty($tag)){
                    $this->TagModel->AddTag($tag);
                }
            }
        }
        header('location:/admin/tags');
    }

    public function updateTag(){
        if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_modify_tag'])){
            $tag_name = $_POST['tag_name_input'];
            $id_tag = $_POST['tag_id_input'];
            $this->TagModel->UpdateTag($tag_name,$id_tag);
            header('location:/admin/tags');
        }
    }

    public function deleteTag(){
        if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete_tag'])){
            $id_tag = $_POST['id_tag'];
            $this->TagModel->DeleteTag($id_tag);
            header('location:/admin/tags');
        }
    }
}

?>