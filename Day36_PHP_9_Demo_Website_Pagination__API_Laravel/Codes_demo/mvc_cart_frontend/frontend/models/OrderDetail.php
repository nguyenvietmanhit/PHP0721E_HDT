<?php
require_once 'models/Model.php';
class OrderDetail extends Model {
	public function insertOrderDetail($params) {
		// Tạo câu truy vấn dạng tham số:
		$sql_insert = "INSERT INTO order_details(order_id,product_name,product_price,quantity)
VALUES(:order_id,:product_name,:product_price,:quantity)";
		// Cbi obj truy vấn:
		$obj_insert = $this->connection->prepare($sql_insert);
		// Tạo mảng
		$inserts = [
			':order_id' => $params['order_id'],
			':product_name' => $params['product_name'],
			':product_price' => $params['product_price'],
			':quantity' => $params['quantity'],
		];
		// Thực thi
		$is_insert = $obj_insert->execute($inserts);
		return $is_insert;
	}
}
