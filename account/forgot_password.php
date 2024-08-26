<?php
$message = "";
$valid = 'true';
include("db.php");
session_start();

// Đưa vào đường dẫn đến PHPMailer
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email_reg = mysqli_real_escape_string($dbconfig, $_POST['email']);
    $details = mysqli_query($dbconfig, "SELECT username,email FROM users WHERE email='$email_reg'");

    if (mysqli_num_rows($details) > 0) { // Nếu email đã đăng ký
        $message_success = " Please check your email inbox or spam folder and follow the steps";
        // Tạo khóa ngẫu nhiên
        $key = md5(time() + 123456789 % rand(4000, 55000000));
        // Chèn khóa tạm thời vào cơ sở dữ liệu
        $sql_insert = mysqli_query($dbconfig, "INSERT INTO forget_password(email,temp_key) VALUES('$email_reg','$key')");

        // Gửi email thông báo
        $mail = new PHPMailer(true);
        try {
            // Cấu hình máy chủ SMTP
            $mail->isSMTP();
            $mail->Host       = 'smtp-relay.brevo.com'; // Địa chỉ máy chủ SMTP
            $mail->SMTPAuth   = true;
            $mail->Username   = '7aeb37001@smtp-brevo.com'; // Địa chỉ email của bạn
            $mail->Password   = 'HsakdNpxWhZrMSD7'; // Mật khẩu email của bạn
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port       = 587;

            // Người nhận
            $mail->setFrom('huynhtrungtin0604@gmail.com', 'Mailer');
            $mail->addAddress($email_reg); // Thêm người nhận

            // Nội dung email
            $mail->isHTML(true);
            $mail->Subject = "Password Recovery";
            $mail->Body    = "Hi,<br><br>Click <a href='http://localhost/camerastore/account/resetpassword.php?key=$key'>here</a> to reset your password.";

            // Gửi email
            $mail->send();
        } catch (Exception $e) {
        }
    } else {
        $message = "Sorry! no account associated with this email";
    }
}
?>
<!DOCTYPE html>
<html>
<link rel="stylesheet" href="../style/style.css">

<body>
    <!-- navbar -->
    <div id="navBar">
    </div>
    <div class="login account-css">
        <div class="container-login " id="container-login">
            <div class="formAccount-container sign-in-container" style="width: 100%;">
                <div class="picture-side">
                    <img src="../img/banner-account.jpg" alt="">
                </div>
                <div class="form-account">
                    <form role="form" method="POST">
                        <div class="form-group">
                            <label class="label-account-p">Please enter your email to recover your password</label><br><br>
                            <input class="account-email-in" style="width: 94%;" type="email" class="form-control" id="email" name="email" value="<?php echo isset($_POST['email']) ? $_POST['email'] : ''; ?>" placeholder="Email">
                        </div>

                        <?php if (isset($error)) {
                            echo "<div class='alert alert-danger' role='alert'>
                      <span class='glyphicon glyphicon-exclamation-sign' aria-hidden='true'></span>
                      " . $error . "</div>";
                        } ?>
                        <?php if ($message <> "") {
                            echo "<div class='alert alert-danger' role='alert'>
                      <span class='glyphicon glyphicon-exclamation-sign' aria-hidden='true'></span>
                      " . $message . "</div>";
                        } ?>
                        <?php if (isset($message_success)) {
                            echo "<div class='alert alert-success' role='alert'>
                      <span class='glyphicon glyphicon-ok' aria-hidden='true'></span>
                      " . $message_success . "</div>";
                        } ?>
                        <a href="login.php">Back to Login</a>
                        <button class="btn-submit-account button-account" type="submit" class="btn btn-primary pull-right" name="submit" style="display: block; width: 100%;">Send Email</button>
                        <br><br>
                        <br>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- footer  -->
    <div class="footer" id="footer">
    </div>

</body>


<script src="../js/navbar.js" type="text/javascript"></script>
<script src="../js/autocomplete.js" type="text/javascript"></script>
<script src="../js/footer.js" type="text/javascript"></script>
<script src="../js/login.js" type="text/javascript"></script>

</html>