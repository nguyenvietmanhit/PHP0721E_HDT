<?php
//models/Product.php
require_once 'models/Model.php';

class Product extends Model {

    public function deleteData($id) {
        $sql_delete = 'DELETE FROM products WHERE id=:id';
        $obj_delete = $this->connection->prepare($sql_delete);
        $deletes = [
            ':id' => $id
        ];
        return $obj_delete->execute($deletes);
    }

    public function updateData($data) {
        // Viết truy vấn dạng tham số:
        $sql_update = 'UPDATE products SET name=:name, price=:price WHERE id=:id';
        // Cbi obj truy vấn:
        $obj_update = $this->connection->prepare($sql_update);
        // Tạo mảng:
        $updates = [
            ':name' => $data['name'],
            ':price' => $data['price'],
            ':id' => $data['id']
        ];
        // Thực thi:
        return $obj_update->execute($updates);
    }

    public function getOne($id) {
        // Viết truy vấn dạng tham số:
        $sql_select_one = 'SELECT * FROM products WHERE id = :id';
        // Cbi obj truy vấn:
        $obj_select_one = $this->connection->prepare($sql_select_one);
        // Tạo mảng:
        $selects = [
          ':id' => $id
        ];
        // Thực thi
        $obj_select_one->execute($selects);
        // Trả về mảng data:
        return $obj_select_one->fetch(PDO::FETCH_ASSOC);
    }

    public function getData() {
        // Viết truy vấn dạng tham số
        $sql_select_all = 'SELECT * FROM products ORDER BY created_at DESC';
        // Cbi obj truy vấn:
        $obj_select_all = $this->connection->prepare($sql_select_all);
        // [Optional] Bỏ qua
        // Thực thi
        $obj_select_all->execute();
        // Trả về mảng data:
        $products = $obj_select_all->fetchAll(PDO::FETCH_ASSOC);
        return $products;
    }

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