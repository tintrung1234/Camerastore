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

    // Check if user_id is valid before proceeding
    if ($user_id !== null) {
        // Retrieve and sanitize input data
        $full_name = mysqli_real_escape_string($conn, trim($_POST['full_name']));
        $phone = mysqli_real_escape_string($conn, trim($_POST['phone']));
        $province = mysqli_real_escape_string($conn, trim($_POST['province']));
        $district = mysqli_real_escape_string($conn, trim($_POST['district']));
        $address = mysqli_real_escape_string($conn, trim($_POST['address']));
        $customer_type = $_POST['customer']; // Get value from form
        $customer_type_value = null; // Default value

        // Determine customer type
        if ($customer_type === 'customer') {
            $customer_type_value = 1; // Khách lẻ
        } elseif ($customer_type === 'signup') {
            $customer_type_value = 2; // Đăng ký
        }

        try {
            // Start a transaction
            $conn->begin_transaction();

            // Fetch all product IDs and quantities from the cart
            $product_ids_query = "SELECT product_id, quantity FROM cart WHERE customer_id = ?";
            $stmt = $conn->prepare($product_ids_query);
            $stmt->bind_param("i", $user_id);
            $stmt->execute();
            $product_result = $stmt->get_result();

            // Initialize an array to hold product IDs and quantities
            $product_data = [];
            while ($row = $product_result->fetch_assoc()) {
                $product_data[] = $row;
            }

            // Create a join table to associate multiple product IDs with a customer
            $stmt = $conn->prepare("CREATE TABLE IF NOT EXISTS customer_product (
                customer_id INT,
                product_id INT,
                quantity INT NOT NULL DEFAULT 1,
                PRIMARY KEY (customer_id, product_id)
            )");
            $stmt->execute();

            // Insert a new customer record
            $stmt = $conn->prepare("INSERT INTO customer (user_id, customer_name, _address, district, province, phone) VALUES (?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("issssi", $user_id, $full_name, $address, $district, $province, $phone);
            if (!$stmt->execute()) {
                throw new Exception("Error inserting customer: " . $stmt->error);
            }

            // Insert product IDs and quantities into the customer_product table
            $customer_id = $conn->insert_id; // Get the inserted customer ID
            foreach ($product_data as $item) {
                $product_id = $item['product_id'];
                $quantity = $item['quantity'];

                $stmt = $conn->prepare("INSERT INTO customer_product (customer_id, product_id, quantity) VALUES (?, ?, ?)");
                $stmt->bind_param("iii", $customer_id, $product_id, $quantity);
                if (!$stmt->execute()) {
                    throw new Exception("Error inserting customer product: " . $stmt->error);
                }
            }

            // Commit the transaction
            $conn->commit();

            // Check if the insert was successful
            if ($stmt->affected_rows > 0) {
                // Redirect to payment page or another page
                header("Location: payment.php");
                exit();
            } else {
                echo "<script>alert('Failed to insert customer information. Please try again.'); window.history.back();</script>";
            }
        } catch (Exception $e) {
            // Rollback the transaction if something failed
            $conn->rollback();
            echo "Error: " . htmlspecialchars($e->getMessage());
        }
    } else {
        echo "<script>alert('User ID is not set. Please log in again.'); window.location.href='login.php';</script>";
    }
}
