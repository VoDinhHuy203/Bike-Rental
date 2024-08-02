<?php
$title = [
    'pageTitle' => 'Store'
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
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,400;0,500;0,600;0,700;1,400&family=Sen:wght@700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="<?php echo _WEB_HOST_TEMPLATES; ?>/css/header.css" />
    
    <link rel="stylesheet" href="<?php echo _WEB_HOST_TEMPLATES; ?>/css/profile.css" />
    <link rel="stylesheet" href="<?php echo _WEB_HOST_TEMPLATES; ?>/css/store.css" />
    <link rel="stylesheet" href="<?php echo _WEB_HOST_TEMPLATES; ?>/css/bootstrap.min.css" />
    <title>Cửa hàng</title>
</head>

<?php

$filterAll = filter();

$storeInfo = oneRaw("SELECT cuahang.tenCH, users.tenND, cuahang.diaChi, cuahang.SDT
                    FROM cuahang 
                    JOIN users ON cuahang.id = users.id");

if (!empty($storeInfo)) {
    // tồn tại
    setFlashData('storeInfo', $storeInfo);
}

$storeInfo = getFlashData('storeInfo');
if (!empty($storeInfo)) {
    $old = $storeInfo;
    // echo '<br>';
    // print_r($old);
    // echo '</br>';
}

// echo '<br>';
// print_r($listOrder);
// echo '</br>';

?>

<body>
    <div class="app">
        <!-- left -->
        <div class="menu-left">
            <h2>Xin chào <span>Đình Huy Store</span></h2>
            <div class="menu-content">
                <a href="<?php echo _WEB_HOST; ?>?module=page&action=store&id=<?php echo $filterAll['id'];?>" class="meunu-action">Duyệt đơn thuê xe</a>
                <a href="<?php echo _WEB_HOST; ?>?module=page&action=bicycleManagement&id=<?php echo $filterAll['id'];?>" class="meunu-action">Danh sách xe đạp</a>
                <a href="<?php echo _WEB_HOST; ?>?module=page&action=storeInfo&id=<?php echo $filterAll['id'];?>" class="meunu-action active">Thông tin cửa hàng</a>
            </div>
        </div>

        <!-- right -->
        <div class="right-content">
        <div class="form">
        <p class="title">THÔNG TIN CỬA HÀNG</p>
        <form action="">
            <div class="store-info">
                <label for="">Tên cửa hàng: </label>
                <input type="text" name='tenND' placeholder="Họ tên" class="fullname" value="<?php echo old('tenCH', $old); ?>">
            </div>

            <div class="store-info">
                <label for="">Tên chủ sở hữu: </label>
                <input type="email" name='email' placeholder="Email" class="email" value="<?php echo old('tenND', $old); ?>">
            </div>

            <div class="store-info">
                <label for="">Địa chỉ: </label>
                <input type="phone" name='sdt' placeholder="Số điện thoại" class="sdt" value="<?php echo old('diaChi', $old); ?>">
            </div>

            <div class="store-info">
                <label for="">Số điện thoại: </label>
                <input type="text" name='cccd' placeholder="Căn cước công dân" class="cccd" value="<?php echo old('SDT', $old); ?>">
            </div>

            <div class="store-info">
                <label for="">Hình ảnh cửa hàng: </label>
                <img style="width: 200px;" src="<?php echo _WEB_HOST_TEMPLATES; ?>/img/store.jpg" alt="">
            </div>
            <input type="hidden" name="id" value="<?php echo $userId ?>">
    
            <button class="btn btn-success">Lưu</button>
            <a href="#" class="btn-back">Quay lại</a>
        </form>

    </div>
        </div>
    </div>
</body>

</html>