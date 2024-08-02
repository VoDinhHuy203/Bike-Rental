<?php

$filterAll = filter();
// echo '<br>';
// print_r($filterAll);
// echo '</br>';

if (!empty($filterAll['id'])) {
    $userId = $filterAll['id'];

    $historyOrder = getRaw("SELECT * FROM dondatxe WHERE id='$userId'");
    if (!empty($historyOrder)) {
        // tồn tại
        setFlashData('historyOrder', $historyOrder);
    } else {
        redirect('?module=page&action=home');
    }
}

$smg = getFlashData('smg');
$smg_type = getFlashData('smg_type');
$errors = getFlashData('errors');
$old = getFlashData('old');

$historyOrder = getFlashData('historyOrder');
if (!empty($historyOrder)) {
    $old = $historyOrder;
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

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <!-- style css -->
    <link rel="stylesheet" href="<?php echo _WEB_HOST_TEMPLATES; ?>/css/home.css" />
    <link rel="stylesheet" href="<?php echo _WEB_HOST_TEMPLATES; ?>/css/header.css" />
    <link rel="stylesheet" href="<?php echo _WEB_HOST_TEMPLATES; ?>/css/profile.css" />
    ]<link rel="stylesheet" href="<?php echo _WEB_HOST_TEMPLATES; ?>/css/history.css" />
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
        <p class="title">Lịch sử đặt xe</p>
        <section>
            <table>
                    <thead>
                        <tr>
                            <th>Mã đơn</th>
                            <th>Tên cửa hàng</th>
                            <th>Ngày nhận</th>
                            <th>Ngày trả</th>
                            <th>Trạng thái</th>
                            <th>Hình thức thanh toán</th>
                            <th style="width: 5%;">Xem chi tiết</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                    if (!empty($historyOrder)) :
                        foreach ($historyOrder as $item) :
                            // if($item['trangThai'] == 'Chưa duyệt') {
                            
                    ?>
                            <tr>
                                <td><?php echo $item['maDDX']; ?></td>
                                <td>Đình Huy Store</td>
                                <td><?php echo $item['ngayNhan']; ?></td>
                                <td><?php echo $item['ngayTra']; ?></td>
                                <td><?php echo $item['trangThai']; ?></td>
                                <td><?php echo $item['hinhThucThanhToan']; ?></td>
                                <td><i class="fa-solid fa-eye"></i></td>
                            </tr>
                        <?php
                            // }
                        endforeach;
                    else :

                        ?>
                        <tr>
                            <td colspan="7">
                                <div class="alert alert-danger text-center">Không có đơn hàng nào!</div>
                            </td>
                        </tr>
                    <?php

                    endif;
                    ?>

                    </tbody>
                </table>
        </section>
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