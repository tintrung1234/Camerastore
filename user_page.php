<?php
include "navbar.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Page</title>
    <link rel="icon" href="./uploads/img/ProCam.png" type="image/x-icon" />
</head>

<body>
    <div class="container_user">
        <div class="spaceNavBar" style="padding-top: 100px;"></div>
        <div class="block_user1">
            <a href="logout.php" id="logout_btn" class="logout_btn">
                <p>Đăng xuất</p>
                <img src="./uploads/img/logout.png" alt="" style="width: 22px; padding-left: 3px;">
            </a>
            <img class="img_user" src="./uploads/img/user_img.png" alt="">
            <p class="user_Name">Huynh Trung Tin</p>
        </div>

        <h1>Thông tin cá nhân</h1>
        <div class="block_user2">
            <p>Email: <span>huynhtrungtin@gmail.com</span>
            </p>
            <p>Số điện thoại: <span>0912313432</span>
            </p>
        </div>

        <h1>Thông tin đơn dặt hàng</h1>
        <div class="block_user3">
            <table>
                <tr>
                    <th>ID</th>
                    <th>Số lượng sản phẩm</th>
                    <th>Sản Phẩm</th>
                    <th>Tổng thanh toán</th>
                    <th>Địa chỉ</th>
                </tr>
                <tr>
                    <td>1</td>
                    <td>3</td>
                    <td>cânfegew</td>
                    <td>3215155</td>
                    <td>ágwjhglkGFFFJKAHFJAKFLAHFJJ</td>
                </tr>
            </table>
        </div>
    </div>
</body>

</html>