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
 * + Dùng PHPStorm để cấu hình thông tin kết nối tới server đã được cung cấp:
 * Menu -> Tools -> Deployment -> Configuration
 * + Nhấn + để tạo 1 cấu hình mới
 * + Nhập thông tin kết nối server đã đc cung cấp tại tab Connection
 * + TAb mapping, nhập / vào Deployment path
 * + Bật chế dộ xem trực tiếp server: Menu -> Tools -> Deployments -> Browse Remote Host (chỉ
 * thực hiện sau khi kết nối thành công)
 * + Mỗi 1 server quy định bắt buộc phải đẩy code vào thư mục nào, cụ thể với ITPlus
 * bắt buộc phải upload code vào thư mục public_html
 * + Sửa lại cấu hình để khi kết nối tới server truy cập thẳng vào thư mục public_html này
 * luôn, tại Root path nhập /public_html
 * http://php0721e-1.itpsoft.com.vn/index.html
 * + Đẩy code lên server:
 * Trên local, chuột phải vào 2 thư mục cần đẩy là backend và frontend
 * -> Deployment -> Upload to ...
 * + Test thử domain:
 * Trên local: http://localhost/
 * TRên server: http://<domain-của-bạn>
 * + Cấu hình DB trên server:
 * Truy cập PHPMyadmin trên server: http://<domain-của-bạn>/phpmyadmin
 * - Trên local, export file CSDL, import lên server thông qua phpmyadmin
 * - Chỉnh sửa cấu hình DB trên server dựa vào các thông tin DB đc cung cấp
 * - Nghỉ giải lao 15p -> 20h45
 */
