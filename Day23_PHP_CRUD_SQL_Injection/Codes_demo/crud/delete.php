<?php
session_start();
require_once 'connection.php';

// - Validate tham số id từ url: crud/update.php?id=18, cần validate bắt buộc phải truyền id
//và id phải là số
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
  $_SESSION['error'] = "ID ko hợp lệ";
  header('Location: index.php');
  exit();
}

$id = $_GET['id'];

// Tương tác với CSDL để xóa bản ghi theo id
// + Viết truy vấn:
$sql_delete = "DELETE FROM products WHERE id=$id";
// + Thực thi truy vấn, DELETE INSERT UPDATE return boolean
$is_delete = mysqli_query($connection, $sql_delete);

if ($is_delete) {
  $_SESSION['success'] = "Xóa bản ghi id = $id thành công";
} else {
  $_SESSION['error'] = "Xóa bản ghi id = $id thất bại";
}
header("Location: index.php");
exit();
// -> nghỉ giải lao -> 20h00
