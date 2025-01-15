<?php
require_once __DIR__ . '/../config/database.php';

class User extends  DataBase{

    public function __construct()
    {
        parent::__construct();
    }

    public function signUp($full_name, $email, $password,$role){

        $usersNumberQuery = "SELECT count(*) FROM utilisateurs";
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $result = $this->conn->query($usersNumberQuery)->fetchColumn();
        $role = ($result == 0) ? "Admin" : $_POST['role'];
        // var_dump($role); die();
        
        $stmt = $this->conn->prepare("INSERT INTO utilisateurs (nom_utilisateur, email, password, role) VALUES (?, ?, ?, ?)");
        $stmt->execute([$full_name, $email,$hashedPassword, $role]);
        
        $userId = $this->conn->lastInsertId();
        return ['id' => $userId,'name'=> $full_name,'email'=>$email,'role' => $role];
    }

    public function login(){

    }
}


?>