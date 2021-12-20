<?php
//connect.php
// Code kết nối từ PHP tới MySQL sử dụng thư viện mysqli

// 1 - Kết nối CSDL MySQL
const DB_HOST = 'localhost'; //máy chủ chứa CSDL -> XAMPP -> localhost
const DB_USERNAME = 'root'; //username login vào CSDL -> XAMPP -> sinh ra sẵn root có quyền cao nhất
const DB_PASSWORD = ''; //password login vào CSDL -> XAMPP -> ứng với user root -> tạo sẵn pass luôn
const DB_NAME = 'php0721e_demo'; // tên CSDL muốn kết nối
const DB_PORT = 3306; //cổng kết nối tới CSDL MySQL

// Gọi hàm khởi tạo kết nối đc cung cấp sẵn bởi thư viện mysqli, tiền tố là mysqli_
$connection = mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME, DB_PORT);
if (!$connection) {
  die("Lỗi kết nối: " . mysqli_connect_error());
}
echo "<h2>Kết nối CSDL thành công</h2>";

// 2 - Demo các tương tác INSERT, SELECT, UPDATE, DELETE từ PHP tới MySQL sau khi kết nối thành công
// - INSERT: thêm dữ liệu tĩnh vào bảng: products: id, name, price, description, created_at
// -> chỉ thêm dữ liệu cho các trường sinh ra thủ công
// B1: Viết câu truy vấn SQL: (quan trọng nhất)
$sql_insert = "INSERT INTO products(name, price, description) VALUES('Máy tính Dell', 1000, 'Des máy tính del')";
// THêm nhiều bản ghi cùng 1 lúc
//$sql_insert = "INSERT INTO products(name, price, description) VALUES
//('Máy tính Dell', 1000, 'Des máy tính del'), ('Máy tính Dell 2', 2000, 'Des máy tính del 2')";
// Debug bằng cách sau: copy câu truy vấn chạy thẳng trên tab SQL của PHPMyadmin
// B2: Thực thi câu truy vấn vừa tạo, với INSERT trả về true/false
$is_insert = mysqli_query($connection, $sql_insert);
var_dump($is_insert); //

// - SELECT: lấy dữ liệu từ bảng: select 1 bản ghi và nhiều bản ghi
// + SELECT nhiều bản ghi:
// B1: Viết truy vấn:
$sql_select_all = "SELECT * FROM products ORDER BY created_at DESC";
// B2: Thực thi truy vấn: với SELECT kết quả ko còn là true/false, mà là 1 obj trung gian nào đó
$obj_select_all = mysqli_query($connection, $sql_select_all);
echo "<pre>";
print_r($obj_select_all);
echo "</pre>";
// B3: Lấy mảng kết hợp nhiều phần tử từ obj trên
$products = mysqli_fetch_all($obj_select_all, MYSQLI_ASSOC);
echo "<pre>";
print_r($products);
echo "</pre>";
// + SELECT lấy 1 bản ghi duy nhất:
// B1: Viết truy vấn:
$sql_select_one = "SELECT * FROM products WHERE id = 1";
// B2: Thực thi truy vấn, nhớ SELECT trả về obj trung gian:
$obj_select_one = mysqli_query($connection, $sql_select_one);
// B3: LẤy mảng kết hợp 1 chiều duy nhất từ obj trên:
$product = mysqli_fetch_assoc($obj_select_one);
echo "<pre>";
print_r($product);
echo "</pre>";

// - UPDATE: cập nhật bản ghi
// B1: Viết truy vấn: luôn chú ý dùng WHERE khi UPDATE
$sql_update = "UPDATE products SET name='New name', price=3333, description='New des' WHERE id = 1";
// B2: Thực thi truy vấn: giống INSERT return boolean
$is_update = mysqli_query($connection, $sql_update);
var_dump($is_update);

// - DELETE: xóa bản ghi
// B1: Viết truy vấn: luôn chú ý dùng WHERE khi DELETE
$sql_delete = "DELETE FROM products WHERE id > 10";
// B2: Thực thi truy vấn: giống INSERT, UPDATE return boolean
$is_delete = mysqli_query($connection, $sql_delete);
var_dump($is_delete);

