<?php
include("db.php");
session_start(); // Ensure the session is started

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

$user_id = 0;
if (isset($_SESSION['user_id'])) {
    // If the user is logged in, use their user ID
    $user_id = $_SESSION['user_id'];
} else {
    // If the user is not logged in, set customer_id to 0
    $user_id = 0;
}

function addToCart($customerId, $productId, $productName, $quantity, $price)
{
    global $conn;

    // Escape the customerId
    $customerId = (int)$customerId; // Ensure customerId is an integer
    $productId = $conn->real_escape_string($productId);
    $productName = $conn->real_escape_string($productName);
    $quantity = (int)$quantity; // Ensure quantity is an integer
    $price = (float)$price; // Ensure price is a float
    $dayBuy = date('Y-m-d H:i:s');

    // Check if customer exists
    $customerCheckQuery = "SELECT customer_id FROM customer WHERE customer_id = '$customerId'";
    $customerCheckResult = $conn->query($customerCheckQuery);

    // If customer does not exist, insert them
    if ($customerCheckResult->num_rows === 0) {
        $sql2 = "INSERT INTO customer (customer_id) VALUES ('$customerId')";
        if (!$conn->query($sql2)) {
            echo "Error adding customer: " . $conn->error;
            return; // Exit if customer insertion fails
        }
    }

    // SQL query to insert the data into your cart table
    $sql = "INSERT INTO cart (customer_id, product_id, quantity, day_buy, total_price) 
            VALUES ('$customerId', '$productId', '$quantity', '$dayBuy', '$price')";

    if ($conn->query($sql) === TRUE) {
        // Update customer name from users table only if customer exists
        $sql3 = "UPDATE customer 
                SET customer_name = (SELECT username FROM users WHERE id = '$customerId') 
                WHERE customer_id = '$customerId'";
        $conn->query($sql3); // Update customer name
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
        $customerId = $user_id; // Use the user_id that was set earlier
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
