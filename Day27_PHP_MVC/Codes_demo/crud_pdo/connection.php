<?php
/**
 * crud/
 *     /connection.php: kết nối CSDL theo PDO
 *     /index.php: liệt kê nhân viên
 *     /create.php: thêm mới
 *     /update.php: sửa
 *     /delete.php: xóa
 */
//connection.php
const DB_DSN = 'mysql:host=localhost;dbname=php0721e_pdo;port=3306;charset=utf8';
const DB_USERNAME = 'root';
const DB_PASSWORD = '';

try {
    $connection = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);
} catch (PDOException $e) {
    die('Lỗi kết nối: ' . $e->getMessage());
}
echo 'Kết nối CSDL thành công';