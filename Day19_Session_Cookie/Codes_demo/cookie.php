<?php
//cookie.php
// 1/ Cookie là gì?
// - Là 1 dạng biến, lưu trữ thông tin, có thể truy cập từ bất cứ nơi nào trên hệ thống
//(giống session)
// - Lưu trên trình duyệt, còn session lưu trên server
// - Ứng dụng: marketing, cấu hình site truy cập ...
// - Ko mất đi khi đóng trình duyệt như session, phụ thuộc vào thời gian sống đc set
//lúc khởi tạo
// - PHP tạo sẵn 1 biến kiểu mảng là $_COOKIE lưu thông tin toàn bộ cookie đang có
// 2 / Thao tác với cookie:
// - Khởi tạo cookie, ko dùng cách thêm như thao tác với mảng
// + Tạo cookie sống trong 600s = 10p
setcookie('fullname', 'nvmanh', time() + 600);
setcookie('address', 'hn', time() + 3600);
// + Xóa cookie: ko dùng hàm unset, mà phải set lại thời gian sống là quá khứ
setcookie('address', '', time() - 1);
echo "<pre>";
print_r($_COOKIE);
echo "</pre>";

//3 - Giống và khác nhau của session và cookie
// + Giống:
// Đều là biến dạng mảng lưu trữ thông tin, có thể đc truy cập từ bất cứ nơi nào
//trên hệ thống
// + Khác:
// Session lưu trên server, cookie lưu trên client - trình duyệt
// Session tự động mất đi khi đóng trình duyệt, cookie thì không
// Do session lưu trên server nên sẽ bảo mật cookie
// Nghỉ giải lao 15p -> 20h35
