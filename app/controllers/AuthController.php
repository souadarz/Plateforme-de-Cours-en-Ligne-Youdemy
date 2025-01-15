<?php
require_once __DIR__ . '/../models/user.php';

class AuthController extends BaseController{
    private $userModel;

    public function __construct()
    {
        $this->userModel = new User();
    }

    public function showRegister(){
        $this->render('auth/register');
    }

    public function handlRegister(){
        if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['register_btn'])){
            $full_name = $_POST['full_name'];
            $email = $_POST['email'];
            $role = $_POST['role'];
            $password = $_POST['password'];

            $user = $this->userModel->signUp($full_name,$email,$password,$role);

            $_SESSION['user_loged_in_id'] = $user['id'];
            $_SESSION['user_loged_in_name'] = $user['name'];
            $_SESSION['user_loged_in_email'] = $user['email'];
            $_SESSION['user_loged_in_role'] = $user['role'];

            if ($user['role'] == "admin"){
                header('Location: ../views/Admin/dashboard.php');
            } else if($user['role'] == "Etudiant"){
                header('Location: ../views/Borrower/home.php');
            } else{
                header('Location: ../views/Borrower/home.php');
            }
            exit;
        }
    }

    public function showLogin(){
        $this->render('auth/login');
    }

    public function handlogin(){
        if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login_btn'])){
            $email = $_POST['email'];
            $password = $_POST['password'];

            // $user = $this->userModel->signUp($email,$password);
        }
    }
}

?>