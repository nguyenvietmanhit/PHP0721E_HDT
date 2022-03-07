<?php
require_once 'controllers/Controller.php';
require_once 'models/Product.php';

class CartController extends Controller
{
    public function add() {
        echo '<pre>';
        print_r($_GET);
        echo '</pre>';
        $product_id = $_GET['product_id'];
        // Lấy thông tin sp theo id
        $product_model = new Product();
        $product = $product_model->getById($product_id);
        $cart_item = [
            'name' => $product['title'],
            'price' => $product['price'],
            'avatar' => $product['avatar'],
            'quantity' => 1
        ];
        // Xử lý logic thêm sp vào giỏ hàng sử dụng session:
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'][$product_id] = $cart_item;
        } else {
            // Thêm 1 sp đã tồn tại trong giỏ
            if (isset($_SESSION['cart'][$product_id])) {
                $_SESSION['cart'][$product_id]['quantity']++;
            } else {
                //Thêm 1 sp chưa tồn tại trong giỏ
                $_SESSION['cart'][$product_id] = $cart_item;
            }
        }
//        echo '<pre>';
//        print_r($_SESSION['cart']);
//        echo '</pre>';
    }
}