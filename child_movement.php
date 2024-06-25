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
$place = $_POST['place'];
$purpose = $_POST['purpose'];
$accompanied = $_POST['accompanied'];
$departure_date = $_POST['departure_date'];
$return_date = $_POST['return_date'];
$remark = $_POST['remark'];

// Step 4: Handle file uploads
$upload_success = true;

$child_sign = file_get_contents($_FILES['child_sign']['tmp_name']);
$person_sign = file_get_contents($_FILES['person_sign']['tmp_name']);
$staff_sign = file_get_contents($_FILES['staff_sign']['tmp_name']);

if ($child_sign === false || $person_sign === false || $staff_sign === false) {
    $upload_success = false;
}

// Step 5: Insert data into the database
if ($upload_success) {
    $stmt = $conn->prepare("INSERT INTO child_movement (date, name, place, purpose, acc_person, dep_date, return_date, remark, child_sign, person_sign, staff_sign) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssssssbbb", $date, $name, $place, $purpose, $accompanied, $departure_date, $return_date, $remark, $child_sign, $person_sign, $staff_sign);

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
header("Location: child_movement_register.html");
exit();
?>
