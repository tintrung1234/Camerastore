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
        width: 80%;
        margin-left: auto;
        margin-right: auto;
    }

    .picture-side {
        background-size: cover;
    }

    .form-account {
        flex: 1;
        padding: 40px;
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
    #forgotEmail {
        width: 100%;
        padding: 10px;
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
        margin-top: 71px;
        margin-bottom: 5px;
    }

    .actions-account a {
        color: #6a11cb;
        text-decoration: none;
    }

    .actions-account a:hover {
        text-decoration: underline;
    }

    button#sendResetLink {
        bottom: 0;
        margin-top: 157px;
    }
</style>
<link rel="stylesheet" href="../style/style.css">



<!-- SIGN IN-->
<div class="login">
    <div class="container-login" id="container-login">
        <div class="form-container sign-in-container">
            <div class="picture-side">
                <img src="../img/banner-account.jpg" alt="">
            </div>
            <div class="form-account">
                <form action="process_login.php" method="POST">
                    <h1>ĐĂNG NHẬP</h1>
                    <h1>Chào mừng bạn đã trở lại!</h1>
                    <p>Để duy trì kết nối với chúng tôi vui lòng đăng nhập bằng thông tin cá nhân của bạn</p>
                    <input type="text" name="username_or_email" placeholder="Tên đăng nhập hoặc email" required />
                    <input type="password" name="password" placeholder="Mật khẩu" required />
                    <div class="actions-account">
                        <a href="#" onclick="display_forgotpassword()">Quên mật khẩu?</a>
                        <a href="register.php">Đăng ký tài khoản</a>
                    </div>
                    <input type="hidden" name="login" value="1" />
                    <button type="submit">ĐĂNG NHẬP</button>
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


<script>
    function display_forgotpassword() {
        const target = document.getElementById("forgotPasswordModal")
        target.style.display = 'block';
    }

    function turn_off_box() {
        const target = document.getElementById("forgotPasswordModal")
        target.style.display = 'none';
    }
</script>

<script src="js/autocomplete.js" type="text/javascript"></script>
<script src="js/footer.js" type="text/javascript"></script>
<script src="js/login.js" type="text/javascript"></script>