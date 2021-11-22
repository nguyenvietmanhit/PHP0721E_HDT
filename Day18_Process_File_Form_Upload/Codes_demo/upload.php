<!--upload.php-->
<?php
// - 1 - Debug
// Dữ liệu từ $_POST, $_GET gửi lên sẽ ko thể lấy đc dữ liệu từ file gửi lên
//
// -> 2 điều kiện bắt buộc để form lấy đc dữ liệu từ file gửi lên
// + Method của form PHẢI là POST
// + Phải khai báo chuỗi sau cho form: enctype="multipart/form-data"
// - Để lấy thông tin file, debug biến mảng 2 chiều sau
echo "<pre>";
print_r($_FILES);
echo "</pre>";
echo "<pre>";
print_r($_POST);
echo "</pre>";
// - Các thông tin của $_FILES
// + name: tên file
// + type: định dạng file
// + tmp_name: đường dẫn tạm của file = XAMPP upload file vào 1 ví trị tạm thời trong nó
// + error: mã lỗi khi xampp upload vào thư mục tạm
// 0: upload vào thư mục tạm thành công -> qtam giá trị này
// 1: dung lượng file upload vượt quá cấu hình của hệ thống cho phép
// 2: vượt quá số file upload mà form cho phép
// + size: kích thước file, tính bằng Byte. 1Mb = 1024Kb = 1024 * 1024 B
// 2 - Tạo biến chứa lỗi và kết quả
$error = '';
$result = '';
// 3 - Xử lý logic chỉ khi user submit form
if (isset($_POST['submit'])) {
  // 4 - Tạo biến trung gian
  $fullname = $_POST['fullname'];
  $avatars = $_FILES['avatar']; // biến $avatars là mảng 1 chiều
  // 5 - Validate form
  // + File upload phải là ảnh
  // + File upload dung lượng lớn nhất 2Mb
  // - Xử lý file luôn luôn phải chắc chắn là file đc tải lên thành công vào thư mục tạm -> luôn luôn
  // dựa vào error, nếu error = 0 thì file đc tải vào tmp thành công
  if ($avatars['error'] == 0) {
    // + Validate file upload phải là ảnh: dựa vào đuôi file: jpg png jpeg gif
    // Lấy đuôi file từ tên file upload
    $extension = pathinfo($avatars['name'], PATHINFO_EXTENSION);
    // Chuyển về chuỗi ký tự thường:
    $extension = strtolower($extension);
//    var_dump($extension);
    // Tạo 1 mảng chứa các đuôi file ảnh hợp lệ
    $allows = ['jpg', 'png', 'jpeg', 'gif'];
    if (!in_array($extension, $allows)) {
      $error = 'File upload phải là ảnh';
    }

    // + Validate file upload dung lượng lớn nhất 2Mb
    $size_b = $avatars['size'];
    // Chuyển từ Byte về Mb: 1Mb = 1024 Kb, 1Kb = 1024 B
    $size_mb = $size_b / 1024 / 1024;// 1.2623543543543543543
    // Làm tròn để nhìn cho đẹp
    $size_mb = round($size_mb, 2); //1.27
    if ($size_mb > 2) {
      $error = 'Phải upload file tối đa 2Mb';
    }


  }

  // 6 - Xử logic bài toán chỉ khi ko có lỗi
  if (empty($error)) {
    $result .= "Fullname: $fullname";
    // + Xử lý upload file khi có file đc tải lên thành công vào thư mục tạm
    if ($avatars['error'] == 0) {
        // Tạo thư mục để lưu các file sẽ upload vào: tạo bằng code
      $dir_upload = 'uploads';
      // Luôn phải check nếu thư mục chưa tồn tại thì mới tạo mới
      if (!file_exists($dir_upload)) {
          mkdir($dir_upload);
      }
      // Sinh tên file mang tính duy nhất
      $filename = time() . "-" . $avatars['name'];
      // Gọi hàm để chính thức chuyển file từ thư mục tạm vào thư mục upload
      move_uploaded_file($avatars['tmp_name'], "$dir_upload/$filename");
      // Hiển thị thông tin file ra màn hình: sử dụng thẻ img + src
    }
  }

}
?>
<!--7 - Hiển thị ra form-->
<h3 style="color: red"><?php echo $error; ?></h3>
<h3 style="color: green"><?php echo $result; ?></h3>
<h1>Demo xử lý upload file trong form</h1>
<form action="" method="post" enctype="multipart/form-data">
    Nhập tên của bạn:
    <input type="text" name="fullname"/>
    <br/>
    Upload avatar
    <input type="file" name="avatar"/>
    <!--  Upload nhiều file  -->
    <!--  <input type="file" name="avatar[]" multiple />-->
    <br/>
    <input type="submit" name="submit" value="Upload"/>
</form>
