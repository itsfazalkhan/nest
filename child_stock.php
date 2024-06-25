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
$date = $_POST['date'];
$particulars = $_POST['particulars'];
$received_from = $_POST['received_from'];
$received_quantity = $_POST['received_quantity'];
$issued_quantity = $_POST['issued_quantity'];
$balance_quantity = $_POST['balance_quantity'];

// Step 4: Insert data into the database
$sql = "INSERT INTO child_stock (date, particulars, received_from, received_quantity, issued_quantity, balance_quantity)
        VALUES ('$date', '$particulars', '$received_from', '$received_quantity','$issued_quantity','$balance_quantity' )";

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
header("Location: child_stock_register.html");
exit();
?>
