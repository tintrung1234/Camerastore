<?php
include("process_login.php");
?>
<style>
    body {
        font-family: Arial, sans-serif;
        background: linear-gradient(to right, #ffffff, #a3c5ff);
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        margin: 0;
    }

    .form-container {
        display: flex;
        background: white;
        border-radius: 10px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        overflow: hidden;
        width: 60%;
        margin-left: auto;
        margin-right: auto;
    }

    .picture-side {
        background-size: cover;
    }

    .form-account {
        flex: 1;
        padding: 30px 30px 0 30px;
    }

    h1 {
        margin: 0 0 20px;
        font-size: 24px;
        color: #333;
    }

    p {
        color: #555;
        margin-bottom: 30px;
    }

    input[type="text"],
    input[type="password"],
    input[type="email"],
    #forgotEmail {
        width: 100%;
        padding: 7px;
        margin: 10px 0;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    span.close {
        font-size: 34px;
        cursor: pointer;
    }

    .forgot-box {
        padding: 10px;
    }

    .label-forget-pass {
        font-size: 24px;
        margin: 22px 0;
    }

    button {
        width: 100%;
        padding: 10px;
        background-color: #6a11cb;
        color: white;
        border: none;
        border-radius: 5px;
        font-size: 16px;
        cursor: pointer;
    }

    button:hover {
        background-color: #2575fc;
    }

    .actions-account {
        display: flex;
        justify-content: space-between;
        margin-top: 10px;
    }

    .actions-account a {
        color: #6a11cb;
        text-decoration: none;
    }

    .actions-account a:hover {
        text-decoration: underline;
    }
</style>
<link rel="stylesheet" href="../style/style.css">

<div class="login">
    <div class="container-login" id="container-login">
        <div class="form-container sign-in-container">
            <div class="picture-side">
                <img src="../img/banner-account.jpg" alt="">
            </div>
            <div class="form-account">
                <form action="process_login.php" method="post">
                    <h1>TẠO TÀI KHOẢN</h1>
                    <h1>Chào bạn!</h1>
                    <p>Hãy cho chúng tôi biết thông tin của bạn để có trãi nghiệm tốt hơn</p>
                    <input type="text" name="username" placeholder="Tên đăng nhập" required />
                    <input type="email" name="email" placeholder="Email" required />
                    <input type="password" name="password" placeholder="Mật khẩu" required />
                    <input type="password" name="confirm_password" placeholder="Nhập lại mật khẩu" required />
                    <div class="actions-account">
                        <a href="login.php">Đăng Nhập</a>
                    </div>
                    <input type="hidden" name="register" value="1" />
                    <button type="submit">ĐĂNG KÝ</button>
                </form>
            </div>
        </div>
        <div id="forgotPasswordModal" class="modal" style="display: none;">
            <div class="backgroundNoti"></div>
            <div class="littleBox forgot-box">
                <div class="modal-content">
                    <span class="close" onclick='turn_off_box()'>&times;</span>
                    <h2 class="label-forget-pass">Khôi phục mật khẩu</h2>
                    <input type="email" id="forgotEmail" placeholder="Nhập email của bạn" />
                    <button id="sendResetLink">Gửi liên kết khôi phục</button>
                </div>
            </div>
        </div>
    </div>
</div>