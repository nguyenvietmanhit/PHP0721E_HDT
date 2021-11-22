<!--process_form_2.php-->

<?php
// XỬ LÝ FORM
// + B1: Tạo biến chứa lỗi và kết quả:
$error = '';
$result = '';
// + B2: Debug
echo "<pre>";
print_r($_GET);
echo "</pre>";
// + B3: Ktra nếu user submit form thì mới xử lý, dựa vào name nút của submit
if (isset($_GET['submit'])) {
  // +B4: Tạo biến trung gian để thao tác cho dễ
  // Cần chú ý với radio và checkbox vì có thể user ko tích gì mà submit, thì sẽ ko tồn tại!
//  $gender = $_GET['gender'];
//  $jobs = $_GET['jobs'];
  $country = $_GET['country'];
  $note = $_GET['note'];
  // + B5: Validate form:
  // Tất cả các trường phải nhập
  if (!isset($_GET['gender'])) {
    $error = 'Phải chọn giới tính';
  } elseif (!isset($_GET['jobs'])) {
    $error = 'Phải chọn ít nhất 1 job';
  } elseif (empty($note)) {
    $error = 'Phải nhập ghi chú';
  }
  // + B6: Xử lý logic bài toán chỉ khi ko có lỗi xảy ra
  if (empty($error)) {
    // Hiển thị giới tính
    $gender = $_GET['gender'];
    $result .= "Giới tính: ";
    switch ($gender) {
      case 0:
        $result .= "Nữ";
        break;
      case 1:
        $result .= "Nam";
        break;
      default:
        $result .= "Khác";
    }
    // Hiển thị job
    $jobs = $_GET['jobs'];
    $result .= "<br /> Jobs vừa chọn: ";
    foreach ($jobs as $job) {
      switch ($job) {
        case 0:
          $result .= "Dev ";
          break;
        case 1:
          $result .= "Tester ";
          break;
        case 2:
          $result .= "PM ";
          break;
        case 3:
          $result .= "BA ";
      }
    }
    // Hiển thị quốc gia: xử lý select chọn 1 giống hệt với xử lý radio
    $result .= "<br /> Quốc gia vừa chọn: ";
    switch ($country) {
      case 0:
        $result .= "VN";
        break;
      case 1:
        $result .= "JP";
        break;
      case 2:
        $result .= "KR";
    }
    // Hiển thị ghi chú:
    $result .= "<br /> Ghi chú: $note";
  }
}
// + B7: Hiển thị error và result ra form
?>
<h3 style="color: red"><?php echo $error; ?></h3>
<h3 style="color: green"><?php echo $result; ?></h3>
<!--+ B8: Đổ dữ liệu đã nhập ra form: với radio, checkbox dùng thuộc tính checked, với select dùng thuộc tính selected-->
<form method="get" action="">
  <?php
  // Đổ lại dữ liệu cho radio, checked
  // Tạo các biến để set checked cho từng radio
  $checked_female = '';
  $checked_male = '';
  $checked_another = '';
  if (isset($_GET['gender'])) {
    $gender = $_GET['gender'];
    switch ($gender) {
      case 0: $checked_female = 'checked'; break;
      case 1: $checked_male = 'checked'; break;
      case 2: $checked_another = 'checked';
    }
  }
  ?>
    Chọn giới tính:
    <!-- Input radio cần tự quy định value tương ứng với giá trị hiển thị nào. 0 -> nữ -->
    <input type="radio" name="gender" <?php echo $checked_female; ?> value="0"/> Nữ
    <input type="radio" name="gender" <?php echo $checked_male; ?> value="1"/> Nam
    <input type="radio" name="gender" <?php echo $checked_another; ?> value="2"/> Khác
    <br/>

    <?php
    // Đổ lại dữ liệu cho checkbox -> checked
    $checked_dev = '';
    $checked_tester = '';
    $checked_pm = '';
    $checked_ba = '';
    if (isset($_GET['jobs'])) {
        $jobs = $_GET['jobs'];
        foreach ($jobs AS $job) {
            switch ($job) {
              case 0: $checked_dev = 'checked';break;
              case 1: $checked_tester = 'checked';break;
              case 2: $checked_pm = 'checked';break;
              case 3: $checked_ba = 'checked';
            }
        }
    }
    ?>
    Chọn nghề nghiệp:
    <!--  Chú ý về cách đặt name cho checkbox là input cho phép chọn nhiều giá trị tại 1 thời điểm, cần ở dạng mảng -->
    <input type="checkbox" <?php echo $checked_dev; ?> name="jobs[]" value="0"/> Dev
    <input type="checkbox" <?php echo $checked_tester; ?> name="jobs[]" value="1"/> Tester
    <input type="checkbox" <?php echo $checked_pm; ?> name="jobs[]" value="2"/> PM
    <input type="checkbox" <?php echo $checked_ba; ?> name="jobs[]" value="3"/> BA
    <br/>

    <?php
    // Đổ lại dữ liệu cho select option, giống 100% xử lý radio
    // can thiệp selected vào option
    $selected_vn = '';
    $selected_jp = '';
    $selected_kr = '';
    if (isset($_GET['country'])) {
        $country = $_GET['country'];
        switch ($country) {
          case 0: $selected_vn = 'selected';break;
          case 1: $selected_jp = 'selected';break;
          case 2: $selected_kr = 'selected';
        }
    }
    ?>
    Chọn quốc gia:
    <select name="country">
        <option <?php echo $selected_vn; ?> value="0">VN</option>
        <option <?php echo $selected_jp; ?> value="1">JP</option>
        <option <?php echo $selected_kr ?> value="2">KR</option>
    </select>
    <br/>

    Ghi chú:
    <textarea name="note"><?php echo isset($_GET['note']) ? $_GET['note'] : ''; ?></textarea>
    <br/>

    <input type="submit" name="submit" value="Show info"/>
</form>
