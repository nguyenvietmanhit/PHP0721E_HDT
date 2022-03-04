<?php
//views/users/register.php
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
        <label for="password_confirm">Nhập lại mật khẩu</label>
        <input type="password" name="password_confirm" id="password_confirm"
               class="form-control" />
    </div>
    <div class="form-group">
        <input type="submit" name="submit" value="Đăng ký" class="btn btn-success" />
        Đã có tài khoản, đăng nhập tại
        <a href="index.php?controller=user&action=login">đây</a>
    </div>
</form>
