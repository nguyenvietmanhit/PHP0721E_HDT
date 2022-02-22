<?php
session_start();
date_default_timezone_set('Asia/Ho_Chi_Minh');
//echo date('d-m-Y H:i:s');
//mvc/index.php
// File index gốc của ứng dụng
// Tên file bắt buộc phải là index.php
// Là nơi đầu tiên nhận request từ user gửi lên
// Phân tích URL để gọi đúng controller tương ứng -> MVC
// -> bắt buộc URL phải theo chuẩn do bạn định nghĩa ra
// VD: chức năng thêm mới sp:
// index.php?controller=product&action=create
// + Lấy tham số controller từ url trên:
$controller = isset($_GET['controller']) ? $_GET['controller'] : 'home';
// + Lấy action từ url:
$action = isset($_GET['action']) ? $_GET['action'] : 'index';
//var_dump($controller); //product
//var_dump($action); //create
// + Biến đổi controller lấy được thành tên file controller tương ứng -> nhúng file
//controller đó: product -> ProductController.php
// (CategoryController.php, UserController.php)
$controller = ucfirst($controller); //Product
$controller_name = $controller . "Controller"; //ProductController
// Lưu đường dẫn tới file controller, trong MVC mọi đường dẫn đều phải xuất phát
//từ file index gốc của ứng dụng
$controller_file_path = "controllers/$controller_name.php";
//controllers/ProductController.php
if (!file_exists($controller_file_path)) {
    die('Trang bạn tìm ko tồn tại - 404');
}
// + Nhúng file
require_once $controller_file_path;
// + KHởi tạo đối tượng từ class controller bên trong file đã nhúng:
$object = new $controller_name(); //$object = new ProductController()
// + Gọi phương thức từ đối tượng trên dựa vào tham số action từ url, cần check
//tồn tại của phương thức
if (!method_exists($object, $action)) {
    die("Phương thức $action ko tồn tại trong controller $controller_name");
}
$object->$action();
