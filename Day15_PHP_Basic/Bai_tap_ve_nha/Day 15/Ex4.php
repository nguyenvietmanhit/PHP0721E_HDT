<?php
$name = 'Nguyễn Viết Mạnh';
$age = 29;
$dob = '05/01/1990';
$gender = 'Nam';
$hometown = 'Sơn Đồng - Hoài Đức - Hà Nội';
?>
<h3>Thông tin căn bản về bạn</h3>
<table style="border: 1px solid black;">
    <tr>
        <td style="text-align: center;"><b>Họ tên</b></td>
        <td style="text-align: center;"><b>Tuổi</b></td>
        <td style="text-align: center;"><b>Ngày sinh</b></td>
        <td style="text-align: center;"><b>Giới tính</b></td>
        <td style="text-align: center;"><b>Quê quán</b></td>
    </tr>
    <tr>
        <td><?php echo $name;?></td>
        <td><?php echo $age;?></td>
        <td><?php echo $dob;?></td>
        <td><?php echo $gender;?></td>
        <td><?php echo $hometown;?></td>
    </tr>
</table>
<style>
    table, th, td {
        border: 1px solid black;
        border-collapse: collapse;
    }
</style>


