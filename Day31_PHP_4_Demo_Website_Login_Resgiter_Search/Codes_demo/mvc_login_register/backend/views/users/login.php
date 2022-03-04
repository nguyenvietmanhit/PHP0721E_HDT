<?php
//views/users/login.php
?>
<form class="container" action="" method="post">
    <div class="form-group">
        <label for="username">Username</label>
        <input type="text" name="username" id="username" class="form-control" />
    </div>
    <div class="form-group">
        <label for="password">Mật khẩu</label>
        <input type="password" name="password" id="password" class="form-control" />
    </div>
    <div class="form-group">
        <input type="submit" name="submit" value="Đăng nhập" class="btn btn-success" />
        Chưa có tài khoản, đăng ký tại
        <a href="index.php?controller=user&action=register">đây</a>
    </div>
</form>
