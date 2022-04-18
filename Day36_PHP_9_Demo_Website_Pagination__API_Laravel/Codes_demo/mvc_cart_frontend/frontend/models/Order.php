<?php
require_once 'models/Model.php';
class Order extends Model {
	public function insertPayment($params) {
		// Viết truy vấn insert theo dạng tham số:
		$sql_insert = "INSERT INTO 
    orders(fullname,address,mobile,email,note,price_total,payment_status)
    VALUES(:fullname,:address,:mobile,:email,:note,:price_total,:payment_status)";
		// Tạo obj truy vấn:
		$obj_insert = $this->connection->prepare($sql_insert);
		// Tạo mảng truyền giá trị thật cho tham số của câu truy vấn
		$inserts = [
			':fullname' => $params['fullname'],
			':address' => $params['address'],
			':mobile' => $params['mobile'],
			':email' => $params['email'],
			':note' => $params['note'],
			':price_total' => $params['price_total'],
			':payment_status' => $params['payment_status'],
		];
		// Thực thi đối tượng truy vấn
		$is_insert = $obj_insert->execute($inserts);
		// Cần trả về id của bản ghi vừa mới insert, thay vì boolean như thông thường
		// Chỉ hoạt động sau lệnh execute
		$order_id = $this->connection->lastInsertId();
		return $order_id;
	}
}
