<?php
//controllers/Controller.php
// Controller cha:  chứa thông tin chung dùng cho controller con
class Controller {
    public $page_title; //tiêu đề trang
    public $error; //chứa lỗi
    public $content; //nội dung động của từng trang

    // Lấy nội dung 1 file view bất kỳ có kèm cơ chế truyền biến tường minh
    //vào file để sử dụng
    // $file_path: đường dẫn tới file muốn lấy nội dung
    // $variables: mảng dữ liệu truyền vào file
    public function render($file_path, $variables = []) {
        extract($variables);
        ob_start(); //Mở cơ chế dùng bộ nhớ đệm để lưu nội dung file
        require $file_path;
        $content = ob_get_clean(); // Kết thúc việc lưu nội dung file, trả về biến chứa
        //nội dung file
        return $content;
    }


}