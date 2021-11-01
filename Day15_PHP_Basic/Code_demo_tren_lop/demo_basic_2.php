<?php
//demo_basic_2.php
// Toán tử, biểu thức điều kiện, vòng lặp
// 1/ Toán tử
// + Toán tử số học: + - * / % ++ --
// + Toán tử so sánh: > >= < <= != ==
// + Toán tử logic: && || !
// + Toán tử gán: = += -= *= /= %=

// 2 - Câu lệnh điều kiện: if else elseif switch case
// 3 - Toán tử điều kiện:? :
$number = 5;
if ($number > 0) {
  echo "Biến number > 0";
} else {
  echo "Biến number <= 0";
}

echo $number > 0 ? "Biến number > 0" : "Biến number <= 0";
// - Chú ý khi sử dụng câu lệnh điều kiện để hiển thị ra 1 khối HTML phức tạp
// VD: kiêm tra nếu biểu thức true thì hiển thị 1 cấu trúc bảng HTML
$number = 5;
if ($number > 0 ) {
  echo "<table border='1'>";
    echo "<tr>";
      echo "<td>Hàng 1 cột 1</td>";
      echo "<td>Hàng 1 cột 2</td>";
      echo "<td>Hàng 1 cột 3</td>";
    echo "</tr>";
  echo "</table>";
}
?>

<!--Sử dụng cú pháp viết tắt của PHP để hiển thị HTML phức tạp-->
<?php if ($number > 0): ?>
  <table>
    <tr>
      <td>Hàng 1 cột 1</td>
      <td>Hàng 1 cột 2</td>
      <td>Hàng 1 cột 3</td>
    </tr>
  </table>
<?php endif; ?>

<!--If else viết tắt-->
<?php if ($number > 0): ?>

<?php else: ?>

<?php endif; ?>

<!--If elseif else viết tắt-->
<?php if ($number > 0): ?>

<?php elseif ($number > 1): ?>

<?php elseif ($number > 2): ?>

<?php else: ?>

<?php endif; ?>


<?php
// 4 - Vòng lặp: for, while, do...while -> PHP rất ít khi dùng 3 vòng lặp này
// 5 - Từ khóa break-continue:
// 6 - Demo 1 số hàm có sẵn thao tác với chuỗi, số, thời gian
// + Xử lý chuỗi:
// - Trả về độ dài của chuỗi: strlen
$length = strlen('abcdef');
var_dump($length); //6
// - Chuyển chuỗi thành chữ hoa: strtoupper
$string = strtoupper('Hello abc'); // HELLO ABC
var_dump($string);
// - Chuyển về thường: strtolower
var_dump(strtoupper('HELLO abc')); //hello abc
// - Viết hoa ký tự đầu tiên của chuỗi: ucfirst
var_dump(ucfirst('abc def ghi')); // Abc def ghi
// - Viết hoa ký tự đầu tiên của từng từ: ucwords
var_dump(ucwords('nguyen viet manh')); // Nguyen Viet Manh
// - Xóa bỏ khoảng trắng 2 đầu chuỗi: trim
var_dump(trim('    hello abc    ')); //hello abc
// - Tìm kiếm và thay thế: str_replace
$string = "Hello world";
$search = "world";
$replace = "manhnv";
$result = str_replace($search, $replace, $string);
var_dump($result); //Hello manhnv
// - Cắt chuỗi: substr
$string = "Hello world";
echo substr($string, 1); //ello world
echo substr($string, 1, 3) ; //ell
// - Tìm ví trị xuất hiện lần đầu tiên của chuỗi trong chuỗi: strpos
$string = "Hello manhnv abc";
$search = "manhnv";
$pos = strpos($string, $search);
var_dump($pos); //6

// + Xử lý số:
// - Ktra có phải số hay ko: is_numeric
var_dump(is_numeric(123.45)); // true
var_dump(is_numeric("123.45")); // true
var_dump(is_numeric("tt123.45")); // false
// - Ktra số nguyên hay ko: is_int
// - Ktra số thực hay ko: is_float
// - Làm tròn lên số nguyên gần nhất của phần thập phân: > 5 tăng 1, ngược lại là phần nguyên hiện tại: round
echo round(121.12121); //121
echo round(15) ; //15
echo round(12.65); //13
echo round(-12.65); //-13
// - Làm tròn số lên số nguyên lớn nhất với giá trị hiện tại: ceil
echo ceil(1.37); //2
echo ceil(-1.67); // -1
echo ceil(1.7); //2
// - Làm tròn số xuống số nguyên nhỏ nhất với giá trị hiện tại: floor
echo floor(1.37); //1
echo floor(-1.67); // -2
echo floor(1.7); //1
// - min, max, abs, pow, sqrt
// - Format giá trị theo đơn vị tiền: number_format
$number = 10000000;
echo number_format($number); //10,000,000
echo number_format($number, 0, '.', '.'); //10.000.000

// + Thao tác với thời gian
// - Set múi giờ theo khu vực
date_default_timezone_set('Asia/Ho_Chi_Minh');

// - Lấy ra timezone/múi giờ của hệ thống hiện tại:
echo date_default_timezone_get(); //
// Hiển thị ngày giờ hiện tại: d ngày, m tháng, Y năm đủ 4 chữ số, H giờ, i phút, s giây
echo date('d-m-Y H:i:s') ; //

// Ctrl + Alt + L để format code
// - Lấy thời gian Unix - số giây tính từ thời điểm hiện tại so với 1/1/1970
echo time(); //
// - Chuyển chuỗi ngày giờ về thời gian Unix (số giây): strtotime
// Bắt buộc format ngày giờ phải là: Y-m-d H:i:s
echo strtotime('2019-12-31'); //
?>
