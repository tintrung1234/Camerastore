<?php
$servername = "localhost"; // Update with your server details
$username = "root";
$password = "";
$dbname = "camerastore_db";

$conn = new mysqli($servername, $username, $password, $dbname);

function getCartTotal($conn)
{
    // SQL query to sum the total price of products in the cart
    $sql = "SELECT SUM(total_price) AS total FROM cart"; // Use SUM to get total price
    $result = $conn->query($sql);
    $total = 0; // Default total to 0

    if ($result) { // Check if the query was successful
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            // If total is null (which means no items), set it to 0
            $total = $row['total'] !== null ? $row['total'] : 0;
        }
    } else {
        echo "Error: " . $conn->error;
    }

    return $total;
}
