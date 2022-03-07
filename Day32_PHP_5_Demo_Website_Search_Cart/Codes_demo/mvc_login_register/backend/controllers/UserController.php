<?php
require_once 'controllers/Controller.php';
require_once 'models/User.php';

class UserController extends Controller {
    public function logout() {
        unset($_SESSION['user']);
        $_SESSION['success'] = 'Logout thành công';
        header('Location: index.php?controller=user&action=login');
        exit();
    }


    //index.php?controller=user&action=register
    public function register() {
        // Xử lý submit form:
        echo '<pre>';
        print_r($_POST);
        echo '</pre>';
        if (isset($_POST['submit'])) {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $password_confirm = $_POST['password_confirm'];
            // Validate:
            // + Phải nhập hết
            // + Mật khẩu phải trùng Nhập lại mật khẩu
            // + Mật khẩu phải chứa ít nhất 8 ký tự, ít nhất 1 ký tự hoa thường và 1 ký tự số
            // + Username phải là duy nhất: có thể thêm thuộc tính unique cho trường
            // trong bảng -> nhược điểm show lỗi liên quan đến DB -> bảo mật
            // -> xử lý cả bằng code + can thiệp db
            $user_model = new User();
            $user = $user_model->getByUsername($username);
            echo '<pre>';
            print_r($user);
            echo '</pre>';

            $regex_strong_password = '^\S*(?=\S{8,})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])\S*$^';
            if (empty($username) || empty($password) || empty($password_confirm)) {
                $this->error = 'Ko đc để trống';
            } elseif ($password != $password_confirm) {
                $this->error = 'Mật khẩu phải trùng nhau';
            } elseif (!preg_match($regex_strong_password, $password)) {
                $this->error = 'Mật khẩu ko đủ độ mạnh';
            } elseif (!empty($user)) {
                $this->error = 'Username đã tồn tại, hãy chọn username khác';
            }
            // Xử lý logic chỉ khi ko có lỗi:
            if (empty($this->error)) {
                // Luôn luôn mã hóa mật khẩu trước khi lưu vào CSDL
                // -> cơ chế mã hóa: md5, aes, bcrypt ...
                $arrs = [
                    'username' => $username,
                    'password' => password_hash($password, PASSWORD_BCRYPT)
                ];
                $is_register = $user_model->registerUser($arrs);
                if ($is_register) {
                    $_SESSION['success'] = 'Đăng ký thành công';
                    header('Location: index.php?controller=user&action=login');
                    exit();
                }
            }

        }

        // - Controller gọi View
        $this->page_title = 'Đăng ký user';
        $this->content = $this->render('views/users/register.php');
        // require_once 'views/layouts/main.php';
        require_once 'views/layouts/main_user.php';
    }

    //index.php?controller=user&action=login
    public function login() {
        // Xử lý submit
        echo '<pre>';
        print_r($_POST);
        echo '</pre>';
        if (isset($_POST['submit'])) {
            $username = $_POST['username'];
            $password = $_POST['password'];
            // Validate
            if (empty($username) || empty($password)) {
                $this->error = 'Ko đc để trống';
            }
            // Xử lý logic
            if (empty($this->error)) {
                // Cơ chế mã hóa của password_hash: mã hóa ra nhiều chuỗi khác nhau
                //từ cùng 1 chuỗi ban đầu
                $user_model = new User();
                // Tìm trong bảng user dựa theo username
                $user = $user_model->getByUsername($username);
                echo '<pre>';
                print_r($user);
                echo '</pre>';
                if (empty($user)) {
                    $this->error = 'Username ko tồn tại';
                } else {
                    $password_hash = $user['password']; //chuỗi mật khẩu mã hóa
                    // So khớp mật khẩu nhập từ form login với mật khẩu đã mã hóa
                    // của user
                    if (!password_verify($password, $password_hash)) {
                        $this->error = 'Sai mật khẩu';
                    } else {
                        // Đăng nhập thành công
                        // Cần tạo 1 session để lưu lại thông tin user vừa login thành công
                        $_SESSION['user'] = $user;
                        $_SESSION['success'] = 'Đăng nhập thành công';
                        header('Location: index.php?controller=product&action=index');
                        exit();
                    }
                }
            }
        }
        // - Controller gọi View
        $this->page_title = 'Đăng nhập';
        $this->content = $this->render('views/users/login.php');
        // require_once 'views/layouts/main.php';
        require_once 'views/layouts/main_user.php';
    }
}