<?php
session_start();
//logout.php
// - Ngược lại với đăng nhập: đăng nhập sinh ra session nào thì đăng xuất sẽ xóa đi tương
//ứng
unset($_SESSION['username']);
$_SESSION['success'] = 'Đăng xuất thành công';
header('Location: login.php');
exit();
