<?php 
    $users = getRaw("SELECT * FROM `users`");
//     echo '<br>';
// print_r($users);
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
                <li><a class="active" href="<?php echo _WEB_HOST; ?>?module=page&action=users">Quản lý Người dùng</a></li>
                <li><a href="<?php echo _WEB_HOST; ?>?module=page&action=category">Quản lý danh mục</a></li>
                <li><a href="#settings">Cài đặt</a></li>
                <li><a href="?module=auth&action=logout">Đăng xuất</a></li>
            </ul>
        </div>
        <div class="main-content">
            <header>
                <h1>Quản lý người dùng</h1>
            </header>
            <section>
                <h2>Danh sách người dùng</h2>
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Tên tài khoản</th>
                            <th>Họ tên</th>
                            <th>Email</th>
                            <th>SDT</th>
                            <th>Quyền</th>
                            <th>Sửa</th>
                            <th>Xóa</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            if(!empty($users)) {
                                foreach ($users as $item) {
                                  
                        ?>
                        <tr>
                            <td><?php echo $item['id']; ?></td>
                            <td><?php echo $item['tenTK']; ?></td>
                            <td><?php echo $item['tenND']; ?></td>
                            <td><?php echo $item['email']; ?></td>
                            <td><?php echo $item['sdt']; ?></td>
                            <td><?php echo $item['quyenTK']; ?></td>
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
