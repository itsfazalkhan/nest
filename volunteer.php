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
$name = $_POST['name'];
$contact = $_POST['contact'];
$email = $_POST['email'];
$time = $_POST['time'];
$purpose = $_POST['purpose'];

// Step 4: Handle file uploads
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["signature"]["name"]);


// Step 5: Insert data into the database
if (move_uploaded_file($_FILES["signature"]["tmp_name"], $target_file)) {
    $stmt = $conn->prepare("INSERT INTO volunteer (date, name, contact,email,time, purpose, sign) VALUES (?, ?, ?, ?,?,?, ?)");
    $stmt->bind_param("sssssss", $date, $name, $contact,$email, $time, $purpose, $target_file);

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
