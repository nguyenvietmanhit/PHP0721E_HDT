<?php
require_once 'models/User.php';
require_once 'helpers/Helper.php';

class LoginController
{
  //chứa nội dung view
  public $content;
  //chứa nội dung lỗi validate
  public $error;

  /**
   * @param $file string Đường dẫn tới file
   * @param array $variables array Danh sách các biến truyền vào file
   * @return false|string
   */
  public function render($file, $variables = [])
  {
    //Nhập các giá trị của mảng vào các biến có tên tương ứng chính là key của phần tử đó.
    //khi muốn sử dụng biến từ bên ngoài vào trong hàm
    extract($variables);
    //bắt đầu nhớ mọi nội dung kể từ khi khai báo, kiểu như lưu vào bộ nhớ tạm
    ob_start();
    //thông thường nếu ko có ob_start thì sẽ hiển thị 1 dòng echo lên màn hình
    //tuy nhiên do dùng ob_Start nên nội dung của nó đã đc lưu lại, chứ ko hiển thị ra màn hình nữa
    require_once $file;
    //lấy dữ liệu từ bộ nhớ tạm đã lưu khi gọi hàm ob_Start để xử lý, lấy xong rồi xóa luôn dữ liệu đó
    $render_view = ob_get_clean();

    return $render_view;
  }

  public function login()
  {
    //nếu user đã đăngn hập r thì ko cho truy cập lại trang login, mà chuenr hướng tới backend
    if (isset($_SESSION['user'])) {
      header('Location: index.php?controller=category&action=index');
      exit();
    }
    if (isset($_POST['submit'])) {
//            die;
      $username = $_POST['username'];
      //do password đang lưu trong CSDL sử dụng cơ chế mã hóa md5 nên cần phải thêm
//            hàm md5 cho password
      $password = $_POST['password'];
      //validate
      if (empty($username) || empty($password)) {
        $this->error = 'Username hoặc password không được để trống';
      }
      $user_model = new User();
      if (empty($this->error)) {
        $user = $user_model->getUser($username);
        if (empty($user)) {
          $this->error = 'Username ko tồn tại';
        } else {
          // + Dùng hàm sau để kiểm tra xem mật
          //khẩu mã hóa có đúng với mật khẩu từ
          //form gửi lên hay ko
          // Hàm này chỉ có tác dụng với các mật
          //khẩu đc mã hóa bằng hàm password_hash
          $is_same_password = password_verify($password, $user['password']);
          if ($is_same_password) {
            $_SESSION['success'] = 'Đăng nhập thành công';
            //tạo session user để xác định user nào đang login
            $_SESSION['user'] = $user;
            header("Location: index.php?controller=product");
            exit();
          } else {
            $this->error = 'Sai tài khoản hoặc mật khẩu';
          }
        }
      }
    }
    $this->content = $this->render('views/users/login.php');

    require_once 'views/layouts/main_login.php';
  }

  /**
   * Đăng ký tài khoản mới, mặc định tất cả các user đều có quyền admin
   */
  public function register()
  {

    if (isset($_POST['submit'])) {
      $user_model = new User();
      $username = $_POST['username'];
      $password = $_POST['password'];
      $password_confirm = $_POST['password_confirm'];
      $user = $user_model->getUserByUsername($username);
      //check validate
      if (empty($username) || empty($password) || empty($password_confirm)) {
        $this->error = 'Không được để trống các trường';
      } else if ($password != $password_confirm) {
        $this->error = 'Password nhập lại chưa đúng';
      } else if (!empty($user)) {
        $this->error = 'Username này đã tồn tại';
      }
      //xử lý lưu dữ liệu khi không có lỗi
      if (empty($this->error)) {
        $password_encrypt =
          password_hash($password, PASSWORD_BCRYPT);
        $user_model->username = $username;
        $user_model->password = $password_encrypt;
        $is_insert = $user_model->register();
        if ($is_insert) {
          $_SESSION['success'] = 'Đăng ký thành công';
          header('Location: index.php?controller=user&action=login');
          exit();
        }
      }
    }

    $this->content = $this->render('views/users/register.php');
    require_once 'views/layouts/main_login.php';
  }

  public function resetPassword() {
      // Xử lý submit form
      echo '<pre>';
      print_r($_POST);
      echo '</pre>';
      if (isset($_POST['submit'])) {
          $email = $_POST['username'];
          if (empty($this->error)) {
              // - Gửi link vào email của user, link này chính là url để reset mật khẩu
              // -> ko truyền trực tiếp giá trị email lên url, mà cần mã hóa chuỗi email này
              //vd: index.php?controller=login&action=checkLinkReset&hash=abc@gmail.com
              //vd: index.php?controller=login&action=checkLinkReset&hash=fdafdsfdsfds321321321
              // - Cần check xem email đã tồn tại với tài khoản nào chưa
              $user_model = new User();
              $user = $user_model->getUser($email);
              if (empty($user)) {
                  $this->error = 'Không tồn tại user nào gắn với email này';
              } else {
                  // - Tạo thêm 1 trường reset_password_token trong bảng users
                  // - Update chuỗi mã hóa email vào trường reset_password_token, demo mã hóa email = md5
                  $reset_password_token = md5($email); //
                  $is_update = $user_model->updateResetPasswordToken($user['id'], $reset_password_token);
                  if ($is_update) {
                      // - Gửi mail chứa link để reset password
                      $url_reset_password = "index.php?controller=login&action=checkLinkReset&hash=$reset_password_token";
                      // - Viết hàm gửi mail:
                      // + Tạo thư mục mvc_cart_frontend/backend/libraries/
                      // + Copy thư mục PHPMailer từ buổi trước vào thư mục libraries trên
                      // + Chú ý có 1 thư mục tên là helpers nằm ngay dưới backend
                      $subject = 'Thông báo thiết lập lại mật khẩu';
                      $to = $email;
                      $body = "Nhấn vào <a href='$url_reset_password'>đây</a> để thiết lập lại mật khẩu";
                      Helper::sendMail($subject, $to, $body);
//                      $_SESSION['success'] = 'Vui lòng kiểm tra email để thiết lập lại mật khẩu';
//                      header('Location: index.php?controller=login&action=resetPassword');
//                      exit();
                  }
              }
          }
      }

      // Gọi view để hiển thị
      $this->content = $this->render('views/users/reset_password.php');
      require_once 'views/layouts/main_login.php';
  }
}
