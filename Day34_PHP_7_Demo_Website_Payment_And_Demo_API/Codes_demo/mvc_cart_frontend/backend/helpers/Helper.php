<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;
/**
 * Chứa các phương thức tĩnh để xử lý nghiệp vụ của riêng bạn (ko liên quan đến MVC)
 */
// - Nhúng thủ công 3 class sau theo đúng thứ tự:
require_once 'libraries/PHPMailer/src/PHPMailer.php';
require_once 'libraries/PHPMailer/src/SMTP.php';
require_once 'libraries/PHPMailer/src/Exception.php';

class Helper
{
    const STATUS_ACTIVE = 1;
    const STATUS_DISABLED = 0;
    const STATUS_ACTIVE_TEXT = 'Active';
    const STATUS_DISABLED_TEXT = 'Disabled';

    /**
     * @param $subject string Tiêu đề mail
     * @param $to string Email gửi tới
     * @param $body string Nội dung email
     */
    public static function sendMail($subject, $to, $body) {


//Load Composer's autoloader
// require 'vendor/autoload.php'; // do ko dùng composer nên đường dẫn này sẽ ko tồn tại

//Create an instance; passing `true` enables exceptions
        $mail = new PHPMailer(true);
// Nghỉ giải lao 10p: 20h05

        try {
            //Server settings
            // Cấu hình gửi mail có dấu:
            $mail->CharSet = 'UTF8';
            $mail->SMTPDebug = SMTP::DEBUG_OFF;                      //Enable verbose debug output
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
            $mail->addAddress($to);               //Name is optional
            //$mail->addReplyTo('info@example.com', 'Information');
            //$mail->addCC('cc@example.com');
            //$mail->addBCC('bcc@example.com');

            //Attachments
            // Copy 1 file ảnh bất kỳ cùng cấp với file hiện tại
            //$mail->addAttachment('itplus.jpg');         //Add attachments
            //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = $subject;
            $mail->Body = $body;
            $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

            $mail->send();
            echo 'Message has been sent';
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }

    /**
     * Get status text
     * @param int $status
     * @return string
     */
    public static function getStatusText($status = 0) {
        $status_text = '';
        switch ($status) {
            case self::STATUS_ACTIVE:
                $status_text = self::STATUS_ACTIVE_TEXT;
                break;
            case self::STATUS_DISABLED:
                $status_text = self::STATUS_DISABLED_TEXT;
                break;
        }
        return $status_text;
    }

  public static function getSlug($str) {
        // Tôi là mạnh -> toi-la-manh
    $str = trim(mb_strtolower($str));
    $str = preg_replace('/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/', 'a', $str);
    $str = preg_replace('/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/', 'e', $str);
    $str = preg_replace('/(ì|í|ị|ỉ|ĩ)/', 'i', $str);
    $str = preg_replace('/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/', 'o', $str);
    $str = preg_replace('/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/', 'u', $str);
    $str = preg_replace('/(ỳ|ý|ỵ|ỷ|ỹ)/', 'y', $str);
    $str = preg_replace('/(đ)/', 'd', $str);
    $str = preg_replace('/[^a-z0-9-\s]/', '', $str);
    $str = preg_replace('/([\s]+)/', '-', $str);
    return $str;
  }

}
