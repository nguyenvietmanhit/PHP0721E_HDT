<?php
//oop_basic.php
// Các thuật ngữ trong lập trình hướng đối tượng
// 1/ Class: lớp, là 1 khuôn mẫu cho các đối tượng sinh ra từ nó
// 1 lớp: 1 bản thiết kế trên giấy ngôi nhà
// -> sinh ra nhiều object từ class này: xây nhà Linh, xây nhà Tuấn -> mọi ngôi nhà đều dựa trên bản
//thiết kế -> mọi đôí tượng sinh ra từ 1 class đều dựa trên khung của class đó
class House {
  // Khai báo thuộc tính/phương thức
  public $number_floor; //số tầng của ngôi nhà
}

// 2/ Object: là đối tượng chỉ đc sinh ra từ class, có thông tin cụ thể của chính nó nhưng luôn
//luôn phải dựa từ khung của class
// Object cụ thể hóa - truy cập thuộc tính/phương thức - các thông tin từ class
$house_a = new House();
// Truy cập thuộc tính từ class, gán giá trị cụ thể cho obj này
$house_a->number_floor = 5;

$house_b = new House();
$house_b->number_floor = 10;
// 3 / Thuộc tính của class (Member variable)
// Mô tả các thông tin cho class đó, class có đặc điểm gì
class MemberVariable { //convention: tên class viết hoa ký tự đầu của từng từ
  // Khai báo thuộc tính cho class, thuộc tính bên trong class <=> biến thông thường
  public $name;
  public $age;
  public $created_at;
}
// Dùng obj sinh ra để truy cập thuộc tính public của class
$member1 = new MemberVariable();
$member1->name = 'manhnv';
$member1->age = 31;
$member1->created_at = '16/12/2021';

$member2 = new MemberVariable();
$member2->name = 'manhnv2';
$member2->age = 22;
$member2->created_at = '22/12/2022';
// 4 / Phương thức của class (Member function)
// - Là các hành vi của class -> class có thể làm đc gì -> là các hàm của PHP thuần
class MemberFunction {
  // Thuộc tính
  public $name;

  // Phương thức
  public function getName($name) {
    echo "Tên của bạn: $name";
  }

  public function show() {
    echo "Show";
  }
}
$function1 = new MemberFunction();
$function1->getName('manhnv'); //Tên của bạn: manhnv
$function1->show(); //Show

$function2 = new MemberFunction();
$function2->getName('manhnv2'); //Tên của bạn: manhnv2
$function2->show(); //Show

// 5 - Phương thức khởi tạo của class (Constructor function)
// + Là 1 phương thức đc tự động chạy sau khi khởi tạo đối tượng với từ khóa new
// + Phải là public
class ConstructorClass1 {
  // Phương thức khởi tạo ko có tham số
  public function __construct() {
    echo "Constructor chạy tự động ngay sau khi khởi tạo obj";
  }

  public $name;

  public function showInfo() {
    echo "showInfo";
  }
}
$construct1 = new ConstructorClass1();

class ConstructorClass2 {
  //Phương thức khởi tạo có tham số
  public function __construct($name, $age) {
    echo "Name: $name, Age: $age";
  }
}
// Nếu class có phương thức khởi tạo có tham số, thì bắt buộc phải truyền vào giá trị
//tương ứng khi khởi tạo đối tượng
$construct2 = new ConstructorClass2('manhnv', 31);
// Name: manhnv, Age: 31

// 6 - Từ khóa this
