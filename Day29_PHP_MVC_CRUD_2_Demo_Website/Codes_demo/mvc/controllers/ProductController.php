<?php
//controllers/ProductController.php
require_once 'controllers/Controller.php';
require_once 'models/Product.php';
class ProductController extends Controller {

    public function delete() {
        // Lấy id từ url, validate tham số id:
        if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
            $_SESSION['error'] = 'Tham số id ko hợp lệ';
            header('Location: index.php?controller=product&action=index');
            exit();
        }

        $id = $_GET['id'];
        // Gọi Model để thực hiện truy vấn xóa:
        $product_model = new Product();
        $is_delete = $product_model->deleteData($id);
        if ($is_delete) {
            $_SESSION['success'] = 'Xóa thành công';
        }
        $_SESSION['error'] = 'Xóa thất bại';
        header('Location: index.php?controller=product&action=index');
        exit();
    }

    public function update() {
        // Lấy id từ url, validate tham số id:
        if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
            $_SESSION['error'] = 'Tham số id ko hợp lệ';
            header('Location: index.php?controller=product&action=index');
            exit();
        }

        $id = $_GET['id'];
        // Gọi Model để lấy sp theo id:
        $product_model = new Product();
        $product = $product_model->getOne($id);

        // Xử lý submit form trước logic gọi view:
        if (isset($_POST['submit'])) {
            $name = $_POST['name'];
            $price = $_POST['price'];
            if (empty($name) || empty($price)) {
                $this->error = 'Ko đc để trống 2 trường';
            }
            if (empty($this->error)) {
                $data = [
                    'name' => $name,
                    'price' => $price,
                    'id' => $id
                ];
                $is_update = $product_model->updateData($data);
                if ($is_update) {
                    $_SESSION['success'] = "Cập nhật bản ghi có id=$id thành công";
                    header('Location: index.php?controller=product&action=index');
                    exit();
                }
                $this->error = 'Cập nhật thất bại';
            }
        }

        // Controller gọi view để hiển thị form update
        $this->page_title = 'Cập nhật sp';
        $this->content = $this->render('views/products/update.php', [
            'product' => $product
        ]);
        require_once 'views/layouts/main.php';
    }

    //index.php?controller=product&action=index
    public function index() {
        // - Controller gọi Model để nhờ Model lấy dữ liệu
        $product_model = new Product();
        $products = $product_model->getData();
        echo '<pre>';
        print_r($products);
        echo '</pre>';

        // - Controller gọi View để hiển thị trước
        $this->page_title = 'Liệt kê sản phẩm';
        // Truyền biến ra view để sử dụng qua tham số thứ 2 của hàm render
        $this->content = $this->render('views/products/index.php', [
            'products' => $products
        ]);
        require_once 'views/layouts/main.php';
    }

    //index.php?controller=product&action=create
    public function create() {
        // - Xử lý submit form tại controller, trước hiển thị view
        echo '<pre>';
        print_r($_POST);
        echo '</pre>';
        if (isset($_POST['submit'])) {
            $name = $_POST['name'];
            $price = $_POST['price'];
            // Validate
            if (empty($name) || empty($price)) {
                $this->error = "Tên hoặc giá ko đc để trống";
            }
            if (empty($this->error)) {
                // Gọi Model để nhờ Model thêm vào CSDL, theo đúng MVC
                $product_model = new Product();
                $arrs = [
                    'name' => $name,
                    'price' => $price
                ];
                $is_insert = $product_model->insertData($arrs);
//                var_dump($is_insert);
                if ($is_insert) {
                    $_SESSION['success'] = 'Thêm mới thành công';
                    header('Location: index.php?controller=product&action=index');
                    exit();
                }
                $this->error = 'Thêm mới thất bại';
                //Tạo CSDL php0721e_mvc, bảng products: id,name,price,created_at
            }
        }


//        echo 'thêm mới sp';
        $this->page_title = "Thêm mới sp";
        // - Gọi view để hiển thị ra form thêm mới trước, dùng layout động
        // Lấy nội dung file view thêm mới, gán cho thuộc tính content của class cha
        $this->content = $this->render('views/products/create.php');
//        var_dump($this->content);
        // - Gọi layout để hiển thị các nội dung động trên trang là
        // thuộc tính content và page_title
        require_once 'views/layouts/main.php';
    }
}