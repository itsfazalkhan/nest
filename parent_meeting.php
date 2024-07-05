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
$remark = $_POST['remark'];

// Step 4: Insert data into the database
$sql = "INSERT INTO parent_meeting (date, name, contact, remark)
        VALUES ('$date', '$name', '$contact', '$remark')";

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
header("Location: parent_meeting_register.html");
exit();
?>
