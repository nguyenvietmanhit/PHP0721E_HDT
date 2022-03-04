<?php
require_once 'controllers/Controller.php';

class UserController extends Controller {
    //index.php?controller=user&action=register
    public function register() {
        // - Controller gọi View
        $this->page_title = 'Đăng ký user';
        $this->content = $this->render('views/users/register.php');
        // require_once 'views/layouts/main.php';
        require_once 'views/layouts/main_user.php';
    }

    //index.php?controller=user&action=login
    public function login() {
        // - Controller gọi View
        $this->page_title = 'Đăng nhập';
        $this->content = $this->render('views/users/login.php');
        // require_once 'views/layouts/main.php';
        require_once 'views/layouts/main_user.php';
    }
}