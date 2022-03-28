<?php
/**
 * note_upload_server.php
 * Hướng dẫn cách upload code website lên server thật
 * - Hiện tại chỉ code và chạy web trên local -> internet ko biết đến sự tồn tại web của bạn
 * - Các website thực tế cần chạy thật để tiếp cận user trên internet -> cần upload code trên local lên
 * 1 server nào đó
 * - Một số thuật ngữ: hosting/vps, domain
 * + hosting: là nơi lưu trũ website, tương đương với XAMPP: htdocs, phù hợp với các website nhỏ, ít lưu
 * lượng truy cập
 * + vps: dạng hosting nâng cao, cấu hình mạnh hơn hosting
 * + domain: tên miền, so sánh với xampp tên miền là localhost, là địa chỉ của website, có thể dùng địa
 * chỉ IP để truy cập trang web. VD xampp có địa chỉ ip trên local: 127.0.0.1
 * Ưu tiên dùng tên miền vì tính gợi nhớ hơn là dùng địa chỉ IP khó nhớ
 * - 1 website để chạy thật trên internet cần ít nhất 2 thông tin: hosting/vps và domain
 * - ITplus hỗ trợ cả 2 thông tin về hosting và domain
 * - Đẩy code lên server bằng cách nào ? FileZilla, PHPStorm (ưu tiên dùng hơn vì hỗ trợ nhiều hơn FileZilla)
 * - Link lấy thông tin về hosting và domain
 * - Các bước đẩy code lên server thật:
 * + Dùng IDE Code (PHPStorm), chỉ mở project muốn đẩy lên host
 */
