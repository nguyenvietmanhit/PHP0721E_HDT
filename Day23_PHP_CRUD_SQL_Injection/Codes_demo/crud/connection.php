<?php
//crud/connection.php
// Kết nối CSDL, đối tượng kết nối đc sử dụng chung cho các chức năng CRUD
const DB_HOST = 'localhost';
const DB_USERNAME = 'root';
const DB_PASSWORD = '';
const DB_NAME = 'php0721e_demo';
const DB_PORT = 3306;

$connection = mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME, DB_PORT);
if (!$connection) {
  die("Lỗi kết nối: " . mysqli_connect_error());
}
echo "<h2>Kết nối CSDL thành công</h2>";
