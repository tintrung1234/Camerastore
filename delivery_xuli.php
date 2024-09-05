<?php
ob_start();
include "./php/db.php";
include "navbar.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $full_name = mysqli_real_escape_string($conn, trim($_POST['full_name']));
    $phone = mysqli_real_escape_string($conn, trim($_POST['phone']));
    $province = mysqli_real_escape_string($conn, trim($_POST['province']));
    $district = mysqli_real_escape_string($conn, trim($_POST['district']));
    $address = mysqli_real_escape_string($conn, trim($_POST['address']));
    $customer_type = $_POST['customer']; // Get value from form

    $customer_type_value = null; // Default value
    if ($customer_type === 'customer') {
        $customer_type_value = 1; // Khách lẻ
    } elseif ($customer_type === 'signup') {
        $customer_type_value = 2; // Đăng ký
    }

    try {
        $stmt = $conn->prepare("INSERT INTO deliveryaddress (full_name, phone, province, district, address, customer_type) VALUES (?, ?, ?, ?, ?, ?)");

        $stmt->bind_param("ssssis", $full_name, $phone, $province, $district, $address, $customer_type_value);
        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            header("Location: payment.php");
            exit();
        } else {
            echo "<script>alert('Thất bại. Vui lòng thử lại.'); window.history.back();</script>";
        }
    } catch (mysqli_sql_exception $e) {
        echo "Lỗi: " . htmlspecialchars($e->getMessage());
    }
}
