<?php

class DatabaseConnection
{
    private $host = "localhost";
    private $db_name = "hc_smart_school"; //ชื่อฐานข้อมูล
    private $username = "root"; //username ของ database
    private $password = "root1234"; // รหัสผ่านของ database
    public $conn;
    public function getConnection()
    {
        $this->conn = null;
        try {
            $this->conn = new PDO("mysql:host=localhost;dbname=webcs;charset=utf8", "root", "");
            $this->conn->exec("set names utf8");
        } catch (PDOException $exception) {
            echo "Connection error: " . $exception->getMessage();
        }
        return $this->conn;
    }
}
