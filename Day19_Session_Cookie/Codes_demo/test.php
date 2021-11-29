<?php
session_start();
// test.php
// Nhúng file session.php để sử dụng biến $test
//require_once 'session.php';
//echo $test;
// Nếu hệ thống có 1000 file ->nhúng 1000 lần file session.php
// -> session giải quyết đc vấn đề này
// - Debug mảng $_SESSION
echo "<pre>";
print_r($_SESSION);
echo "</pre>";

// - chú ý thao tác với session chưa tồn tại
// để fix, trước khi thao tác với session -> isset
echo isset($_SESSION['name']) ? $_SESSION['name'] : '';

// Hiển thị cookie
echo isset($_COOKIE['fullname']) ? $_COOKIE['fullname'] : '';
