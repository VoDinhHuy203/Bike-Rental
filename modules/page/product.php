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
    <link rel="stylesheet" href="<?php echo _WEB_HOST_TEMPLATES; ?>/css/product.css" />
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

                    <div class="action">
                        <a href="?module=auth&action=login" class="btn btn-sign-up">Đăng xuất</a>
                    </div>
            </div>
        </div>
    </header>

    <div class="product">
        <img class="product-image" src="<?php echo _WEB_HOST_TEMPLATES; ?>/img/xedap-3.jpg" alt="Sản Phẩm" />
        <div class="product-info">
            <h1>Xe đạp đường phố (Road Bike)</h1>
            <p>Thích hợp cho việc đi lại trong thành phố hoặc trên các con đường trải nhựa.</p>
            <p>Có khung xe nhẹ, lốp xe mỏng và không có gai, thiết kế để đạt tốc độ cao.</p>
            <p>Thích hợp cho cả việc đi lại trong thành phố và trên các đoạn đường không quá gồ ghề.</p>
            
            <div class="rental-date">
                <label for="">Ngày thuê</label>
                <input class="quantity-input" type="date"/>
                <label for="">Ngày trả</label>
                <input class="quantity-input" type="date"/>
            </div>
            <p class="price">200.000 VND</p>
            <label for="">Chọn số lượng</label>
            <input class="quantity-input" type="number" min="1" value="1" />
            <button>Đặt xe</button>
        </div>
    </div>

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