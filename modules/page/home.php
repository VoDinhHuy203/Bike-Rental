<?php
    $title = [
        'pageTitle' => 'Hội An'
    ];
    layouts('header', $title);
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />

        <!-- reset css -->
        <link rel="stylesheet" href="<?php echo _WEB_HOST_TEMPLATES; ?>/css/reset.css" />

        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
        <link
            href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,400;0,500;0,600;0,700;1,400&family=Sen:wght@700&display=swap"
            rel="stylesheet"
        />
        <!-- style css -->
        <link rel="stylesheet" href="<?php echo _WEB_HOST_TEMPLATES; ?>/css/home.css" />
        <title>Hoi An</title>
    </head>
    <body>
        <!-- header -->
        

        <!-- main content -->
        <div class="main">
            <div class="banner">
                <div class="main-content">
                    <img
                        src="<?php echo _WEB_HOST_TEMPLATES; ?>/img/Banner_S8-S9.jpg"
                        alt=""
                        class="banner-img"
                    />
                    <p class="desc">ĐỒNG HÀNG CÙNG BẠN</p>
                </div>
            </div>

            <div class="product">
                <div class="main-content">
                    <p class="desc-tip">DANH MỤC XE ƯA THÍCH</p>
                    <div class="bike-list">
                        <div class="bike-item">
                            <img
                                src="<?php echo _WEB_HOST_TEMPLATES; ?>/img/xedap-2.jpg"
                                alt=""
                                class="bike-img"
                            />
                            <div class="info">
                                <p class="name">Xe đạp leo núi</p>
                                <p class="desc line-clamp line-2 break-all">Phù hợp cho địa hình gồ ghề...</p>
                                <p class="price">100.000đ/ngày</p>
                                <a href="?module=page&action=product" class="btn">Đặt xe</a>
                            </div>
                        </div>

                        <div class="bike-item">
                            <img
                                src="<?php echo _WEB_HOST_TEMPLATES; ?>/img/xedap-3.jpg"
                                alt=""
                                class="bike-img"
                            />
                            <div class="info">
                                <p class="name">Xe đạp Cruiser</p>
                                <p class="desc line-clamp line-2 break-all">Thoải mái cho việc đi lại ...</p>
                                <p class="price">200.000đ/ngày</p>
                                <a href="?module=page&action=product" class="btn">Đặt xe</a>
                            </div>
                        </div>
                        <div class="bike-item">
                            <img
                                src="<?php echo _WEB_HOST_TEMPLATES; ?>/img/xedap-4.jpg"
                                alt=""
                                class="bike-img"
                            />
                            <div class="info">
                                <p class="name">Xe đạp lai</p>
                                <p class="desc line-clamp line-2 break-all" >Kết hợp các tính năng của...</p>
                                <p class="price">250.000đ/ngày</p>
                                <a href="?module=page&action=product" class="btn">Đặt xe</a>
                            </div>
                        </div>

                        <div class="bike-item">
                            <img
                                src="<?php echo _WEB_HOST_TEMPLATES; ?>/img/xedap-5.jpg"
                                alt=""
                                class="bike-img"
                            />
                            <div class="info">
                                <p class="name">Xe đạp đua</p>
                                <p class="desc line-clamp line-2 break-all">Thoải mái cho việc đi lại t...</p>
                                <p class="price">150.000đ/ngày</p>
                                <a href="?module=page&action=product" class="btn">Đặt xe</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- footer -->
        <footer class="footer">
            <div class="main-content">
                <div class="row">
                    <!-- col 1 -->
                    <div class="column">
                        <img
                            src="<?php echo _WEB_HOST_TEMPLATES; ?>/img/Logo-Thanh-Pho-Hoi-An.webp"
                            alt=""
                            class="logo"
                        />
                        <p class="desc">
                            Need to help for your dream Career? trust us. With
                            Lesson, study becomes a lot easier with us.
                        </p>
                        <div class="socials">
                            <a href="">
                                <img
                                    src="<?php echo _WEB_HOST_TEMPLATES; ?>/img/f.svg"
                                    alt="twitter"
                                    class="icon"
                                />
                            </a>
                            <a href="">
                                <img
                                    src="<?php echo _WEB_HOST_TEMPLATES; ?>/img/instagram.svg"
                                    alt="facebook"
                                    class="icon"
                                />
                            </a>
                            <a href="">
                                <img
                                    src="<?php echo _WEB_HOST_TEMPLATES; ?>/img/linked_in.svg"
                                    alt="linked_in"
                                    class="icon"
                                />
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
                                <a href="#!"
                                    ><strong>Location</strong>: 27 Division St,
                                    New York, NY 10002, USA</a
                                >
                            </li>
                            <li>
                                <a href="#!"
                                    ><strong>Email</strong>: email@gmail.com</a
                                >
                            </li>
                            <li>
                                <a href="#!"
                                    ><strong>Phone</strong>: + 000 1234 567
                                    890</a
                                >
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="copyright">
                    <p>Copyright ©2022 webdesign.gdn All rights reserved</p>
                </div>
            </div>
        </footer>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
        <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script> -->
        <script src="<?php echo _WEB_HOST_TEMPLATES ?>/js/bootstrap.min.js"></script>
        <script src="<?php echo _WEB_HOST_TEMPLATES ?>/js/custom.js"></script>
            </body>
</html>
