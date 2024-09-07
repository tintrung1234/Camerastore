<!-- cart_functions.php -->
<?php
include("db.php");
session_start();


if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

function addToCart($productId, $productName, $quantity, $price)
{
    global $conn;

    $productId = $conn->real_escape_string($productId);
    $productName = $conn->real_escape_string($productName);
    $quantity = $conn->real_escape_string($quantity);
    $price = $conn->real_escape_string($price);
    $dayBuy = date('Y-m-d H:i:s');

    // SQL query to insert the data into your table
    $sql = "INSERT INTO cart (product_id, product_name, quantity, day_buy, price) 
            VALUES ('$productId', '$productName', '$quantity', '$dayBuy', '$price')";

    if ($conn->query($sql) === TRUE) {
        echo "Product added to cart successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $productId = $_POST['productId'];
    $productName = $_POST['nameproduct'];
    $quantity = (int)$_POST['quantity']; // Get the quantity from the form
    $price = (float)$_POST['price'];

    // Check the quantity before processing the order
    if ($quantity > 0) {
        addToCart($productId, $productName, $quantity, $price);

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
?>