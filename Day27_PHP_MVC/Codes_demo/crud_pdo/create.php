<?php
session_start();
require_once 'connection.php';
//create.php
//employees: id, name, description, gender, salary, created_at

// Xử lý submit form
echo "<pre>";
print_r($_POST);
echo "</pre>";
// + Tạo biến chứa lỗi
$error = '';
// + Nếu user submit thì mới xử lý
if (isset($_POST['submit'])) {
    // + Tạo biến trung gian
    $name = $_POST['name'];
    $description = $_POST['description'];
    $gender = 0;
    if (isset($_POST['gender'])) {
        $gender = $_POST['gender'];
    }
    $salary = $_POST['salary'];

    // + Validate ...
    // + Lưu vào CSDL chỉ khi ko có lỗi xảy ra:
    if (empty($error)) {
        // - Viết truy vấn dạng có tham số
        $sql_insert = "INSERT INTO employees(name,description,gender,salary)
        VALUES(:name,:description,:gender,:salary)";
        // - Cbi đối tượng truy vấn:
        $obj_insert = $connection->prepare($sql_insert);
        // - [Optional] Tạo mảng truyền giá trị thật cho tham số truy vấn
        $inserts = [
            ':name' => $name,
            ':description' => $description,
            ':gender' => $gender,
            ':salary' => $salary
        ];
        // - Thực thi: INSERT UPDATE DELETE -> boolean
        $is_insert = $obj_insert->execute($inserts);
        if ($is_insert) {
            $_SESSION['success'] = 'Thêm thành công';
            header('Location: index.php');
            exit();
        }
    }
}
?>

<form method="post">
    Tên NV:
    <input type="text" name="name" value="" />
    <br />
    Mô tả NV:
    <textarea name="description"></textarea>
    <br />
    Giới tính:
    <input type="radio" name="gender" value="0" /> Nữ
    <input type="radio" name="gender" value="1" /> Nam
    <br />
    Lương NV:
    <input type="number" name="salary" value="" />
    <br />
    <input type="submit" name="submit" value="Lưu NV" />
</form>
