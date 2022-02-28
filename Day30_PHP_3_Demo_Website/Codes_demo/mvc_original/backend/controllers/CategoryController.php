<?php
require_once 'controllers/Controller.php';
class CategoryController extends Controller {
    //index.php?controller=category&action=create
    public function create() {
        // - Controller gọi view để hiển thị
        $this->page_title = 'Form thêm mới danh mục';
        $this->content = $this->render('views/categories/create.php');
        require_once 'views/layouts/main.php';
    }
}