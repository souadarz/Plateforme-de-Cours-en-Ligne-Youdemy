<?php
require_once __DIR__ . '/../config/database.php';

class User extends  DataBase{

    public function __construct()
    {
        parent::__construct();
    }

//Authentification

    public function signUp($full_name, $email, $password,$role,$status){
        $usersNbrQuery = "SELECT count(*) FROM users";
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $result = $this->conn->query($usersNbrQuery)->fetchColumn();
        $role = ($result == 0) ? "Admin" : $_POST['role'];
        // var_dump($role); die();
        
        $stmt = $this->conn->prepare("INSERT INTO users (full_name, email, password, role, status) VALUES (?, ?, ?,?,?)");
        $stmt->execute([$full_name, $email,$hashedPassword,$role,$status]);
        
        $userId = $this->conn->lastInsertId();
        return ['id' => $userId,'name'=> $full_name,'email'=>$email,'role' => $role];
    }

    public function login($email,$password){
        try {
            $stmt = $this->conn->prepare("SELECT * FROM users WHERE email = ?");
            $stmt->execute([$email]);
            $user =$stmt->fetch(PDO::FETCH_ASSOC);

            if($user && password_verify($password, $user['password'])){
                return $user;
            }
        }catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function getUsers(){
        try {
            $stmt = $this->conn->prepare("SELECT * FROM users WHERE role != 'Admin'");
            $stmt->execute();
            $users =$stmt->fetchAll(PDO::FETCH_ASSOC);
                return $users;

        }catch (PDOException $e) {
            echo "Error in get Users " . $e->getMessage();
        }
    }

    public function deleteUser($user_id){
        try {
            $stmt = $this->conn->prepare("DELETE FROM users WHERE user_id = ?");
            $stmt->execute([$user_id]);

        }catch (PDOException $e) {
            echo "Error in delete User " . $e->getMessage();
        }
    }

    public function getUserStatus($user_id)
    {
        try{
        $stmt = $this->conn->prepare("SELECT status FROM users WHERE user_id = ?");
        $stmt->execute([$user_id]);
        $status = $stmt->fetchColumn();
        return $status;
        } catch (PDOException $e) {
            echo "Error in get user Status: " . $e->getMessage();
        }
    }
    
    public function changeUserStatus($statut, $user_id){
        try {
            $changeStatusQuery = $this->conn->prepare("UPDATE users SET status= ? WHERE user_id = ?");
            $changeStatusQuery->execute([$statut, $user_id]);
        } catch (PDOException $e) {
            echo "Error in change user Status: " . $e->getMessage();
        }
    }

}


?>