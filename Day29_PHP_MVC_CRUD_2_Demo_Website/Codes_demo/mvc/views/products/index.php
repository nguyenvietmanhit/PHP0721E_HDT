<!--views/products/index.php-->
<?php
//var_dump($products);
?>
<a href="index.php?controller=product&action=create">Thêm mới sp</a>
<h2>Danh sách sp</h2>
<table border="1" cellspacing="0" cellpadding="8">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Price</th>
        <th>Created_at</th>
        <th></th>
    </tr>
    <?php foreach ($products AS $product): ?>
        <tr>
            <td><?php echo $product['id']; ?></td>
            <td><?php echo $product['name']; ?></td>
            <td><?php echo number_format($product['price']); ?> VND</td>
            <td>
            <?php echo date('d-m-Y H:i:s', strtotime($product['created_at'])); ?>
            </td>
            <td>
                <a href="index.php?controller=product&action=update&id=<?php echo $product['id']?>">
                    Sửa
                </a>
                <a href="index.php?controller=product&action=delete&id=<?php echo $product['id']?>" onclick="return confirm('Xóa?')">Xóa</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>