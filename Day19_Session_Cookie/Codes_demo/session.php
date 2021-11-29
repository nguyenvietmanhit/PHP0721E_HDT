<?php
session_start();
//session.php
// 1/ SESSION trong PHP
// - Là 1 phiên làm việc: thời điểm bắt đầu và kết thúc
// - Là 1 biến , dùng để lưu trữ thông tin, có thể truy cập đc từ bất cứ nơi nào trên hệ thống
// - Là biến dạng mảng, PHP tạo 1 biến có sẵn là $_SESSION để quản lý tất cả session đang có
// - Session mất đi khi xóa nó hoặc đóng trình duyệt
// - Session hoạt động trên server
// 2/ Ví dụ:
// Tạo file test.php ngang hàng
//$test = 'Hello';
//echo $test; //ok
// - Tạo session để lưu thông tin: thao tác giống hệt thêm phần tử mảng
// -> chạy file session.php trc để hệ thống tạo ra session tương ứng trước
// -> luôn luôn phải session_start() trước r mới sử dụng đc $_SESSION
$_SESSION['name'] = 'nvmanh';
$_SESSION['age'] = 31;
// - Lấy giá trị của session: giống mảng
echo $_SESSION['name'];
// - Xóa session: giống xóa mảng:
unset($_SESSION['age']);
