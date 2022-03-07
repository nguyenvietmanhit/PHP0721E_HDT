<?php
/**
 * step_build_web_from_scratch
 * - Xác định chủ đề web:
 * - Chuẩn bị giao diện tĩnh cho cả frontend và backend
 * - Phân tích CSDL từ giao diện tĩnh: đi qua từng file .html, đi từ trên xuống
 * dưới để phân tích:
 * + Các thông tin mà thay đổi thường xuyên thì cần lưu vào CSDL -> quản trị
 * thông tin này bằng giao diện backend thông qua CRUD
 * - Các thông tin ít khi thay đổi nên để fix cứng trong code -> giảm bớt
 * thời gian truy vấn trên trang
 * Demo 1 số bảng:
 * + Bảng menus: quản lý thông tin menu:
 * id
 * name: tên menu
 * link: tên link gắn với từng menu
 * status
 * created_at
 * updated_at
 *- Bảng products: quản lý thông tin sản phẩm:
 * id
 * avatar: tên file ảnh
 * title: tên sp
 * price: giá sp
 * summary: mô tả ngắn
 * content: mô tả chi tiết
 * seo_title: seo tiêu đề sp
 * seo_description: seo mô tả sp
 * seo_keywords: seo các từ khóa cho sp
 * status
 * created_at
 * updated_at
 * + Tạo cấu trúc file/thư mục MVC
 * + Code khung MVC trước
 */