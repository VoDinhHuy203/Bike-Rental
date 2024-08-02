<?php 

    $filterAll = filter();
    // echo '<br>';
    // print_r($filterAll);
    // echo '</br>';
    if(!empty($filterAll['id'])) {
        $userId = $filterAll['id'];
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
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,400;0,500;0,600;0,700;1,400&family=Sen:wght@700&display=swap"
        rel="stylesheet"
    />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    
    <!-- style css -->
    <link rel="stylesheet" href="<?php echo _WEB_HOST_TEMPLATES; ?>/css/header.css" />
    <link rel="stylesheet" href="<?php echo _WEB_HOST_TEMPLATES; ?>/css/bootstrap.min.css">
    <title>Document</title>
</head>
<body>

    


    <!-- <div class="login">
        <form action="" class="login-container">
            <div class="login-title">
                <h2>Đăng nhập</h2>
                <span><i class="fa-solid fa-xmark"></i></span>
            </div>
            <div class="login-inputs">
                <label for="username">Tên tài khoản</label>
                <input type="text" placeholder="Tên tài khoản" required>
                <label for="password">Mật khẩu</label>
                <input type="password" placeholder="Mật khẩu" required>
            </div>
            <button class="btn-login">Đăng nhập</button>
        </form>

    </div> -->
    <!-- header -->
    <header class="header fixed">
            <div class="main-content">
                <div class="body">
                    <!-- logo -->
                    <img
                        src="<?php echo _WEB_HOST_TEMPLATES; ?>/img/Logo-Thanh-Pho-Hoi-An.webp"
                        alt="HoiAn."
                        class="logo"
                    />
                    <!-- nav -->
                    <nav class="nav">
                        <ul>
                            <li>
                                <a class="tab-item active" href="?module=page&action=home&id=<?php echo $userId;?>"
                                    >Trang chủ</a
                                >
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

                                    <div class="dropdown text-end">
                                        <a href="#" class="d-block link-body-emphasis text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                            <img src="https://github.com/mdo.png" alt="mdo" width="32" height="32" class="rounded-circle">
                                        </a>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item text-15" href="?module=page&action=profile&id=<?php echo $userId; ?>">Thông tin cá nhân</a></li>
                                            <li><a class="dropdown-item text-15" href="?module=page&action=history&id=<?php echo $userId; ?>">Lịch sử đặt xe</a></li>
                                            <li><a class="dropdown-item text-15" href="#">Cài đặt</a></li>
                                            <li>
                                                <hr class="dropdown-divider">
                                            </li>
                                            <li><a class="dropdown-item text-15" href="?module=auth&action=logout">Đăng xuất</a></li>
                                        </ul>
                                    </div>
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
</body>
</html>