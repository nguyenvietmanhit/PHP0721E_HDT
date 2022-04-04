<?php
//helpers/PaginationTest.php
// Class chuyên dùng cho phân trang
// Url trang danh sách sp: index.php?controller=product&action=index
// + Phân trang: muốn hiển thị bao nhiêu bản ghi trên 1 trang? 2
// Cần tính toán tổng số trang sinh ra:
// giả sử có 10 sp, mỗi 1 trang hiển 2 sp => cần 10/2  = 5 trang
// giả sử có 11 sp -> cẩn bao nhiêu trang ? 6
// -> url phân trang dạng này: index.php?controller=product&action&page=1

class PaginationTest {
    // Tạo thuộc tính cần thiết để lưu cấu hình tổng quát cho phân trang
    public $params = [
        'total' => 0, //Tổng số bản ghi đang có, mặc định là 0
        'limit' => 0, //Số bản ghi hiển thị trên 1 trang
    ];

    // Phương thức khởi tạo cho class
    public function __construct($params) {
        // Gán mảng params tại nơi gọi class cho thuộc tính params của class đó
        $this->params = $params;
    }

    // Phương thức lấy tổng số trang đang có dựa vào thuộc tính params của class
    public function getTotalPage() {
        // giả sử total = 10, limit = 2 => 5 trang
        // total = 11, limit = 2 => 6 trang
        $total = $this->params['total'] / $this->params['limit'];
        // Làm tròn lên 1 đơn vị nếu ko chia hết
        $total = ceil($total);// 2.3 -> 3, 2 -> 2, 2.6 -> 3
        return $total;
    }

    // Phương thức lấy ra trang hiện tại từ url
    //index.php?controller=product&action&page=1
    public function getCurrentPage() {
        $page = 1;
        if (isset($_GET['page'])) {
            $page = $_GET['page'];
        }
        return $page;
    }

    // Phương thức trả về HTML của nút Prev/Trước
    // Áp dụng phân trang của Bootstrap để dựng cho nhanh (ul li)
    public function getPrevPage() {
        $prev_page = '';
        // Lấy trang hiện tại trước:
        $current_page = $this->getCurrentPage();
        // Chỉ hiển thị trang Prev nếu như ko phải trang đầu tiên
        if ($current_page > 1) {
            $url_prev = "index.php?controller=product&action=index&page=" . ($current_page - 1);
            $prev_page .= "<li>";
            $prev_page .= "<a href='$url_prev'>Prev</a>";
            $prev_page .= "</li>";
        }

        return $prev_page;
    }

    // Trả về HTML của nút Next/Tiếp
    public function getNextPage() {
        $next_page = '';
        // Chỉ hiển thị khi trang hiện tại ko phải là trang cuối cùng
        $current_page = $this->getCurrentPage();
        $total_page = $this->getTotalPage();
        if ($current_page < $total_page) {
            $url_next = "index.php?controller=product&action=index&page=" . ($current_page + 1);
            $next_page .= "<li>";
            $next_page .= "<a href='$url_next'>Next</a>";
            $next_page .= "</li>";
        }

        return $next_page;
    }

    // Hiển thị cấu trúc phân trang Bootstrap
    public function getPagination() {
        $data = '';
        // Nếu như chỉ có 1 trang nhất, thì ko hiển thị phân trang
        $total_page = $this->getTotalPage();
        if ($total_page == 1) {
            return '';
        }

        $data .= "<ul class='pagination'>";
        // Hiển thi link Prev ở đầu phân trang
        $data .= $this->getPrevPage();

        //Hiển thị các trang trong khoảng từ 1 đến tổng số trang
        $current_page = $this->getCurrentPage();
        for ($page = 1; $page <= $total_page; $page++) {
            $url_page = "index.php?controller=product&action=index&page=$page";
            $data .= "<li>";
            $data .= "<a href='$url_page'>Trang $page</a>";
            $data .= "</li>";
        }

        // Hiển thi link Next ở cuối phân trang
        $data .= $this->getNextPage();
        $data .= "</ul>";

        return $data;
    }


}
