<?php
session_start();
require_once 'connection.php';
//index.php: R - Retrieve
// - Viết truy vấn lấy dữ liệu dạng tham số nếu có:
$sql_select_all = "SELECT * FROM employees ORDER BY created_at DESC";
// - Cbi obj truy vấn:
$obj_select_all = $connection->prepare($sql_select_all);
// - [Optional] -> bỏ qua
// - Thực thi, SELECT ko cần thao tác với kqua trả về sau khi thực thi
$obj_select_all->execute();
// - Lấy mảng nhiều phần tử:
$employees = $obj_select_all->fetchAll(PDO::FETCH_ASSOC);
echo '<pre>';
print_r($employees);
echo '</pre>';
?>

<a href="create.php">Thêm mới</a>
<h2>Danh sách NV</h2>
<table border="1" cellpadding="8" cellspacing="0">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Description</th>
        <th>Gender</th>
        <th>Salary</th>
        <th>Created_at</th>
        <th></th>
    </tr>
    <?php foreach ($employees AS $employee): ?>
        <tr>
            <td><?php echo $employee['id']; ?></td>
            <td><?php echo $employee['name']; ?></td>
            <td><?php echo $employee['description']; ?></td>
            <td>
                <?php
                $gender_text = '';
                switch ($employee['gender']) {
                    case 0: $gender_text = 'Nữ';break;
                    case 1: $gender_text = 'Nam';
                }
                echo $gender_text;
                ?>
            </td>
            <td>
                <?php echo number_format($employee['salary'],
                    0, '.', '.') ?> $
            </td>
            <td>
                <?php echo date('d-m-Y H:i:s', strtotime($employee['created_at'])); ?>
            </td>
            <td>
                <a href="update.php?id=<?php echo $employee['id']; ?>">Sửa</a>
                <a href="delete.php?id=<?php echo $employee['id']; ?>" onclick="return confirm('Muốn xóa?')">Xóa</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>