<?php
// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Start session
session_start();

// Step 1: Database connection parameters
$servername = "localhost"; 
$username = "root"; 
$password = ""; 
$database = "nestdb"; 

// Step 2: Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Step 3: Retrieve form data
$medicine_name = $_POST['medicine_name'];
$quantity = $_POST['quantity'];
$date_purchase = $_POST['date_purchase'];
$expiry_date = $_POST['expiry_date'];

// Step 4: Insert data into the database
$sql = "INSERT INTO medicine_stock (medicine_name, quantity, date_purchase, expiry_date)
        VALUES ('$medicine_name', '$quantity', '$date_purchase', '$expiry_date' )";

if ($conn->query($sql) === TRUE) {
    // Data inserted successfully
    $_SESSION['message'] = "Data saved successfully!";
    $_SESSION['msg_type'] = "success";
} else {
    // Error occurred
    $_SESSION['message'] = "Error: " . $sql . "<br>" . $conn->error;
    $_SESSION['msg_type'] = "danger";
}

// Step 5: Close connection
$conn->close();

// Redirect back to the form page
header("Location: medicine_stock.html");
exit();
?>
