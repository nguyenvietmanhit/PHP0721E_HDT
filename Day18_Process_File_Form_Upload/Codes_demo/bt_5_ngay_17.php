<!--bt5_ngay_17.php-->
<?php
// 1 - Debug
echo "<pre>";
print_r($_POST);
echo "</pre>";
// 2 - Tạo biến chứa lỗi và kết quả
// Mỗi biến error tương ứng với từng input
$error_firstname = '';
$error_lastname = '';
$error_username = '';
$error_email = '';
$error_password = '';
$error_confirm_password = '';
$result = '';
// 3 - Xử lý form chỉ khi user submit form
if (isset($_POST['submit'])) {
  // 4 - Tạo biến trung gian để thao tác cho dễ
  $firstname = $_POST['first_name'];
  $lastname = $_POST['last_name'];
  $username = $_POST['username'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $confirm_password = $_POST['confirm_password'];
  // 5 - Validate form:
  // + Tất cả trường phải nhập
  if (empty($firstname)) {
    $error_firstname = 'Firstname phải nhập';
  }
  if (empty($lastname)) {
    $error_lastname = 'Lastname phải nhập';
  }
  if (empty($username)) {
    $error_username = 'Username phải nhập';
  }
  if (empty($email)) {
    $error_email = 'Email phải nhập';
  }
  if (empty($password)) {
    $error_password = 'Password phải nhập';
  }
  if (empty($confirm_password)) {
    $error_confirm_password = 'Confirm Password phải nhập';
  }
  // + Email phải đúng định dạng
  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $error_email = 'Email chưa đúng định dạng';
  }
  // + Confirm password phải đúng với password
  if ($confirm_password != $password) {
      $error_confirm_password = 'Confirm password chưa đúng';
  }
  // 6 - Xử lý logic chính của bài toán chỉ khi nào ko có lỗi xảy ra
  if (empty($error_firstname) && empty($error_lastname) && empty($error_username) &&
    empty($error_email) && empty($error_password) && empty($error_confirm_password)) {
      $result .= "Firstname: $firstname <br />";
      $result .= "Lastname: $lastname <br />";
      $result .= "Username: $username <br />";
      $result .= "Email: $email <br />";
      $result .= "Password: $password <br />";
      $result .= "Confirm Password: $confirm_password <br />";
  }
  // 7 - Đổ dữ liệu lỗi và kết quả ra form
}
?>

<style>
    .error {
        color: red;
    }
</style>
<form action="" method="post">
<!--  8 - Đổ lại dữ liệu đã nhập ra form: bỏ qua  -->
    Firstname: <input type="text" name="first_name" value=""/>
    <p class="error"><?php echo $error_firstname; ?></p>
    <br/>
    Lastname: <input type="text" name="last_name" value=""/>
    <p class="error"><?php echo $error_lastname; ?></p>
    <br/>
    Username: <input type="text" name="username" value=""/>
    <p class="error"><?php echo $error_username; ?></p>
    <br/>
    Email Address: <input type="text" name="email" value=""/>
    <p class="error"><?php echo $error_email; ?></p>
    <br/>
    Password: <input type="password" name="password"/>
    <p class="error"><?php echo $error_password; ?></p>
    <br/>
    Confirm Password: <input type="password" name="confirm_password"/>
    <p class="error"><?php echo $error_confirm_password; ?></p>
    <br/>
    <input type="submit" name="submit" value="Save"/>
    <h3 style="color: green"><?php echo $result; ?></h3>
<!--  Nghỉ giải lao 20h15  -->
</form>
