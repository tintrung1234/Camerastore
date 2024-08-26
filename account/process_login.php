<?php
// Start session
session_start();

// Database connection (replace with your actual database credentials)
$host = 'localhost';
$dbname = 'camerastore_db';
$username = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Could not connect to the database: " . $e->getMessage());
}

// Registration process
if (isset($_POST['register'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // Check if the passwords match
    if ($password !== $confirm_password) {
        echo "Mật khẩu không khớp!";
        exit;
    }

    // Check if the username or email already exists
    $stmt = $pdo->prepare("SELECT * FROM users WHERE username = :username OR email = :email");
    $stmt->execute(['username' => $username, 'email' => $email]);
    if ($stmt->rowCount() > 0) {
        echo "Tên đăng nhập hoặc email đã tồn tại!";
        exit;
    }

    // Insert the new user into the database without hashing the password
    $stmt = $pdo->prepare("INSERT INTO users (username, email, password) VALUES (:username, :email, :password)");
    $stmt->execute(['username' => $username, 'email' => $email, 'password' => $password]); // Không mã hóa mật khẩu

    echo "Đăng ký thành công!";
    // Optionally, redirect to login page
    header('Location: login.php');
    exit;
}

// Login process
if (isset($_POST['login'])) {
    $username_or_email = $_POST['username_or_email'];
    $password = $_POST['password'];

    // Check if the user exists
    $stmt = $pdo->prepare("SELECT * FROM users WHERE username = :username OR email = :email LIMIT 1");
    $stmt->execute(['username' => $username_or_email, 'email' => $username_or_email]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && $password === $user['password']) { // So sánh trực tiếp
        // Password is correct, start a session
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];

        echo "Đăng nhập thành công!";
        // Optionally, redirect to a logged-in page
        header('Location: ../home.php');
        exit;
    } else {
        echo "Tên đăng nhập/email hoặc mật khẩu không đúng!";
        exit;
    }
}
