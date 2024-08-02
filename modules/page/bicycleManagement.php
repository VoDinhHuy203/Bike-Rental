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

$listBicycle = getRaw("SELECT maXe, tenXe, hinhAnh, giaThue, trangThai
                    FROM xedap ");

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
                <a href="<?php echo _WEB_HOST; ?>?module=page&action=bicycleManagement&id=<?php echo $filterAll['id'];?>" class="meunu-action active">Danh sách xe đạp</a>
                <a href="<?php echo _WEB_HOST; ?>?module=page&action=storeInfo&id=<?php echo $filterAll['id'];?>" class="meunu-action">Thông tin cửa hàng</a>
            </div>
        </div>

        <!-- right -->
        <div class="right-content">
            <h1 style="text-transform: uppercase;">Quản lý xe đạp</h1>
            <p>
                <a style="font-size: 14px; padding: 10px; margin-top: 20px; width: 100%;" href="#" class="btn btn-success btn-sm">Thêm xe đạp <i class="fa-solid fa-plus"></i></a>
            </p>
            <table class="table">
                <thead>
                    <th>Mã xe</th>
                    <th>Tên xe</th>
                    <th width="5%">ảnh</th>
                    <th>Giá thuê</th>
                    <th>Trạng thái</th>
                    <th width="5%">Sửa</th>
                    <th width="5%">Xóa</th>
                </thead>
                <tbody>
                    <?php
                    if (!empty($listBicycle)) :
                        foreach ($listBicycle as $item) :
                            // if($item['trangThai'] == 'Chưa duyệt') {
                            
                    ?>
                            <tr>
                                <td><?php echo $item['maXe']; ?></td>
                                <td><?php echo $item['tenXe']; ?></td>
                                <td><img src="<?php echo _WEB_HOST_TEMPLATES; ?>/img/<?php echo $item['hinhAnh']?>" alt="" class="img-info"></td>
                                <td><?php echo $item['giaThue']; ?></td>
                                <td><?php echo $item['trangThai']; ?></td>
                                <td><a href="#" class="btn btn-warning btn-sm"><i class="fa-solid fa-pen-to-square"></i></a></td>
                        <td><a href="#" class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i></a></td>
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
        </div>
    </div>
</body>

</html>