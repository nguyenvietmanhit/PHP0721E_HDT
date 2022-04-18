<?php
require_once 'controllers/Controller.php';
require_once 'models/Order.php';
require_once 'models/OrderDetail.php';
require_once 'libraries/PHPMailer/src/PHPMailer.php';
require_once 'libraries/PHPMailer/src/SMTP.php';
require_once 'libraries/PHPMailer/src/Exception.php';

class PaymentController extends Controller
{
	public function index() {
		// - Xử lý submit form:
		echo '<pre>';
		print_r($_POST);
		echo '</pre>';
		if (isset($_POST['submit'])) {
			$fullname = $_POST['fullname'];
			$address = $_POST['address'];
			$mobile = $_POST['mobile'];
			$email = $_POST['email'];
			$note = $_POST['note'];
			$method = $_POST['method']; //phương thức thanh toán online hay COD
			// - Validate:
			if (empty($fullname) || empty($address) || empty($mobile)) {
				$this->error = 'Tên, địa chỉ, điện thoại phải nhập';
			}
			// - Thực thi logic chính
			if (empty($this->error)) {
				// + Lưu thông tin thanh toán vào bảng orders trước, lấy ra đc id của order
				//orders: id, fullname, address, mobile, email, note, price_total, payment_status
				//updated_at, created_at
				$order_model = new Order();
				// Tính tổng giá trị đơn hàng dựa vào session giỏ hàng
				$price_total = 0;
				foreach ($_SESSION['cart'] AS $cart) {
					$price_total += $cart['price'] * $cart['quantity'];
				}
				$params = [
					'fullname' => $fullname,
					'address' => $address,
					'mobile' => $mobile,
					'email' => $email,
					'note' => $note,
					'price_total' => $price_total,
					'payment_status' => 0 //mặc định đơn hàng là đơn hàng mới chưa thanh toán
				];
				$order_id = $order_model->insertPayment($params);
//				var_dump($order_id);
				// + Lưu thông tin chi tiết đơn hàng order_details dựa theo order_id vừa lưu
				//ở trên
				//order_details: order_id, product_name, product_price, quantity
				//orders - order_details: 1 - n
				$order_detail_model = new OrderDetail();
				foreach ($_SESSION['cart'] AS $cart) {
					$params = [
						'order_id' => $order_id,
						'product_name' => $cart['name'],
						'product_price' => $cart['price'],
						'quantity' => $cart['quantity']
					];
					$is_insert = $order_detail_model->insertOrderDetail($params);
					var_dump($is_insert);
				}
				// + Gửi mail xác nhận thanh toán cho user, sử dụng thư viện PHPMailer

				// + Dựa vào phương thức thanh toán để xử lý tiếp:
				// - Nếu user chọn thanh toán trực tuyến, chuyển hướng họ tới trang thanh toán
				//online
				if ($method == 0) {
					// Tạo session lưu lại thông tin trước khi chuyển hướng: số tiền thanh
//					toán, họ tên, email, sđt ....
					$_SESSION['info'] = [
						'price_total' => $price_total,
						'fullname' => $fullname,
						'email' => $email,
						'mobile' => $mobile
					];
					header('Location: index.php?controller=payment&action=online');
					exit();
				} else {
					header('Location: index.php?controller=payment&action=thank');
					exit();
				}
			}
		}

		// - Controller gọi View
		$this->page_title = 'Trang thanh toán';
		$this->content = $this->render('views/payments/index.php');
		require_once 'views/layouts/main.php';
	}

	public function online() {
		// - Controller gọi View
		$this->page_title = 'Trang thanh toán online';
		// Sử dụng ngân lượng để demo cho thanh toán online, tham khảo
		//libraries/nganluong
		$this->content = $this->render('libraries/nganluong/index.php');
		// ngân lượng dùng layout riêng, ko liên quan gì đến layout hệ thống của bạn
		echo $this->content;
	}

	public function thank() {
		// Controller gọi View
		$this->page_title = "Trang cảm ơn";
		$this->content = $this->render('views/payments/thank.php');
		require_once 'views/layouts/main.php';
	}
}
