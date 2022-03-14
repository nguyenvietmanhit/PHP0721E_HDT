//frontend/assets/js/script.js
$(document).ready(function() {
    $('.add-to-cart').click(function() {
        event.preventDefault();
        // Cần xóa cache trình duyệt để nhận code JS mới: Ctrl + Shift + R
        //    alert("Dsasd");
        // Lấy id sản phẩm hiện tại đang click
        var product_id = $(this).attr('data-id');
        // Gọi ajax để nhờ PHP xử lý
        $.ajax({
            url: 'index.php?controller=cart&action=add',
            method: 'GET',
            data: {
                product_id: product_id
            },
            success: function(data) {
                console.log(data)
                // Hiển thị ra message
                $('.ajax-message').html('Thêm sản phẩm vào giỏ thành công');
                $('.ajax-message').addClass('ajax-message-active');

                // Ẩn message sau 3 giây
                setTimeout(function() {
                    $('.ajax-message').removeClass('ajax-message-active');
                }, 3000)
                // Update số lượng sp trong giỏ:
                var cart_total = $('.cart-amount').text();
                cart_total++;
                $('.cart-amount').html(cart_total);
            }
        });
    })
})
