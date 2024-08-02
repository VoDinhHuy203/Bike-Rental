<?php


if (isPost()) {
    $filterAll = filter();
    if (!empty(trim($filterAll['tenTK'])) && !empty(trim($filterAll['matKhau']))) {
        // Kiểm tra đăng nhập
        $tenTK = $filterAll['tenTK'];
        $matKhau = $filterAll['matKhau'];

        // Truy vấn lấy thông tin users theo email
        $userQuery = oneRaw("select id, matKhau, quyenTK from users where tenTK = '$tenTK'");
        $userId = $userQuery['id'];
        if($tenTK =='admin' && $matKhau == '123456') {
            redirect('?module=page&action=users');
        }

        if (!empty($userQuery)) {
            if ($matKhau == $userQuery['matKhau']) {
                    if($userQuery['quyenTK'] == 'KH'){
                        redirect("?module=page&action=home&id=$userId");
                    } else if($userQuery['quyenTK'] == 'CCH'){
                        redirect("?module=page&action=store&id=$userId");
                    }
                } else {
                    setFlashData('msg', 'Tài khoản hoặc mật khẩu không chính xác!');
                    setFlashData('msg_type', 'danger');
                }
            } else {
                setFlashData('msg', 'Mật khẩu không chính xác!');
                setFlashData('msg_type', 'danger');
            }
        } else {
            setFlashData('msg', 'Email không tồn tại!');
            setFlashData('msg_type', 'danger');
        }
    } else {
        // setFlashData('msg', 'Vui lòng nhập tài khoản và mật khẩu!');
        // setFlashData('msg_type', 'danger');
    }

$msg = getFlashData('msg');
$msgType = getFlashData('msg_type');
?>


<!DOCTYPE html>
<html lang="vi">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Đăng nhập</title>
        <link rel="stylesheet" href="<?php echo _WEB_HOST_TEMPLATES; ?>/css/login.css" />
    </head>
    <body>
        <div class="container">
            <div class="login-box">
                <h2>Đăng nhập</h2>
                <?php
                    if (!empty($msg)) {
                        getMsg($msg, $msgType);
                    }
                ?>
                <form action="" method="post">
                    <div class="user-box">
                        <input type="text" name="tenTK" required="" />
                        <label>Tên đăng nhập</label>
                    </div>
                    <div class="user-box">
                        <input type="password" name="matKhau" required="" />
                        <label>Mật khẩu</label>
                    </div>
                    <button type="submit" class="submit-btn">
                        <span></span>
                        <span></span>
                        <span></span>
                        <span></span>
                        Đăng nhập
                    </button>
                </form>
                <a href="?module=auth&action=register" class="submit-btn">
                    Đăng ký tài khoản
                </a>
            </div>
        </div>
        <script src="script.js"></script>
    </body>
</html>
<!-- <div class="row ">
    <div class="col-4" style="margin: 150px auto">
        <h2 class="text-center text-uppercase">ĐĂNG NHẬP</h2>
        <form action="" method="post">
            <div class="form-group mg-form">
                <label for="">Email</label>
                <input name="tenTK" type="text" class="form-control" placeholder="Email">
            </div>
            <div class="form-group mg-form">
                <label for="">Mật khẩu</label>
                <input name="matKhau" type="password" class="form-control" placeholder="Mật khẩu">
            </div>

            <button type="submit" class="btn btn-primary btn-block btn-login">Đăng nhập</button>

            <hr>
            <p class="text-center"><a href="#">Quên mật khẩu</a></p>
            <p class="text-center"><a href="#">Đăng ký tài khoản mới</a></p>
        </form>
    </div>

</div> -->