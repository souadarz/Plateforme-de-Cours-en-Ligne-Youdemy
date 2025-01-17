<?php
require_once __DIR__ . '/../config/database.php';

class Category extends  DataBase{

    public function __construct()
    {
        parent::__construct();
    }

    public function getCategories(){
        try{
            $stmt = $this->conn->prepare("SELECT * FROM categories");
            $stmt->execute();
            $categories = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $categories;
        }catch(PDOException $e){
            echo "Error in get categories: " . $e->getMessage();
        }
    }

    public function AddCategory($category_name){
        try {
            $stmt = $this->conn->prepare("INSERT INTO categories (category_name) VALUES (?)");
            $stmt->execute([$category_name]);

        } catch (PDOException $e) {
            echo " Error in add Category" . $e->getMessage();
        }
    }

    public function UpdateCategory($name_category,$id_category){
        try{
            $stmt = $this->conn->prepare("UPDATE categories SET category_name = ? WHERE category_id = ? ");
            $stmt->execute([$name_category,$id_category]);
        }catch (PDOException $e) {
        echo " Error in update Category" . $e->getMessage();
        }
    }

    public function DeleteCategory($id_category){
        try{
            $stmt = $this->conn->prepare("DELETE FROM categories WHERE category_id = ? ");
            $stmt->execute([$id_category]);
        }catch (PDOException $e) {
        echo " Error in delete Category" . $e->getMessage();
        }
    }
}

?>