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
$child_id = $_POST['child_id'];
$date = $_POST['date'];
$child_name = $_POST['child_name'];
$illness = $_POST['illness'];
$medicine_name = $_POST['medicine_name'];

// Step 4: Handle file uploads
// Handle file uploads
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["child_sign"]["name"]);

if (move_uploaded_file($_FILES["child_sign"]["tmp_name"], $target_file)) {
    // Insert data into the database
    $stmt = $conn->prepare("INSERT INTO medicine_used (child_id, date, child_name, illness, medicine_name, child_sign) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssss", $child_id, $date, $child_name, $illness, $medicine_name, $target_file);

    if ($stmt->execute()) {
        $_SESSION['message'] = "Data saved successfully!";
        $_SESSION['msg_type'] = "success";
    } else {
        $_SESSION['message'] = "Error: " . $stmt->error;
        $_SESSION['msg_type'] = "danger";
    }
    $stmt->close();
} else {
    $_SESSION['message'] = "Sorry, there was an error uploading your file.";
    $_SESSION['msg_type'] = "danger";
}

// Step 6: Close connection
$conn->close();

// Redirect back to the form page
header("Location: medicine_used.html");
exit();
?>
