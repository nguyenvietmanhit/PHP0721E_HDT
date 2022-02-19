<?php
session_start();
require_once 'connection.php';
//update.php
$id = $_GET['id'];
// - Lấy NV theo id để đổ dữ liệu ra form
// + Viết truy vấn lấy 1 bản ghi dạng tham số:
$sql_select_one = "SELECT * FROM employees WHERE id = :id";
// + Cbi obj truy vấn:
$obj_select_one = $connection->prepare($sql_select_one);
// + [Optional]
$selects = [
    ':id' => $id
];
// + Thực thi
$obj_select_one->execute($selects);
// + Trả về mảng dữ liệu
$employee = $obj_select_one->fetch(PDO::FETCH_ASSOC);
echo "<pre>";
print_r($employee);
echo "</pre>";
?>

<form method="post">
    Tên NV:
    <input type="text" name="name" value="<?php echo $employee['name']; ?>" />
    <br />
    Mô tả NV:
    <textarea name="description"><?php echo $employee['description']; ?></textarea>
    <br />
    <?php
    $checked_female = '';
    $checked_male = '';
    switch ($employee['gender']) {
        case 0: $checked_female = 'checked';break;
        case 1: $checked_male = 'checked';
    }
    ?>
    Giới tính:
    <input type="radio" name="gender" value="0" <?php echo $checked_female; ?> /> Nữ
    <input type="radio" name="gender" value="1" <?php echo $checked_male; ?> /> Nam
    <br />
    Lương NV:
    <input type="number" name="salary" value="<?php echo $employee['salary']; ?>" />
    <br />
    <input type="submit" name="submit" value="Lưu NV" />
</form>
