<?php 
    $category = getRaw("SELECT * FROM `danhmucxe`");
    // echo '<br>';
    // print_r($category);
    // echo '</br>';
?>
<!DOCTYPE html>
<html lang="vi">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Trang Admin</title>
        <link rel="stylesheet" href="<?php echo _WEB_HOST_TEMPLATES; ?>/css/user.css" />
        <link rel="stylesheet" href="<?php echo _WEB_HOST_TEMPLATES; ?>/css/bootstrap.min.css" />
    </head>
    <body>
        <div class="sidebar">
            <h2>Admin</h2>
            <ul>
                <li><a href="<?php echo _WEB_HOST; ?>?module=page&action=users">Quản lý Người dùng</a></li>
                <li><a href="<?php echo _WEB_HOST; ?>?module=page&action=category" class="active">Quản lý danh mục</a></li>
                <li><a href="#settings">Cài đặt</a></li>
                <li><a href="?module=auth&action=logout">Đăng xuất</a></li>
            </ul>
        </div>
        <div class="main-content">
            <header>
                <h1>Quản lý danh mục</h1>
            </header>
            <section>
                <h2>Danh sách danh mục</h2>
                <table>
                    <thead>
                        <tr>
                            <th>Mã danh mục</th>
                            <th>Tên danh mục</th>
                            <th>Hình ảnh</th>
                            <th>Sửa</th>
                            <th>Xóa</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            if(!empty($category)) {
                                foreach ($category as $item) {
                                  
                        ?>
                        <tr>
                            <td><?php echo $item['maDM']; ?></td>
                            <td><?php echo $item['tenDM']; ?></td>
                            <td><img style="width: 60px;" src="<?php echo _WEB_HOST_TEMPLATES; ?>/img/<?php echo $item['hinhAnhDD']?>" alt="" class="img-detail"></td>
                            <td><button class="btn btn-primary">Sửa</button></td>
                            <td><button class="btn btn-danger">Xóa</button></td>
                        </tr>

                        <?php 
                              
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </section>
        </div>
    </body>
</html>
