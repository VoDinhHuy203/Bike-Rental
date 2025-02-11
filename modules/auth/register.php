<!DOCTYPE html>
<html>
    <head>
        <title>Trang Đăng Ký</title>
        <style>
            body {
                font-family: Arial, sans-serif;
                background-color: #f2f2f2;
            }

            .container {
                background-color: white;
                padding: 20px;
                border-radius: 5px;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                max-width: 400px;
                margin: 0 auto;
                margin-top: 50px;
            }

            h1 {
                text-align: center;
                margin-bottom: 20px;
            }

            input[type="text"],
            input[type="password"] {
                width: 100%;
                padding: 12px 20px;
                margin: 8px 0;
                display: inline-block;
                border: 1px solid #ccc;
                border-radius: 4px;
                box-sizing: border-box;
            }

            button {
                background-color: #4caf50;
                color: white;
                padding: 14px 20px;
                margin: 8px 0;
                border: none;
                border-radius: 4px;
                cursor: pointer;
                width: 100%;
            }

            button:hover {
                background-color: #45a049;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <h1>Đăng Ký Tài Khoản</h1>
            <form>
                <label for="username">Tên Đăng Nhập:</label>
                <input
                    type="text"
                    id="username"
                    name="username"
                    placeholder="Nhập tên đăng nhập"
                    required
                />

                <label for="email">Email:</label>
                <input
                    type="text"
                    id="email"
                    name="email"
                    placeholder="Nhập email"
                    required
                />

                <label for="password">Mật Khẩu:</label>
                <input
                    type="password"
                    id="password"
                    name="password"
                    placeholder="Nhập mật khẩu"
                    required
                />

                <label for="confirm_password">Xác Nhận Mật Khẩu:</label>
                <input
                    type="password"
                    id="confirm_password"
                    name="confirm_password"
                    placeholder="Nhập lại mật khẩu"
                    required
                />

                <button type="submit">Đăng Ký</button>
            </form>
        </div>
    </body>
</html>
