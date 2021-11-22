<!--process_file.php-->
<?php
// 1/ Đọc file trong PHP
// + Đọc từng hàng của file: giữ nguyên format của file
$reads = file('demo_read.txt');
echo "<pre>";
print_r($reads);
echo "</pre>";
foreach ($reads AS $read) {
  echo $read . "<br />";
}
// + Đọc toàn bộ file
$file_content = file_get_contents('demo_read.txt');
echo $file_content;
// 2 / Ghi file
// + Ghi đè: dữ liệu trước đó sẽ mất hết
file_put_contents('override.txt', 'nội dung được ghi đè');

// + Ghi nối: ghi nối tiếp vào dữ liệu đang có
file_put_contents('append.txt', 'nội dung đc ghi nối tiếp', FILE_APPEND);
// 3 / Một số hàm về xử lý file:
// + Xóa file
//unlink('override.txt');
// + Kiểm tra đường dẫn file/thư mục có tồn tại hay ko
$check1 = file_exists('abcdfsadsad.txt'); //false
?>
