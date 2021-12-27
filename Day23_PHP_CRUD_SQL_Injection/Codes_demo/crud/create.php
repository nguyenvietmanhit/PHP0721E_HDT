<?php
session_start();
require_once 'connection.php';
//crud/create.php
// Xử lý Thêm mới, là chức năng đầu tiên code của CRUD
// products: id, name, price, description, created_at
// XỬ LÝ FORM:
// + Debug:
echo "<pre>";
print_r($_POST);
echo "</pre>";
// + Khai báo biến chứa lỗi
$error = '';
// + Chỉ xử lý form khi user submit form:
if (isset($_POST['submit'])) {
  // + Tạo biến trung gian
  $name = $_POST['name'];
  $price = $_POST['price'];
  $description = $_POST['description'];
  // + Validate form:
  // Tên và giá phải nhập: empty
  // Giá phải là số: is_numeric
  if (empty($name) || empty($price)) {
    $error = 'Tên và giá phải nhập';
  } elseif (!is_numeric($price)) {
    $error = 'Giá phải là số';
  }
  // + Thêm data vào bảng chỉ khi nào ko có lỗi xảy ra
  if (empty($error)) {
    // Do đã nhúng file kết nối nên có thể sử dụng biến $connection trong file đó
    // B1: Viết truy vấn với giá trị động
    $sql_insert = "INSERT INTO products(name, price, description) VALUES('$name', $price, '$description')";
    // B2: Thực thi truy vấn, INSERT return boolean
    $is_insert = mysqli_query($connection, $sql_insert);
//    var_dump($is_insert);
    if ($is_insert) {
      $_SESSION['success'] = 'Thêm mới thành công';
      // Chuyển hướng về trang danh sách sp
      header('Location: index.php');
      exit();
    } else {
      $error = 'Insert thất bại';
    }
  }
}
?>
<!--+ Đổ biến error ra form -->
<h3 style="color: red"><?php echo $error; ?></h3>
<h2>Form thêm mới sp</h2>
<form method="post" action="">
<!--  + Giữ lại dữ liệu đã nhập ra form sau khi submit-->
  Nhập tên sp:
  <input type="text" name="name" value="" />
  <br />
  Nhập giá sp:
  <input type="text" name="price" value="" />
  <br />
  Nhập chi tiết sp:
  <textarea name="description"></textarea>
  <br />
  <input type="submit" name="submit" value="Lưu dữ liệu" />
  <a href="index.php">Về trang danh sách</a>
</form>
