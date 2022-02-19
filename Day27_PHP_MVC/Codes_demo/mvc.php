<?php
/**
 * mvc.php
 * Mô hình MVC
 * - Viết tắt M - Model, V - View, C - Controller
 * - Tổ chức cấu trúc thư mục code MVC:
 * mvc
 *    /assets: chứa tất cả file liên quan đến frontend
 *           /css: chứa các file css
 *               /style.css
 *           /js: chứa các file js
 *              /script.js
 *           /images: chứa các ảnh tĩnh
 *    /configs: các cấu hình hệ thống như csdl ...
 *            /Database.php: class chứa cấu hình CSDL
 *    /controllers: chứa class controller - C
 *                /Controller.php: class controller cha
 *                /ProductController.php : controller quản lý product
 *    /models: chứa class model - M
 *                /Model.php: class model cha
 *                /Product.php: model quản lý product
 *    /views: chứa file view - V
 *          /layouts: chứa file bố cục chính
 *                  /main.php: file layout chính
 *          /products: chứa các file view của product
 *                   /index.php: danh sách sp
 *                   /create.php: thêm mới sp
 *                   /update.php: sửa sp
 *    .htaccess: file cấu hình
 *    index.php: file index gốc của ứng dụng, luôn luôn đặt tên là index.php, là
 *               nơi đầu tiên nhận request từ user, gọi controller tương ứng xử lý
 */