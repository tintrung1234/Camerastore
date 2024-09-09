<?php
ob_start();
include "./php/db.php";
include "navbar.php";
// Start the session to access session variables
session_start();

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve user ID from session
    $user_id = $_SESSION['user_id'] ?? null; // Use null if user_id is not set

    // Check if user_id is set
    if ($user_id === null) {
        echo "<script>alert('User not logged in.'); window.history.back();</script>";
        exit();
    }

    // Retrieve and sanitize input data
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
        // Prepare the SQL statement to insert delivery address
        $stmt = $conn->prepare("INSERT INTO deliveryaddress (user_id, full_name, phone, province, district, address, customer_type) VALUES (?, ?, ?, ?, ?, ?, ?)");
        // Bind parameters including user_id
        $stmt->bind_param("issssis", $user_id, $full_name, $phone, $province, $district, $address, $customer_type_value);
        $stmt->execute();

        // Update the customer table with the new address information
        $sql = "UPDATE customer 
                SET address = ?, district = ?, province = ? 
                WHERE customer_id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssi", $address, $district, $province, $user_id);
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
