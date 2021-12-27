<?php
session_start();
require_once 'connection.php';

//crud/delete_multiple.php
// Xử lý xóa nhiều sp theo mảng các id truyền từ url
// + &checks%5B%5D=18&checks%5B%5D=17&checks%5B%5D=16
// + &checks[]=18&checks[]=17&checks[]=16
// %5B = [
// %5D = ]
// => url đc encode/mã hóa các ký tự đặc biệt bởi trình duyệt


// + Debug
echo "<pre>";
print_r($_GET);
echo "</pre>";
$checks = $_GET['checks']; //array 1 chiều nhiều phần tử

// + Chuyển mảng về chuỗi phân tách bởi ký tự , [1, 2, 3] => 1, 2, 3
$check_str = implode(',', $checks);
var_dump($check_str);

// + Tương tác với CSDL để xóa nhiều bản ghi
// - Viết truy vấn xóa:
//DELETE FROM products WHERE id IN (1, 3 ,4)
$sql_delete = "DELETE FROM products WHERE id IN ($check_str)";
// - Thực thi truy vấn, DELETE INSERT UPDATE return boolean
$is_delete = mysqli_query($connection, $sql_delete);

if ($is_delete) {
  $_SESSION['success'] = "Xóa bản ghi có id = $check_str thành công";
} else {
  $_SESSION['error'] = "Xóa bản ghi có id = $check_str thất bại";
}
header("Location: index.php");
exit();
