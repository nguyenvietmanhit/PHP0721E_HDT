<?php
session_start();
require_once 'connection.php';
//crud/update.php
// Cập nhật sản phẩm theo id

// - Validate tham số id từ url: crud/update.php?id=18, cần validate bắt buộc phải truyền id
//và id phải là số
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
  $_SESSION['error'] = "ID ko hợp lệ";
  header('Location: index.php');
  exit();
}

// - Lấy thông tin sp theo id từ url đổ ra form
$id = $_GET['id'];
// - Tương tác với CSDL để lấy sp theo id
// + Viết câu truy vấn:
$sql_select_one = "SELECT * FROM products WHERE id = $id";
// + Thực thi truy vấn, SELECT trả về 1 obj trung gian
$obj_select_one = mysqli_query($connection, $sql_select_one);
// + Trả về mảng kết hợp 1 chiều:
$product = mysqli_fetch_assoc($obj_select_one);
//echo "<pre>";
//print_r($product);
//echo "</pre>";

// - Xử lý submit form:
// + Tạo biến chứa lỗi:
$error = '';
// + Debug:
echo "<pre>";
print_r($_POST);
echo "</pre>";
// + Nếu submit form thì mới xử lý
if (isset($_POST['submit'])) {
  // + Tạo biến trung gian:
  $name = $_POST['name'];
  $price = $_POST['price'];
  $description = $_POST['description'];
  // + Validate form: giống thêm mới
  // + Xử lý logic cập nhật vào CSDL chỉ khi ko có lỗi nào xảy ra:
  if (empty($error)) {
    // Các bước tương tác với CSDL
    // + Viết câu truy vấn:
    $sql_update = "UPDATE products SET name='$name', price=$price, description='$description' WHERE id=$id";
    // + Thực thi truy vấn: UPDATE, INSERT, DELETE return boolean
    $is_update = mysqli_query($connection, $sql_update);
//    var_dump($is_update);
    if ($is_update) {
      $_SESSION['success'] = "Cập nhật bản ghi id = $id thành công";
      header('Location: index.php');
      exit();
    }
    $error = "Cập nhật thất bại";
  }
}

?>
<!--+ Đổ biến error ra form -->
<h3 style="color: red"><?php echo $error; ?></h3>
<h2>Form cập nhật sp</h2>
<form method="post" action="">
  <!--  + Giữ lại dữ liệu đã nhập ra form sau khi submit-->
  Tên sp:
  <input type="text" name="name" value="<?php echo $product['name']; ?>" />
  <br />
  Giá sp:
  <input type="text" name="price" value="<?php echo $product['price']; ?>" />
  <br />
  Chi tiết sp:
  <textarea name="description"><?php echo $product['description']; ?></textarea>
  <br />
  <input type="submit" name="submit" value="Cập nhật" />
  <a href="index.php">Về trang danh sách</a>
</form>
