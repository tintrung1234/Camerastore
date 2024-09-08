<?php
$servername = "localhost"; // Update with your server details
$username = "root";
$password = "";
$dbname = "camerastore_db";

$conn = new mysqli($servername, $username, $password, $dbname);

function getCartTotal($conn)
{
    $sql = "SELECT total_price FROM cart";
    $result = $conn->query($sql);

    $total = 0;

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $total = $row['total_price'];
    }

    return $total;
}
