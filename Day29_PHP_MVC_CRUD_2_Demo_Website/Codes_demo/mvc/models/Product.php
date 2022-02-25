<?php
//models/Product.php
require_once 'models/Model.php';

class Product extends Model {

    public function insertData($arrs) {
//    $arrs = [
//        'name' => 'Tivi',
//        'price' => 1000
//    ];
      // Viết truy vấn dạng tham số
      $sql_insert = "INSERT INTO products(name,price) VALUES(:name,:price)";
      // Cbi obj truy vấn:
      $obj_insert =  $this->connection->prepare($sql_insert);
      // [Optional] Tạo mảng truyền giá trị thật cho tham số:
      $inserts = [
          ':name' => $arrs['name'],
          ':price' => $arrs['price']
      ];
      // Thực thi -> boolean
      return $obj_insert->execute($inserts);
    }
}