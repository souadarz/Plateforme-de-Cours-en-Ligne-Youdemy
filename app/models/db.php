<?php

// Database connection class
class db {
    private static $instance = null;
    private $connection;

    private function __construct() {
        $config = [
            'host' => 'localhost',
            'dbname' => 'plateforme_course',
            'username' => 'root',
            'password' => ''
        ];

        try {
            $this->connection = new PDO(
                "mysql:host={$config['host']};dbname={$config['dbname']}",
                $config['username'],
                $config['password']
            );
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            
        } catch(PDOException $e) {
            die("Connection failed: " . $e->getMessage());
        }
    }

    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function getConnection() {
        return $this->connection;
    }
}