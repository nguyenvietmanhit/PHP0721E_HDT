<!--views/products/update.php-->

<h2>Form cập nhật sản phẩm</h2>
<form action="" method="post">
    Tên sp:
    <input type="text" name="name" value="<?php echo $product['name']; ?>" />
    <br />

    Giá sp:
    <input type="number" name="price" value="<?php echo $product['price']; ?>" />
    <br />
    <input type="submit" name="submit" value="Lưu sp" />
    <a href="index.php?controller=product&action=index">Về trang danh sách</a>
</form>