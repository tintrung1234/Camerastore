<?php
include "./php/db.php";
session_start();

$user_id = $_SESSION['user_id'] ?? 0; // Use null if user_id is not set


// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $payment_method = $_POST['method-payment'];
    $status = ($payment_method === 'cash') ? 0 : 1; // Set status based on payment method

    // Fetch product details from the cart
    $cart_id = 1; // You may want to dynamically fetch the cart ID
    $product_ids_query = "SELECT product_id, quantity FROM cart WHERE customer_id = ?";
    $stmt = $conn->prepare($product_ids_query);
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $product_result = $stmt->get_result();

    // Insert each product into the orders table
    while ($row = $product_result->fetch_assoc()) {
        $product_id = $row['product_id'];
        $order_quantity = $row['quantity'];

        $insert_order_query = "INSERT INTO orders (customer_id, product_id, cart_id, order_quantity, status) VALUES (?, ?, ?, ?, ?)";
        $insert_stmt = $conn->prepare($insert_order_query);
        $insert_stmt->bind_param("iiiii", $user_id, $product_id, $cart_id, $order_quantity, $status);

        if (!$insert_stmt->execute()) {
            echo "Error inserting order: " . $insert_stmt->error;
        }
    }

    // Optionally clear the cart after successful order insertion
    $clear_cart_query = "DELETE FROM cart WHERE customer_id = ?";
    $clear_stmt = $conn->prepare($clear_cart_query);
    $clear_stmt->bind_param("i", $user_id);
    $clear_stmt->execute();

    // Redirect to a confirmation page or display a success message
    header("Location: home.php"); // Redirect to an order confirmation page
    exit();
}
