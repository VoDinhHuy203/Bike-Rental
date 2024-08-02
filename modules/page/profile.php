<?php

$filterAll = filter();
// echo '<br>';
// print_r($filterAll);
// echo '</br>';

if (!empty($filterAll['id'])) {
    $userId = $filterAll['id'];

    $userDetail = oneRaw("SELECT * FROM users WHERE id='$userId'");
    if (!empty($userDetail)) {
        // tồn tại
        setFlashData('userDetail', $userDetail);
    } else {
        redirect('?module=page&action=home');
    }
}

if (isPost()) {
    $filterAll = filter();
    // echo '<pre>';
    // print_r($_POST);
    // echo '</pre>';
    $errors = []; // Mảng chứa các lỗi

    // Validate fullname: bắt buộc phải nhập, min 5 ký tự
    if (empty($filterAll['tenND'])) {
        $errors['tenND']['required'] = 'Vui lòng nhập họ tên!';
    } else {
        if (strlen($filterAll['tenND']) < 5) {
            $errors['tenND']['min'] = 'Họ tên phải chứa ít nhất 5 kí tự!';
        }
    }

    // Email validate: bắt buộc phải nhập, đúng định dạng email, kiểm tra email tồn tại trong csdl

    // Validate số điện thoại: bắt buộc phải nhập, số điện thoại đúng định dạng
    if (empty($filterAll['sdt'])) {
        $errors['sdt']['required'] = 'Vui lòng nhập số điện thoại!';
    } else {
        if (!isPhone($filterAll['sdt'])) {
            $errors['sdt']['isPhone'] = 'Số điện thoại không hợp lệ!';
        }
    }

    if (empty($filterAll['email'])) {
        $errors['email']['required'] = 'Vui lòng nhập số điện thoại!';
    } else if (!isEmail($filterAll['email'])) {
        $errors['email']['isEmail'] = 'Email không hợp lệ!';
    }

    if (empty($filterAll['cccd'])) {
        $errors['cccd']['required'] = 'Vui lòng nhập căn cước công dân!';
    }

    if (empty($filterAll['diaChi'])) {
        $errors['diaChi']['required'] = 'Vui lòng nhập số điện thoại!';
    }


    if (empty($errors)) {
        $dataUpdate = [
            'tenND' => $filterAll['tenND'],
            'email' => $filterAll['email'],
            'sdt' => $filterAll['sdt'],
            'cccd' => $filterAll['cccd'],
            'diaChi' => $filterAll['diaChi']
        ];



        $condition = "id=$userId";
        $updateStatus = update('users', $dataUpdate, $condition);
        if ($updateStatus) {
            setFlashData('smg_type', 'success');
            setFlashData('smg', 'Cập nhật thông tin người dùng thành công');
        } else {
            setFlashData('smg_type', 'danger');
            setFlashData('smg', 'Hệ thông lỗi, vui lòng thử lại sau!');
        }
    } else {
        setFlashData('smg', 'Vui lòng kiểm tra lại dữ liệu!');
        setFlashData('smg_type', 'danger');
        setFlashData('errors', $errors);
        setFlashData('old', $filterAll);
    }
    redirect('?module=page&action=profile&id=' . $userId);
}

$smg = getFlashData('smg');
$smg_type = getFlashData('smg_type');
$errors = getFlashData('errors');
$old = getFlashData('old');

$userDetail = getFlashData('userDetail');
if (!empty($userDetail)) {
    $old = $userDetail;
    // echo '<br>';
    // print_r($old);
    // echo '</br>';
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- reset css -->
    <link rel="stylesheet" href="<?php echo _WEB_HOST_TEMPLATES; ?>/css/reset.css" />

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,400;0,500;0,600;0,700;1,400&family=Sen:wght@700&display=swap" rel="stylesheet" />

    <!-- style css -->
    <link rel="stylesheet" href="<?php echo _WEB_HOST_TEMPLATES; ?>/css/home.css" />
    <link rel="stylesheet" href="<?php echo _WEB_HOST_TEMPLATES; ?>/css/header.css" />
    <link rel="stylesheet" href="<?php echo _WEB_HOST_TEMPLATES; ?>/css/profile.css" />
    <title>Document</title>
</head>

<body>

    <header class="header fixed">
        <div class="main-content">
            <div class="body">
                <!-- logo -->
                <img src="<?php echo _WEB_HOST_TEMPLATES; ?>/img/Logo-Thanh-Pho-Hoi-An.webp" alt="HoiAn." class="logo" />
                <!-- nav -->
                <nav class="nav">
                    <ul>
                        <li>
                            <a class="tab-item active" href="?module=page&action=home&id=<?php echo $userId; ?>">Trang chủ</a>
                        </li>
                        <li>
                            <a class="tab-item" href="#!">Danh sách xe</a>
                        </li>
                        <li>
                            <a class="tab-item" href="#!">Liên hệ</a>
                        </li>
                        <li>
                            <a class="tab-item" href="#!">Về chúng tôi</a>
                        </li>
                    </ul>
                </nav>
                <!-- btn -->
                <?php

                if (!empty($userId)) {
                ?>

                    <div class="action">
                        <a href="?module=auth&action=login" class="btn btn-sign-up">Đăng xuất</a>
                    </div>
                <?php
                    $filterAll = '';
                } else {
                ?>
                    <div class="action">
                        <a href="?module=auth&action=login" class="btn btn-sign-up">Đăng nhập</a>
                    </div>
                <?php

                }
                ?>
            </div>
        </div>
    </header>
    <div class="form">
        <p class="title">THÔNG TIN CÁ NHÂN</p>
        <?php
        if (!empty($smg)) {
            getMsg($smg, $smg_type);
        }

        ?>
        <form action="" method="POST">
            <div class="flex-col">
                <label for="">Họ tên</label>
                <?php
                echo form_error('tenND', '<span class="error">', '</span>', $errors);
                ?>  
                <input type="text" name='tenND' placeholder="Họ tên" class="fullname" value="<?php echo old('tenND', $old); ?>">
                
            </div>

            <div class="flex-col">
                <label for="">Email</label>
                <?php
                echo form_error('email', '<span class="error">', '</span>', $errors);
                ?>  
                <input type="email" name='email' placeholder="Email" class="email" value="<?php echo old('email', $old); ?>">
            </div>

            <div class="flex-col">
                <label for="">Số điện thoại</label>
                <?php
                echo form_error('sdt', '<span class="error">', '</span>', $errors);
                ?>  
                <input type="phone" name='sdt' placeholder="Số điện thoại" class="sdt" value="<?php echo old('sdt', $old); ?>">
            </div>

            <div class="flex-col">
                <label for="">Căn cước công dân</label>
                <?php
                echo form_error('cccd', '<span class="error">', '</span>', $errors);
                ?>  
                <input type="text" name='cccd' placeholder="Căn cước công dân" class="cccd" value="<?php echo old('cccd', $old); ?>">
            </div>

            <div class="flex-col">
                <label for="">Địa chỉ</label>
                <?php
                echo form_error('diaChi', '<span class="error">', '</span>', $errors);
                ?>  
                <input type="text" name='diaChi' placeholder="Địa chỉ" class="diaChi" value="<?php echo old('diaChi', $old); ?>">
            </div>
            <input type="hidden" name="id" value="<?php echo $userId ?>">

            <button type="submit" class="btn">Lưu</button>
            <a href="?module=page&action=home&id=<?php echo $userId ?>" class="btn-back">Quay lại</a>
        </form>

    </div>

    <footer class="footer">
        <div class="main-content">
            <div class="row">
                <!-- col 1 -->
                <div class="column">
                    <img src="<?php echo _WEB_HOST_TEMPLATES; ?>/img/Logo-Thanh-Pho-Hoi-An.webp" alt="" class="logo" />
                    <p class="desc">
                        Need to help for your dream Career? trust us. With
                        Lesson, study becomes a lot easier with us.
                    </p>
                    <div class="socials">
                        <a href="">
                            <img src="<?php echo _WEB_HOST_TEMPLATES; ?>/img/f.svg" alt="twitter" class="icon" />
                        </a>
                        <a href="">
                            <img src="<?php echo _WEB_HOST_TEMPLATES; ?>/img/instagram.svg" alt="facebook" class="icon" />
                        </a>
                        <a href="">
                            <img src="<?php echo _WEB_HOST_TEMPLATES; ?>/img/linked_in.svg" alt="linked_in" class="icon" />
                        </a>
                    </div>
                </div>
                <div class="column">
                    <h3 class="title">Company</h3>
                    <ul class="list">
                        <li><a href="#!">About Us</a></li>
                        <li><a href="#!">Features</a></li>
                        <li><a href="#!">Our Pricing</a></li>
                        <li><a href="#!">Latest News</a></li>
                    </ul>
                </div>
                <div class="column">
                    <h3 class="title">Support</h3>
                    <ul class="list">
                        <li><a href="#!">FAQ’s</a></li>
                        <li><a href="#!">Terms & Conditions</a></li>
                        <li><a href="#!">Privacy Policy</a></li>
                        <li><a href="#!">Contact Us</a></li>
                    </ul>
                </div>
                <div class="column">
                    <h3 class="title">Address</h3>
                    <ul class="list">
                        <li>
                            <a href="#!"><strong>Location</strong>: 27 Division St,
                                New York, NY 10002, USA</a>
                        </li>
                        <li>
                            <a href="#!"><strong>Email</strong>: email@gmail.com</a>
                        </li>
                        <li>
                            <a href="#!"><strong>Phone</strong>: + 000 1234 567
                                890</a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="copyright">
                <p>Copyright ©2022 webdesign.gdn All rights reserved</p>
            </div>
        </div>
    </footer>
</body>

</html>