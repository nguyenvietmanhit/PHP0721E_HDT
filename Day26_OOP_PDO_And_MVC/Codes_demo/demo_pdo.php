<?php
//demo_pdo.php
/**
 * Kết nối CSDL theo sử dụng thư viện PDO trong PHP
 *  - PHP Data Object: là 1 thư viện giúp PHP kết nối tới CSDL
 * (giống mysqli)
 * - Hỗ trợ kết nối tới nhiều CSDL khác nhau: MySQL, Oracle,
 * MongoDB, SQLite, SQLServer ..., trong khi mysqli chỉ kết nối
 * đc tới 1 CSDL duy nhất là MySQL
 * - PDO viết hoàn toàn từ OOP -> hơi khó tiếp cận, trong khi
 * mysqli hỗ trợ viết bằng PHP thuần
 * - XAMPP cài sẵn thư viện PDO và mysqli r
 *
 */
// 1 - Tạo CSDL mẫu bằng câu truy vấn SQL
/**
CREATE DATABASE IF NOT EXISTS php0721e_pdo
CHARACTER SET utf8
COLLATE utf8_general_ci;

Tạo bảng products: id, name, price, created_at
CREATE TABLE IF NOT EXISTS products(
 id INT(11) AUTO_INCREMENT,
 name VARCHAR(150) NOT NULL,
 price INT(11) DEFAULT 0,
 created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
 PRIMARY KEY (id)
 );

 */
// - Demo code kết nối CSDL MySQL theo PDO
// + Khởi tạo kết nối:
// Hằng số DSN - Data Source Name
const DB_DSN = "mysql:host=localhost;dbname=php0721e_pdo;port=3306;charset=utf8";
const DB_USERNAME = 'root';
const DB_PASSWORD = '';

try {
    $connection = new PDO(DB_DSN, DB_USERNAME,
        DB_PASSWORD);
} catch (PDOException $e) {
    die("Lỗi kết nối: " . $e->getMessage());
}
echo "Kết nối CSDL thành công";
//function divide($a, $b) {
//    if ($b == 0) {
//        return "Không thể chia cho 0";
//    }
//    return $a / $b;
//}
//divide(4, 0); //2

// + Insert PDO: products: id, name, price, created_at
// - Viết truy vấn dạng tham số (param), chống đc lỗi bảo mật
// SQL Injection
$sql_insert = "INSERT INTO products(name, price) 
               VALUES(:name, :price)";
// - Chuẩn bị đối tượng truy vấn: prepare
$obj_insert = $connection->prepare($sql_insert);
echo "<pre>";
print_r($obj_insert);
echo "</pre>";
// - [Optional] Truyền giá trị thật cho tham số của câu truy
//vấn nếu câu truy vấn đó có tham số
// Tạo 1 mảng có số phần tử đúng bằng số lượng tham số: bind param
$inserts = [
    ':name' => 'TV',
    ':price' => 1000
];
// - Thực thi đối tượng truy vấn, với INSERT, UPDATE, DELETE
// -> kết quả thực thi là boolean
$is_insert = $obj_insert->execute($inserts);
var_dump($is_insert);

// Extension Google dịch + Laban Dictionary
// + SELECT PDO
// - Select 1 bản ghi:
// Tạo truy vấn dạng tham số:
$sql_select_one = "SELECT * FROM products WHERE id = :id";
// Cbi obj truy vấn:
$obj_select_one = $connection->prepare($sql_select_one);
// [Optional] Tạo mảng truyền giá trị thật cho tham số truy vấn
$selects = [
    ':id' => 1
];
// Thực thi obj truy vấn, với SELECT thì ko cần sử dụng kết quả
//trả về sau khi thực thi
$obj_select_one->execute($selects);
// Lấy mảng 1 chiều chứa thông tin của bản ghi
$product = $obj_select_one->fetch(PDO::FETCH_ASSOC);
echo "<pre>";
print_r($product);
echo "</pre>";

// - Select nhiều bản ghi:
// Viết truy vấn: câu truy vấn này ko có tham số nào cả
$sql_select_all = "SELECT * FROM products ORDER BY created_at DESC";
// Cbi obj truy vấn:
$obj_select_all = $connection->prepare($sql_select_all);
// [Optional] Bỏ qua vì câu truy vấn ko có tham số nào
// Thực thi obj truy vấn, SELECT ko cần thao tác với kqua trả về
//sau khi thực thi
$obj_select_all->execute();
// Trả về mảng dữ liệu chứa nhiều phần tử:
$products = $obj_select_all->fetchAll(PDO::FETCH_ASSOC);
echo "<pre>";
print_r($products);
echo "</pre>";

// + UPDATE PDO
// Viết truy vấn:
$sql_update = "UPDATE products SET name=:name, price=:price 
WHERE id=:id";
// Cbi obj truy vấn:
$obj_update = $connection->prepare($sql_update);
// [Optional] Tạo mảng truyền giá trị thật cho tham số:
$updates = [
  ':name' => 'Name update',
  ':price' => 111,
  ':id' => 2
];
// Thực thi -> boolean (áp dụng với INSERT, UPDATE, DELETE)
$is_update = $obj_update->execute($updates);
echo "<pre>";
print_r($obj_update->debugDumpParams());
echo "</pre>";
var_dump($is_update);
// + DELETE PDO
// Viết truy vấn:
$sql_delete = "DELETE FROM products WHERE id > :id";
// Cbi obj truy vấn:
$obj_delete = $connection->prepare($sql_delete);
// Tạo mảng truyền giá trị thật cho tham số:
$deletes = [
    ':id' => 8
];
// Thực thi, INSERT UPDATE DELETE -> boolean
$is_delete = $obj_delete->execute($deletes);
var_dump($is_delete);
