<?php
require_once 'helpers/Helper.php';
?>

<h2>Form tìm kiếm</h2>
<form method="get" action="">
<!--  Với form GET, thì bắt buộc phải truyền lên tham số controller và action
  thủ công-->
    <input type="hidden" name="controller" value="product" />
    <input type="hidden" name="action" value="index" />
    <div class="row">
        <div class="col-md-6 col-sm-6 col-12">
            <label for="title">Tên sp</label>
            <input type="text" name="title" id="title"
                   value="<?php echo isset($_GET['title']) ? $_GET['title'] : '' ?>"
                   class="form-control" />
        </div>
        <div class="col-md-6 col-sm-6 col-12">
            <label for="price">Giá sp</label>
            <input type="number" name="price" id="price"
                   value="<?php echo isset($_GET['price']) ? $_GET['price'] : '' ?>"
                   class="form-control" />
        </div>
    </div>
    <br />
    <br />
    <input type="submit" name="search" value="Tìm kiếm" class="btn btn-success" />
    <a href="index.php?controller=product&action=index" class="btn btn-default">
        Xóa tìm kiếm
    </a>
</form>


<h2>Danh sách sản phẩm</h2>
    <a href="index.php?controller=product&action=create" class="btn btn-success">
        <i class="fa fa-plus"></i> Thêm mới
    </a>
<table class="table table-bordered">
    <tr>
        <th>ID</th>
        <th>Category name</th>
        <th>Title</th>
        <th>Avatar</th>
        <th>Price</th>
        <th>Amount</th>
        <th>Status</th>
        <th>Created_at</th>
        <th>Updated_at</th>
        <th></th>
    </tr>
    <?php if (!empty($products)): ?>
        <?php foreach ($products as $product): ?>
            <tr>
                <td><?php echo $product['id'] ?></td>
                <td><?php echo $product['category_name'] ?></td>
                <td><?php echo $product['title'] ?></td>
                <td>
                    <?php if (!empty($product['avatar'])): ?>
                        <img height="80" src="assets/uploads/<?php echo $product['avatar'] ?>"/>
                    <?php endif; ?>
                </td>
                <td><?php echo number_format($product['price']) ?></td>
                <td><?php echo $product['amount'] ?></td>
                <td><?php echo Helper::getStatusText($product['status']) ?></td>
                <td><?php echo date('d-m-Y H:i:s', strtotime($product['created_at'])) ?></td>
                <td><?php echo !empty($product['updated_at']) ? date('d-m-Y H:i:s', strtotime($product['updated_at'])) : '--' ?></td>
                <td>
                    <?php
                    $url_detail = "index.php?controller=product&action=detail&id=" . $product['id'];
                    $url_update = "index.php?controller=product&action=update&id=" . $product['id'];
                    $url_delete = "index.php?controller=product&action=delete&id=" . $product['id'];
                    ?>
                    <a title="Chi tiết" href="<?php echo $url_detail ?>"><i class="fa fa-eye"></i></a> &nbsp;&nbsp;
                    <a title="Update" href="<?php echo $url_update ?>"><i class="fa fa-pencil-alt"></i></a> &nbsp;&nbsp;
                    <a title="Xóa" href="<?php echo $url_delete ?>" onclick="return confirm('Are you sure delete?')"><i
                                class="fa fa-trash"></i></a>
                </td>
            </tr>
        <?php endforeach; ?>

    <?php else: ?>
        <tr>
            <td colspan="9">No data found</td>
        </tr>
    <?php endif; ?>
</table>