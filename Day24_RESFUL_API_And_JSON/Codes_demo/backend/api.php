<?php
/**
 * backend/api.php
 * - Code API theo cơ chế RESTFUL API sẽ như sau:
 * + Tạo các url sau cho ứng dụng CRUD sản phẩm với RESTFUL API:
 * api.php theo method = GET -> API lấy danh sách sp
 * api.php theo method = POST -> API thêm mới sp
 * api.php theo method = PUT -> API cập nhật sp
 * api.php theo method = DELETE -> API xóa sản phẩm
 */
require_once 'connection.php';
//Set kiểu dữ liệu từ api gửi lên là json
header('Content-Type: application/json');

// Đọc dữ liệu từ frontend/client gửi lên
$data = file_get_contents("php://input");
//var_dump($data);

// Lấy phương thức gửi lên từ client: GET POST PUT DELETE
$method = $_SERVER['REQUEST_METHOD'];

// Switch case method để biết đc client muốn gọi api tương ứng với chức năng CRUD nào:
switch ($method) {
  case 'GET':
    // Chức năng liệt kê sản phẩm
    // + Tương tác với CSDL sử dụng SELECT
    // Viết truy vấn:
    $sql_select_all = "SELECT * FROM products";
    // Thực thi truy vấn, với SELECT trả về obj trung gian
    $obj_select_all = mysqli_query($connection, $sql_select_all);
    // Trả về mảng kết hợp 2 chiều:
    $products = mysqli_fetch_all($obj_select_all, MYSQLI_ASSOC);
    // Ko trả về kiểu dữ liệu của PHP, cần chuyển về kiểu JSON để trả về
    $json = json_encode($products); //chuyển kiểu dữ liệu từ PHP -> JSON
    // Set mã response trả về cho client
    http_response_code(200); // 200 = gọi api thành công
    // Trả dữ liệu json về cho client
    echo $json;
    // Nghỉ giải lao 10p -> 20h15
    break;

  case 'POST':
    // API thêm mới luôn luôn có method = POST
    // - Chuyển kiểu JSON về kiểu dữ liệu PHP có thể hiểu đc, mặc định trả về 1 đối tượng của PHP
    $data = json_decode($data);
    // - Ép về kiểu mảng:
    $data = (array) $data;
    // - Validate dữ liệu gửi từ client
    // - Tạo biến trung gian
    $name = $data['name'];
    $price = $data['price'];
    $description = $data['description'];
    // - Tương tác với CSDL:
    // + Viết truy vấn INSERT
    $sql_insert = "INSERT INTO products(name, price, description) VALUES('$name', $price, '$description')";
    // + Thực thi:
    $is_insert = mysqli_query($connection, $sql_insert);
    if ($is_insert) {
      $response = [
        'message' => 'Thêm sp thành công',
      ];
      http_response_code(201); //mã response thêm mới thành công
    } else {
      $response = [
        'message' => 'Thêm sp thất bại'
      ];
      http_response_code(500); // Lỗi code
    }
    // Trả response về cho client dưới dạng JSON
    echo json_encode($response);
    break;

  case 'PUT':
//    {
//      "id": "7",
//    "name": "Name edit",
//    "price": 12345,
//    "description": "Des edit"
//    }
    break;

  case 'DELETE':

    // - Giải mã chuỗi JSON client gửi lên thành kiểu dữ liệu obj của PHP
    $data = json_decode($data);
    // - Ép về kiểu array
    $data = (array) $data;
    $id = $data['id'];
    // + Tương tác với CSDL để xóa bản ghi theo id
    $sql_delete = "DELETE FROM products WHERE id = $id";
    $is_delete = mysqli_query($connection, $sql_delete);
    // + Response trả về cho client
    if ($is_delete) {
      $response = [
        'message' => 'Xóa thành công'
      ];
      echo json_encode($response);
      http_response_code(200);
    } else {
      $response = [
        'message' => 'Xóa thất bại'
      ];
      echo json_encode($response);
      http_response_code(500);
    }
    break;
}
