<?php
/**
 * Giỏ hàng:
 *  Lưu gì trong giỏ hàng?
 * - Thông tin của sản phẩm: tên, giá, tên file ảnh, số lượng
 *  Dùng cơ chế gì để lưu?
 * - Session: -> ưu tiên
 * - Cookie:
 * - Database:
 * + Kết hợp Ajax khi Thêm sp vào giỏ hàng
 */
$_SESSION['cart'] = [
    3 => [
        'title' => 'SP 1',
        'price' => 1200,
        'avatar' => 'sp1.png',
        'quantity' => 4
    ],
    6 => [
        'title' => 'SP 6',
        'price' => 1200,
        'avatar' => 'sp6.png',
        'quantity' => 4
    ],
];