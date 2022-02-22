<?php
//controllers/ProductController.php
require_once 'controllers/Controller.php';
require_once 'models/Product.php';
class ProductController extends Controller {
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
                var_dump($is_insert);
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