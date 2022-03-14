<?php
/**
 * note_send_mail.php
 * Gửi mail trong PHP
 * - Trong thực tế có rất nhiều chức năng cần gửi mail như mail xác nhận đăng ký
 * tài khoản thành công, mail xác nhận đơn hàng ...
 */
// Gửi mail bằng hàm có sẵn của PHP
//$is_send = mail('nguyenvietmanhit@gmail.com', 'Tiêu đề test', 'Body mail test');
//var_dump($is_send);
// -> chưa gửi đc mail, cần phải cấu hình thì mới gửi đc
// -> nên sử dụng các thư viện có sẵn để gửi mail: PHPMailer, download về và sửa code

// /note_send_mail.php
// /PHPMailer
// - Code: copy từ code mẫu trên document của thư viện PHPMailer


//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
// require 'vendor/autoload.php'; // do ko dùng composer nên đường dẫn này sẽ ko tồn tại
// - Nhúng thủ công 3 class sau theo đúng thứ tự:
require_once 'PHPMailer/src/PHPMailer.php';
require_once 'PHPMailer/src/SMTP.php';
require_once 'PHPMailer/src/Exception.php';


//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host = 'smtp.gmail.com';                     //Set the SMTP server to send through, dùng host của Gmail
    $mail->SMTPAuth = true;                                   //Enable SMTP authentication
    $mail->Username = 'nguyenvietmanhit@gmail.com';                     //SMTP username = tài khoản mail cá nhân của bạn
    $mail->Password = 'cccchytzjjsybgif';                               //SMTP password, ko phải là mật khẩu đăng nhập của Gmail,
    // phải dùng mật khẩu ứng dụng -> tạo mật khẩu ứng dụng

    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('nguyenvietmanhit@gmail.com', 'From manhnv');
    //$mail->addAddress('joe@example.net', 'Joe User');     //Add a recipient
    $mail->addAddress('nguyenvietmanhit@gmail.com');               //Name is optional
    $mail->addReplyTo('info@example.com', 'Information');
    $mail->addCC('cc@example.com');
    $mail->addBCC('bcc@example.com');

    //Attachments
    $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Here is the subject';
    $mail->Body = 'This is the HTML message body <b>in bold!</b>';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
