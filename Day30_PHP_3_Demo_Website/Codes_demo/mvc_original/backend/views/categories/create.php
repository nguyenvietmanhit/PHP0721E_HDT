<?php
//mvc_demo/views/categories/create.php
//Hiển thị form thêm mới category
// - Cách tích hợp trình soạn thảo CKEditor và trình upload ảnh CKFinder
// vào hệ thống
// - CKFinder: là trình upload ảnh cho phép tải ảnh từ local, tích hợp
//với CKEditor
?>

<form action="" method="post">
    Tên danh mục:
    <input type="text" name="name" value="" />
    <br />
    Chi tiết danh mục:
    <textarea name="description"></textarea>
    <br />
    <input type="submit" name="submit" value="Lưu danh mục" />
</form>