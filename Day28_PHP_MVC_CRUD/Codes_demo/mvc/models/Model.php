<?php
//models/Model.php
// Model cha: khởi tạo 1 thuộc tính connection dùng cho model có thể kết
//nối đc CSDL luôn theo PDO
require_once 'configs/Database.php';
class Model {
    public $connection;

    public function __construct() {
        try {
           $this->connection = new PDO(Database::DB_DSN,
               Database::DB_USERNAME, Database::DB_PASSWORD);
        } catch (PDOException $e) {
            die("Lỗi kết nối: " . $e->getMessage());
        }
    }
}