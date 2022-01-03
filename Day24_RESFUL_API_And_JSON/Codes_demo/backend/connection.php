<?php

/**
 * backend/
 *        /connection.php: kết nối CSDL MySQL sử dụng PHP theo cơ chế MySQLi
 *        /api.php: tạo ra các code API cho ứng dụng CRUD
 * frontend/
 *         /create.html: thêm mới sp
 *         /index.html: liệt kê sp
 *         /update.html: cập nhật sp
 *         /js/jquery-3.5.1.min.js: thư viện jQuery dùng để gọi ajax lên PHP thông qua API
 *
 *  Ý tưởng: tạo 1 hệ thống như sau
 * Backend: sử dụng PHP viết các API cho CRUD
 * Frontend: sử dụng HTML CSS Javascript, gọi API mà backend viết
 */
const DB_HOST = 'localhost';
const DB_USERNAME = 'root';
const DB_PASSWORD = '';
const DB_NAME = 'php0721e_demo';
const DB_PORT = 3306;

$connection = mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME, DB_PORT);
if (!$connection) {
  die("Lỗi kết nối: " . mysqli_connect_error());
}
//echo "Kết nối CSDL thành công";
