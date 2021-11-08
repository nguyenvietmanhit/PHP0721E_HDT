<?php
$name = 'Nguyen Viet Manh';
$email = 'nguyenvietmanhit@gmail.com';
$phone = '0987xxxxxx';
$message = 'This is a message';
?>
<form>
    <div class="row">
        <div class="col-1">
            Name *
            <br>
            <input type="text" id="name" placeholder="<?php echo $name; ?>">
        </div>
        <div class="col-2">
            Email *
            <br>
            <input type="text" id="email" placeholder="<?php echo $email; ?>">
        </div>
        <div class="col-3">
            Phone
            <br>
            <input type="text" id="phone" placeholder="<?php echo $phone; ?>">
        </div>
    </div>
    <br>
    Message *
    <br>
    <input type="text" id="message" placeholder="<?php echo $message; ?>">
    <br>
    <br>
    <button style="background: #FFC107" id="send">Send message</button>
    <br>
    * These fields are required.
    <style>
        body {
           background: #F8F9FA;
        }
        .row {
            display: flex;
        }
        .col-2 {
            margin-left: 10px;
        }
        .col-3 {
            margin-left: 10px;
        }
        #message {
            width: 532px;
            height: 100px;
        }
    </style>
</form>
<p style="color: blue" id="info-name"></p>
<p style="color: blue" id="info-email"></p>
<p style="color: blue" id="info-phone"></p>
<p style="color: blue" id="info-message"></p>

<script>
    var get_info = document.querySelector('#send')
    get_info.addEventListener('click', function () {
        event.preventDefault()
        var ten = ''
        var thu_dien_tu = ''
        var sdt = ''
        var tin_nhan = ''
        var obj_name = document.querySelector('#name')
        var name = obj_name.value
        var obj_email = document.querySelector('#email')
        var email = obj_email.value
        var obj_phone = document.querySelector('#phone')
        var phone = obj_phone.value
        var obj_message = document.querySelector('#message')
        var message = obj_message.value
        ten = "Name: " + name
        thu_dien_tu = "Email: " + email
        sdt = "Phone: " + phone
        tin_nhan = "Message: " + message
        document.querySelector('#info-name').innerHTML = ten
        document.querySelector('#info-email').innerHTML = thu_dien_tu
        document.querySelector('#info-phone').innerHTML = sdt
        document.querySelector('#info-message').innerHTML = tin_nhan
    })


</script>
