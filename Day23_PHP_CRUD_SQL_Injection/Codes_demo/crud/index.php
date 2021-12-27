<?php
session_start();
require_once 'connection.php';
// crud/index.php: liệt kê ds sản phẩm
// Demo ứng dụng CRUD - Create Read (List) Update Delete, là 4 chức năng nền
//tảng của bất cứ 1 hệ thống website nào
// Thông qua ví dụ này sẽ biết cách code Frontend và Backend
// Cấu trúc file/thư mục:
/**
 * crud /
 *      /connection.php: kết nối CSDL sử dụng mysqli, đc dùng chung cho các chức năng CRUD
 *      /create.php: xử lý Create dữ liệu
 *      /update.php: xử lý Update dữ liệu
 *      /delete.php: xử lý Delete
 *      /index.php: Xử lý Read (List)
  */
// Truy vấn CSDL để lấy toàn bộ sp đang có -> SELECT nhiều bản ghi
// B1: Tạo câu truy vấn:
$sql_select_all = "SELECT * FROM products ORDER BY created_at DESC";
// B2: Thực thi truy vấn, SELECT return obj
$obj_select_all = mysqli_query($connection, $sql_select_all);
// B3: Lấy mảng kết hợp 2 chiều nhiều phần tử từ obj trên:
$products = mysqli_fetch_all($obj_select_all, MYSQLI_ASSOC);
//echo "<pre>";
//print_r($products);
//echo "</pre>";


// Hiển thị session thành công và lỗi nếu có dưới dạng flash
if (isset($_SESSION['success'])) {
  echo $_SESSION['success'];
  unset($_SESSION['success']);
}

if (isset($_SESSION['error'])) {
  echo $_SESSION['error'];
  unset($_SESSION['error']);
}

?>

<a href="create.php">Thêm mới sản phẩm</a>
<h2>Danh sách sản phẩm</h2>

<form method="get" action="delete_multiple.php">
    <input type="submit" name="delete" value="Xóa nhiều bản ghi"
           onclick="return confirm('Bạn có chắn chắn muốn xóa nhiều bản ghi')" />
    <br />
    <br />
    <table border="1" cellspacing="0" cellpadding="8">
  <tr>
    <th>
        <input type="checkbox" id="check-all" title="Check/Uncheck All" />
    </th>
    <th>ID</th>
    <th>Name</th>
    <th>Price</th>
    <th>Description</th>
    <th>Created_at</th>
    <th></th>
  </tr>

  <?php foreach ($products AS $product): ?>
    <tr>
      <td>
          <input type="checkbox" name="checks[]" class="checkbox-item" value="<?php echo $product['id']; ?>" />
      </td>
      <td><?php echo $product['id']; ?></td>
      <td><?php echo $product['name']; ?></td>
      <td><?php echo number_format($product['price'], 0, '.', '.') ?> vnđ</td>
      <td><?php echo $product['description']; ?></td>
      <td>
<!--        20/12/2021 21:50:00-->
        <?php echo date('d/m/Y H:i:s', strtotime($product['created_at'])); ?>
      </td>
      <th>
<!--    Truyền lên URL dưới dạng GET    -->
        <a href="update.php?id=<?php echo $product['id']; ?>">Sửa</a>
        <a href="delete.php?id=<?php echo $product['id']; ?>"
           onclick="return confirm('Bạn có chắc chắn muốn xóa sản phẩm này ko?')">Xóa</a>
      </th>
    </tr>
  <?php endforeach; ?>

</table>
</form>
<!-- crud/js/jquery-3.5.1.min.js -->
<script src="js/jquery-3.5.1.min.js"></script>

<script type="text/javascript">
    // Đảm bảo code JS luôn chạy sau cùng, ko qtrong vị trí trước hay sau HTML
    $(document).ready(function() {
        // alert('hello jQuery');
        // Với PHP thì nên tích hợp thư viện jQuery khi muốn thao tác với Javascript, cho đơn giản
        // - Logic: Click vào checkbox check/uncheck all, thì sẽ check/uncheck all tương ứng các input của từng sản phẩm
        var selectorCheckAll = $('#check-all');
        selectorCheckAll.click(function() {
           var isChecked = $(this).prop('checked'); // Ktra xem check all có đc đang đc check hay ko
           if (isChecked) {
               $('.checkbox-item').prop('checked', true);
           } else {
               $('.checkbox-item').prop('checked', false);
           }
        });
    })
</script>
