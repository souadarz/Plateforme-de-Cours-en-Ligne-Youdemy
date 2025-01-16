<?php
require_once __DIR__ . '/../models/User.php';

class AuthController extends BaseController{
    private $UserModel;

    public function __construct()
    {
        $this->UserModel = new User();
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

            $user = $this->UserModel->signUp($full_name,$email,$password,$role);

            $_SESSION['user_loged_in_id'] = $user['id'];
            $_SESSION['user_loged_in_name'] = $user['name'];
            $_SESSION['user_loged_in_email'] = $user['email'];
            $_SESSION['user_loged_in_role'] = $user['role'];

            if ($user['role'] == "Enseignant"){
                header('Location: /EnseignantsSusspendu');
            } else{
                header('Location: /login');
            }
        }
    }

    public function showLogin(){
        $this->render('auth/login');
    }

    public function handleLogin(){
        if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login_btn'])){
            $email = $_POST['email'];
            $password = $_POST['password'];

            $user = $this->UserModel->login($email,$password);

            $_SESSION['user_loged_in_id'] = $user['id'];
            $_SESSION['user_loged_in_name'] = $user['name'];
            $_SESSION['user_loged_in_email'] = $user['email'];
            $_SESSION['user_loged_in_role'] = $user['role'];

            if ($user['role'] == "Admin"){
                header('Location: /admin/dashboard');
            } else if($user['role'] == "Etudiant"){
                header('Location: /etudiant/dashboard');
            } else{
                header('Location: /enseignant/dashboard');
            }
            exit;
        }
    }

    public function logout(){
        if (isset($_SESSION['user_loged_in_id']) && isset($_SESSION['user_loged_in_role'])) {
            unset($_SESSION['user_loged_in_id']);
            unset($_SESSION['user_loged_in_role']);
            session_destroy();
            header("Location:/login");
            exit;
        }
    }
}

?>