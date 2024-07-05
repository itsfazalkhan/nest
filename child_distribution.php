<?php
// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Start session
session_start();

// Step 1: Database connection parameters
$servername = "nest.wuaze.com";
$username = "if0_36843521";
$password = "WQxMQK9kMV7A";
$database = "if0_36843521_nest";

// Step 2: Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Step 3: Retrieve form data
$date = $_POST['date'];
$stationary = $_POST['stationary'];
$cosmetics = $_POST['cosmetics'];
$clothing = $_POST['clothing'];
$toiletry = $_POST['toiletry'];

// Step 4: Insert data into the database
$sql = "INSERT INTO child_register (date, stationary, cosmetics, clothing, toiletry)
        VALUES ('$date', '$stationary', '$cosmetics', '$clothing','$toiletry' )";

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
header("Location: child_distribution_register.html");
exit();
?>
