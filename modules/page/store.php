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
    <link rel="stylesheet" href="<?php echo _WEB_HOST_TEMPLATES; ?>/css/home.css" />
    <link rel="stylesheet" href="<?php echo _WEB_HOST_TEMPLATES; ?>/css/store.css" />
    <link rel="stylesheet" href="<?php echo _WEB_HOST_TEMPLATES; ?>/css/bootstrap.min.css" />
    <title>Cửa hàng</title>
</head>

<?php

$filterAll = filter();

$listOrder = getRaw("SELECT dondatxe.maDDX, users.tenND, dondatxe.ngayNhan, dondatxe.ngayTra, dondatxe.hinhThucThanhToan, dondatxe.trangThai
                            FROM dondatxe JOIN users
                            ON dondatxe.id = users.id
                            ORDER BY trangThai");

?>

<body>
    <div class="app">
        <!-- left -->
        <div class="menu-left">
            <h2>Xin chào <span>Đình Huy Store</span></h2>
            <div class="menu-content">
                <a href="<?php echo _WEB_HOST; ?>?module=page&action=store&id=<?php echo $filterAll['id'];?>" class="meunu-action active">Duyệt đơn thuê xe</a>
                <a href="<?php echo _WEB_HOST; ?>?module=page&action=bicycleManagement&id=<?php echo $filterAll['id'];?>" class="meunu-action">Danh sách xe đạp</a>
                <a href="<?php echo _WEB_HOST; ?>?module=page&action=storeInfo&id=<?php echo $filterAll['id'];?>" class="meunu-action">Thông tin cửa hàng</a>
            </div>
        </div>

        <!-- right -->
        <div class="right-content">
            <h1>DUYỆT ĐƠN THUÊ XE</h1>

            <table class="table">
                <thead>
                    <th>Mã đơn hàng</th>
                    <th>Tên khách hàng</th>
                    <th>Ngày nhận</th>
                    <th>Ngày trả</th>
                    <th>Trạng thái</th>
                    <th width="5%">Xem chi tiết</th>

                </thead>
                <tbody>
                    <?php
                    if (!empty($listOrder)) :
                        foreach ($listOrder as $item) :
                            if($item['trangThai'] == 'Chưa duyệt') {
                            
                    ?>
                            <tr>
                                <td><?php echo $item['maDDX']; ?></td>
                                <td><?php echo $item['tenND']; ?></td>
                                <td><?php echo $item['ngayNhan']; ?></td>
                                <td><?php echo $item['ngayTra']; ?></td>
                                <td><?php echo $item['trangThai']; ?></td>
                                <td><a href="<?php echo _WEB_HOST; ?>?module=page&action=detail&id=<?php echo $filterAll['id'];?>&maDDX=<?php echo $item['maDDX'] ?>" class="btn btn-warning btn-sm"><i class="fa-solid fa-eye"></i></a></td>
                            </tr>
                        <?php
                            }
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
        </div>
    </div>
</body>

</html>