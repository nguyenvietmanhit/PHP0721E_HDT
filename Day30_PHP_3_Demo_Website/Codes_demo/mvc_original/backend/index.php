<?php
//phpinfo();
session_start();
date_default_timezone_set('Asia/Ho_Chi_Minh');
//mvc/backend/index.php
// Chức năng thêm mới danh mục:
// index.php?controller=category&action=create
// + Lấy giá trị của tham số từ url
$controller = isset($_GET['controller']) ? $_GET['controller'] : 'home'; //category
$action = isset($_GET['action']) ? $_GET['action'] : 'index';
// + Chuyển đổi controller thành tên file để nhúng:
$controller = ucfirst($controller); //Category
$controller_name = $controller . "Controller"; //CategoryController
$controller_file = "controllers/$controller_name.php"; //controllers/CategoryController.php
// + Nhúng file controller:
if (!file_exists($controller_file)) {
    die('404 - Trang bạn tìm ko tồn tại');
}
require_once $controller_file;
// + Tạo đối tượng từ controller trên
$object = new $controller_name();
// + Gọi phương thức
if (!method_exists($object, $action)) {
    die("Phương thức $action ko tồn tại trong class $controller_name");
}
$object->$action();
?>