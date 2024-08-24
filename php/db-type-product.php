<?php
$servername = "localhost"; // Update with your server details
$username = "root";
$password = "";
$dbname = "camerastore_db";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query to get Canon, Sony, and Nikon products
$sql = "SELECT * FROM products WHERE type IN ('canon', 'sony', 'nikon')";
$result = $conn->query($sql);

// Initialize arrays for each brand
$canonProducts = [];
$sonyProducts = [];
$nikonProducts = [];

if ($result->num_rows > 0) {
    // Fetch all Canon, Sony, and Nikon products
    while ($row = $result->fetch_assoc()) {
        switch ($row['type']) {
            case 'canon':
                $canonProducts[] = $row;
                break;
            case 'sony':
                $sonyProducts[] = $row;
                break;
            case 'nikon':
                $nikonProducts[] = $row;
                break;
        }
    }
} else {
    echo "No Canon, Sony, or Nikon products found.";
}

$conn->close();
