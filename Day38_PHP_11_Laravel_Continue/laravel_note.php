<?php
/**
 * Laravel
 * - Là 1 framework thông dụng nhất của PHP
 * - Laravel đc xây dựng sẵn dựa trên mô hình MVC và OOP
 * - Laravel cung cấp bộ khung MVC sẵn, chỉ việc phát triển chức năng
 * - Ngoài Laravel còn rất nhiều FW khác: CI, Zend, Cake, Yii ....
 * - Cài Laravel ko đơn giản là copy paste code Laravel từ 1 nơi có sẵn nào đó, mà phải dùng tool để cài,
 * là Composer
 * - Composer là 1 công cụ quản lý các thư viện 1 cách tự động, do Laravel phải cần rất nhiều thư viện cài cùng nó
 * thì mới chạy đc. Composer của PHP tương đương với NPM của Node JS
 * - Cách quản lý thư viện 1 cách tự động của Composer,
 * sẽ dựa vào 1 file composer.json ở ngay thư mục gốc của Laravel, mỗi khi thư viện có cập nhật nó sẽ tự động
 * đi tìm bản cập nhật đó và update lại cho Laravel -> Laravel luôn có các thư viện đc update mới nhất
 * Một số lệnh có sẵn của Composer:
 * composer install
 * composer update
 * composer require
 * - Laravel phụ thuộc vào phiên bản PHP đang cài trên máy để cài phiên bản Laravel phù hợp
 * 1 / Tổng quan về cấu trúc file/thư mục Laravel
 *
 * 2 / Code CRUD sản phẩm với Laravel
 *  - Tạo CSDL: php0721e_laravel
 *  CREATE DATABASE IF NOT EXISTS php0721e_laravel CHARACTER SET utf8 COLLATE utf8_general_ci;
 *  - Tạo bảng: products (id, name, price, avatar, created_at, updated_at), tạo bảng bằng cơ chế migrate của Laravel
 * -> sinh ra các file .php, chạy lệnh artisan của php để tạo ra bảng 1 cách tự động
 *  Tạo file migrate bằng câu lệnh artisan, cần cd vào thư mục laravel_demo:
    php artisan make:migration create_table_products --create=products
 *  Cấu hình CSDL trước r mới chạy đc migrate: cấu hình trong file .env
 *  Chay lệnh sau để migrate các file: php artisan migrate
 * - Bắt đầu code CRUD cho sản phẩm:
 *
 *
 *
 */
