<!--demo_basic.php-->
<?php
echo "Hello World";
// PHP CƠ BẢN: rất giống Javascript, chỉ khác cú pháp
// 1 - Biến
// 2 - Kiểu dữ liệu PHP: string, int, float, boolean -> 4 kiểu nguyên thủy
// null , array, object
// 3 - Ép kiểu dữ liệu: dùng tên kiểu dữ liệu trước giá trị cần ép
$number = 5.0;
$number1 = (int) $number;
// 4 - Hằng: là biến tuy nhiên ko thể thay đổi giá trị 1 khi đã khai báo
// C1:
const PI = 3.14;
const MAX_AGE = 120;
// C2:
define('YEAR', 2021);
// Nên dùng C1 để khai báo hằng
echo PI; //3.14
//PI = 123; //cố tính gán giá trị cho hằng sẽ báo lỗi
// Một số hằng có sẵn của PHP
echo "<br />";
echo __LINE__; // số dòng code hiện tại đang gọi hằng này = 22
echo "<br />";
echo __FILE__; // đường dẫn tuyệt đối/vật lý tới file hiện tại
echo "<br />";
echo __DIR__; // đường dẫn tuyệt đối tới thư mục cha chứa file hiện tại
//  5 - Hàm:
// - Khối code xử lý logic nào đó, có tính sử dụng lại
// - Cú pháp và các loại hàm giống hệt Javacsript
function showName($name) {
    echo "Hello: $name";
}
showName('Mạnh'); //Hello: Mạnh
function sum($number1, $number2) {
    $sum = $number1 + $number2;
    return $sum;
}
$sum1 = sum(1, 2); //3
echo "<br /> Tổng = $sum1"; // Tổng = 3

// 6 - Truyền biến kiểu tham trị và tham chiếu
// VD1: tham trị
$number = 5;
echo "<br /> Biến number ban đầu = $number"; // 5

function changeNumber($x) {
    $x = 1;
    echo "<br /> Biến bên trong hàm = $x"; //1
}
changeNumber($number);
echo "<br /> Biến number sau khi gọi hàm = $number"; //5
// -> biến number ban đầu ko hề bị thay đổi giá trị sau khi gọi hàm -> kiểu tham trị
// -> khi gọi hàm và truyền giá trị -> nó tạo 1 bản sao của biến ban đầu để truyền vào hàm
// -> hàm đang thao tác với bản sao của biến -> bản gốc ko thay đổi

// Vd2: tham chiếu
$number = 6;
echo "<br />Biến number ban đầu  = $number"; //6

function changeNumberRef(&$x) {
    $x = 2;
    echo "<br /> Biến bên trong hàm = $x"; //2
}
changeNumberRef($number);
echo "<br /> Biến number sau khi gọi hàm = $number"; //2
// -> biến number bị đổi giá trị sau khi gọi hàm -> do kiểu truyền tham chiếu -> truyền bản gốc vào
//hàm
// -> tham trị hay gặp khi code Framework PHP: Laravel ...
// -> tham chiếu hay gặp khi code CMS PHP: Wordpress, Zoomla ...

// - 7 - Tìm hiểu 1 số hàm nhúng file trong PHP:
// Nhúng file: 1 website thực tế đc tổ chức dưới cấu trúc file/thư mục để dễ quản lý/dễ code
// -> cần phải nhúng file qua lại để code có thể chạy đc liền mạch
// - Sử dụng các hàm include, require đế nhúng file
// - Tạo 1 file file1.php, ngang hàng với file demo_basic.php hiện tại
// + Demo nhúng file theo 2 cơ chê include và require
// Include và require khác nhau về cơ chế thông báo lỗi khi đường dẫn file ko tồn tại
// -> include báo lỗi warning -> code phía sau vẫn chạy
// -> require báo lỗi fatal -> code phía sau ko chạy -> chặt chẽ hơn include
//require 'filedsadsadsaasd1.php';
// + include_once và require_once -> nhúng 1 file duy nhất kể cả gọi nhiều lần
//include_once 'file1.php';
//include_once 'file1.php';
//include_once 'file1.php';
//include_once 'file1.php';
//include_once 'file1.php';
// -> thường dùng require_once đế nhúng file: dừng chương trình khi file ko tồn tại, chỉ nhúng file 1 lần duy nhất
//include 'file1.php';
//include_once 'file1.php';
require_once 'file1.php';

echo "<h3>Nội dung thẻ b</h3>";
?>
