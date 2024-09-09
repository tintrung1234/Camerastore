<?php
include("db.php");
session_start(); // Ensure the session is started

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// Check if user_id is set in the session
if (!isset($_SESSION['user_id'])) {
    echo "Error: User not logged in.";
    exit();
}
function addToCart($customerId, $productId, $productName, $quantity, $price)
{
    global $conn;
    // Escape the customerId
    $customerId = $conn->real_escape_string($customerId);

    // Check if customer exists
    $customerCheckQuery = "SELECT customer_id FROM customer WHERE customer_id = '$customerId'";
    $customerCheckResult = $conn->query($customerCheckQuery);

    // Customer exists, proceed to add to cart
    $productId = $conn->real_escape_string($productId);
    $productName = $conn->real_escape_string($productName);
    $quantity = (int)$quantity; // Ensure quantity is an integer
    $price = (float)$price; // Ensure price is a float
    $dayBuy = date('Y-m-d H:i:s');

    // SQL query to insert the data into your cart table
    $sql = "INSERT INTO cart (customer_id, product_id, quantity, day_buy, total_price) 
                   VALUES ('$customerId', '$productId', '$quantity', '$dayBuy', '$price')";

    $sql2 = "INSERT INTO customer (customer_id)
                    VALUES ('$customerId')";

    $sql3 = "UPDATE customer 
            SET customer_name = (SELECT username FROM users WHERE id = customer_id) 
            WHERE customer_id = (SELECT id FROM users WHERE id = customer_id)";

    if ($conn->query($sql) === TRUE) {
        $conn->query($sql2);
        $conn->query($sql3);

        echo "Product added to cart successfully";
    } else {
        echo "Error adding product to cart: " . $conn->error;
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $productId = $_POST['productId'];
    $productName = $_POST['nameproduct'];
    $quantity = (int)$_POST['quantity']; // Get the quantity from the form
    $price = (float)$_POST['price'];

    // Check the quantity before processing the order
    if ($quantity > 0) {
        $customerId = $_SESSION['user_id']; // Get customer ID from session
        addToCart($customerId, $productId, $productName, $quantity, $price);

        // Redirect to the cart details page
        header("Location: ../cart_detail.php");
        exit();
    } else {
        // Handle the case where quantity is zero
        echo "Quantity must be greater than zero.";
    }
}

/**
 * Displays the total quantity and price of items in the cart.
 */
function displayCart()
{
    $totalQuantity = 0;
    $priceTotal = 0;

    foreach ($_SESSION['cart'] as $item) {
        $totalQuantity += $item['quantity'];
        $priceTotal += $item['price'] * $item['quantity']; // Calculate total price
    }

    echo "Total Quantity: {$totalQuantity}<br>";
    echo "Total Price: VND {$priceTotal}<br>";
}
