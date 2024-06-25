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
$name = $_POST['name'];
$contact = $_POST['contact'];
$email = $_POST['email'];
$time = $_POST['time'];
$purpose = $_POST['purpose'];

// Step 4: Handle file uploads
$upload_success = true;

$sign = file_get_contents($_FILES['signature']['tmp_name']);

if ( $signature === false) {
    $upload_success = false;
}

// Step 5: Insert data into the database
if ($upload_success) {
    $stmt = $conn->prepare("INSERT INTO volunteer (date, name, contact,email,time, purpose, sign) VALUES (?, ?, ?, ?,?,?, ?)");
    $stmt->bind_param("ssssssb", $date, $name, $contact,$email, $time, $purpose, $sign);

    if ($stmt->execute()) {
        // Data inserted successfully
        $_SESSION['message'] = "Data saved successfully!";
        $_SESSION['msg_type'] = "success";
    } else {
        // Error occurred
        $_SESSION['message'] = "Error: " . $stmt->error;
        $_SESSION['msg_type'] = "danger";
    }
    $stmt->close();
} else {
    $_SESSION['message'] = "Error uploading files.";
    $_SESSION['msg_type'] = "danger";
}

// Step 6: Close connection
$conn->close();

// Redirect back to the form page
header("Location: volunteer_register.html");
exit();
?>
