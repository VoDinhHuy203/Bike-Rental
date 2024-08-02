<?php

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
    <link rel="stylesheet" href="<?php echo _WEB_HOST_TEMPLATES; ?>/css/store.css" />
    <link rel="stylesheet" href="<?php echo _WEB_HOST_TEMPLATES; ?>/css/header.css" />
    <link rel="stylesheet" href="<?php echo _WEB_HOST_TEMPLATES; ?>/css/detail.css" />
    <link rel="stylesheet" href="<?php echo _WEB_HOST_TEMPLATES; ?>/css/bootstrap.min.css" />
    <title>Cửa hàng</title>
</head>

<?php

$filterAll = filter();

if (!empty($filterAll['maDDX'])) {
    $maDDX = $filterAll['maDDX'];
    $id = $filterAll['id'];
    

    if (!empty($maDDX)) {

        $orderDetail = oneRaw("SELECT dondatxe.maDDX, dondatxe.ngayNhan, dondatxe.ngayTra, users.tenND, users.email, users.sdt, dondatxe.hinhThucThanhToan, dondatxe.trangThai
                            FROM dondatxe JOIN users ON dondatxe.id = users.id
                            WHERE dondatxe.maDDX = '$maDDX'
                            LIMIT 1");

        $orderDetailBike = getRaw("SELECT xedap.tenXe, COUNT(*) as soLuong, xedap.giaThue, xedap.hinhAnh
                                FROM chitietdondatxe JOIN xedap
                                ON chitietdondatxe.maXe = xedap.maXe
                                WHERE chitietdondatxe.maDDX = '$maDDX'
                                GROUP BY xedap.tenXe");
    }
    if (!empty($orderDetail)) {
        // tồn tại
        setFlashData('orderDetail', $orderDetail);
    }
    // if (!empty($orderDetailBike)) {
    //     // tồn tại
    //     setFlashData('orderDetailBike', $orderDetailBike);
    // } 
}
$bikeDetails = '';
foreach ($orderDetailBike as $bike) {
    $bikeDetails .= "{$bike['tenXe']} x {$bike['soLuong']}<br>";
}
$email = $orderDetail['email'];
$subject = 'Đơn hàng của bạn đã được duyệt';
$content = "Kính gửi $orderDetail[tenND],<br>";
$content .= " Chúng tôi rất vui mừng thông báo rằng đơn hàng của bạn đã được duyệt thành công!<br>";
$content .= " Số đơn hàng: $orderDetail[maDDX]<br>";
$content .= " Ngày nhận: $orderDetail[ngayNhan]<br>";
$content .= " Ngày trả: $orderDetail[ngayTra]<br>";
$content .= " Chi tiết đơn hàng: <br>";
$content .= " $bikeDetails<br>";


            
$content .= "Địa chỉ: 286 đường Nguyễn Duy Hiệp, Thành phố Hội An, Quảng Nam.<br>";
$content .= "Nếu bạn có bất kỳ câu hỏi hoặc yêu cầu nào, vui lòng liên hệ với bộ phận Chăm sóc khách hàng của chúng tôi theo số điện thoại 0763508414 hoặc qua email huyvipnr0@gmail.com.<br>";
$content .= "Chúng tôi rất cảm ơn sự tin tưởng và ủng hộ của bạn. Chúc bạn một ngày tốt lành!";

if (isPost()) {
    $filterAll = filter();
    echo '<br>';
    print_r($filterAll);
    echo '</br>';
    if (!empty($filterAll['maDDX'])) {
        $maDDX = $filterAll['maDDX'];
        echo $maDDX;
        $dataUpdate = [
            'trangThai' => 'Đã duyệt',
        ];

        $condition = "maDDX = $maDDX";
        if(!empty($dataUpdate)){
            $updateStatus = update('dondatxe', $dataUpdate, $condition);
            if ($updateStatus) {
                sendMail($email, $subject, $content);
                redirect('?module=page&action=store&id='.$id);
            }

        }
    }
}


$orderDetail = getFlashData('orderDetail');
// $orderDetailBike = getFlashData('orderDetailBike');

if (!empty($orderDetail)) {
    $old = $orderDetail;
}

if (($orderDetail['trangThai'] == 'Đã duyệt')) {
    setFlashData('smg', 'Đơn hàng này đã được duyệt!');
    setFlashData('smg_type', 'success');
}

$smg = getFlashData('smg');
$smg_type = getFlashData('smg_type');
?>

<body>
    <div class="app">
        <!-- left -->
        <div class="menu-left">
            <h2>Xin chào <span>Đình Huy Store</span></h2>
            <div class="menu-content">
                <a href="<?php echo _WEB_HOST; ?>?module=page&action=store&id=<?php echo $filterAll['id']; ?>" class="meunu-action active">Duyệt đơn hàng</a>
                <a href="#" class="meunu-action">Quản lý xe đạp</a>
                <a href="#" class="meunu-action">Thông tin cửa hàng</a>
            </div>
        </div>

        <div class="order">
            <div class="heading">
                <h2>Thông tin chi tiết đơn đặt xe</h2>
            </div>

            <?php
            if (!empty($smg)) {
                getMsg($smg, $smg_type);
            }

            ?>

            <div class="info-order">
                <?php
                if (!empty($orderDetail)) {
                    // foreach ($orderDetail as $item) :

                ?>
                        <div class="flex">
                            <h4>Mã đơn: </h4>
                            <span><?php echo $orderDetail['maDDX']; ?></span>
                        </div>
                        <div class="flex">
                            <h4>Họ tên khách hàng: </h4>
                            <span><?php echo $orderDetail['tenND']; ?></span>
                        </div>
                        <div class="flex">
                            <h4>Số điện thoại: </h4>
                            <span><?php echo $orderDetail['sdt']; ?></span>
                        </div>
                        <div class="flex">
                            <h4>Email: </h4>
                            <span><?php echo $orderDetail['email']; ?></span>
                        </div>
                        <div class="flex">
                            <h4>Thời gian thuê: </h4>
                            <span><?php echo $orderDetail['ngayNhan'];
                                    echo '  ->  ';
                                    echo $orderDetail['ngayTra']; ?></span>
                        </div>
                        <div class="flex">
                            <h4>Hình thức thanh toán: </h4>
                            <span><?php echo $orderDetail['hinhThucThanhToan']; ?></span>
                        </div>
                <?php
                    // endforeach;
                }
                ?>
                <table class="table">
                    <thead>
                        <th>STT</th>
                        <th>Tên xe</th>
                        <th>Số lượng</th>
                        <th>Đơn giá</th>
                        <th>Hình ảnh</th>
                    </thead>
                    <tbody>
                        <?php
                        if (!empty($orderDetailBike)) :
                            $count = 0;
                            $total = 0;
                            foreach ($orderDetailBike as $item) :
                                $count++;
                        ?>
                                <tr>
                                    <td><?php echo $count; ?></td>
                                    <td><?php echo $item['tenXe']; ?></td>
                                    <td><?php echo $item['soLuong']; ?></td>
                                    <td><?php echo $item['giaThue']; ?>đ</td>
                                    <td><img src="<?php echo _WEB_HOST_TEMPLATES; ?>/img/<?php echo $item['hinhAnh']?>" alt="" class="img-detail"></td>
                                    <?php $total += intval($item['soLuong']) * intval($item['giaThue']);?>
                                </tr>
                        <?php

                            endforeach;

                        endif;
                        ?>
                        <div class="flex">
                            <h4>Tổng cộng: </h4>
                            <span><?php echo $total?>đ</span>
                        </div>
                    </tbody>
                </table>
                <form class="form" action="" method="post">
                    <input type="hidden" name="maDDX" value="<?php echo $maDDX ?>">
                    <input type="hidden" name="id" value="<?php echo $filterAll['id'] ?>">
                    <?php echo($orderDetail['trangThai'] == 'Đã duyệt')? '<a class="btn btn-success" href="<?php echo _WEB_HOST; ?>?module=page&action=store&id=<?php echo $filterAll[id]; ?>"><buttonclass="btn" href="">Xác nhận trả</buttonclass=></a>;' : '<a class="btn btn-success" href="<?php echo _WEB_HOST; ?>?module=page&action=store&id=<?php echo $filterAll[id]; ?>"><button type="submit" class="btn" href="">Duyệt</button></a>;'; ?>
                    
                    <a href="<?php echo _WEB_HOST; ?>?module=page&action=store&id=<?php echo $filterAll['id']; ?>" class="btn btn-warning">Quay lại</a>
                </form>
            </div>

        </div>
    </div>
</body>

</html>