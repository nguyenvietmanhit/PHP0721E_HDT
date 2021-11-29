<!--xss.php-->
<?php
// - Lỗi bảo mật XSS - Cross-site scripting - trong form
// Là kỹ thuật tấn công form bằng các đoạn mã Javascript
if (isset($_GET['submit'])) {
    $fullname = $_GET['fullname'];
    //   <script>alert('abc')</script>
  // - Cách fix XSS rất đơn giản: luôn luôn encode/mã hóa dữ liệu trc khi hiển thị
  // -> về nguyên tắc luôn luôn cần encode dữ liệu trc khi hiển thị ra
  // trong demo bỏ qua cho đỡ phức tạp
    $fullname = htmlspecialchars($fullname);
    echo $fullname;
}
// - Lỗi bảo mật CSRF - Cross-site request forgery - Tấn công bằng cách mạo danh
// VD: Website có 1 chức năng xóa user: delete.php?user_id=5
// -> hacker gửi các link qua email -> đặt link xóa ẩn dưới các hình ảnh nhạy cảm ..., dụ bạn click
// -> chống CSRF bằng cơ chế token: 1 form có 1 token gắn với user đang đăng nhập, mỗi lần submit
//form luôn luôn check token phải trùng với user đang đăng nhập thì mới submit đc form
?>

<form method="get" action="">
  Fullname: <input type="text" name="fullname" />
  <input type="submit" name="submit" value="Show" />
</form>
