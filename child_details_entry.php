<?php
// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();

// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "";
$database = "nestdb";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve form data
$admissionNumber = $_POST['admissionNumber'];
$dateOfAdmission = $_POST['dateOfAdmission'];
$name = $_POST['name'];
$age = $_POST['age'];
$sex = $_POST['sex'];
$religion = $_POST['religion'];
$language = $_POST['language'];
$permanentAddress = $_POST['permanentAddress'];
$presentAddress = $_POST['presentAddress'];
$phoneNumber = $_POST['phoneNumber'];
$aadhaarNumber = $_POST['aadhaarNumber'];

// Handle photo upload
$photo = null;
if (isset($_FILES['photo']) && $_FILES['photo']['error'] == UPLOAD_ERR_OK) {
    $photo = file_get_contents($_FILES['photo']['tmp_name']);
}

// Insert child details into the database
$stmt = $conn->prepare("INSERT INTO child_details (admission_number, date_of_admission, name, age, sex, religion, language, permanent_address, present_address, phone_number, aadhaar_number, photo) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("sssssssssssb", $admissionNumber, $dateOfAdmission, $name, $age, $sex, $religion, $language, $permanentAddress, $presentAddress, $phoneNumber, $aadhaarNumber, $photo);

if ($stmt->execute()) {
    $child_id = $stmt->insert_id;
    
    // Handle family constellation data
    $familyMembers = json_decode($_POST['familyMembers'], true);
    $familyStmt = $conn->prepare("INSERT INTO family_constellation (child_id, name, relation, age, occupation, education, alive_dead, remarks) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    foreach ($familyMembers as $member) {
        $familyStmt->bind_param("ississss", $child_id, $member['name'], $member['relation'], $member['age'], $member['occupation'], $member['education'], $member['alive_dead'], $member['remarks']);
        $familyStmt->execute();
    }

    $_SESSION['message'] = "Data saved successfully!";
    $_SESSION['msg_type'] = "success";
} else {
    $_SESSION['message'] = "Error: " . $stmt->error;
    $_SESSION['msg_type'] = "danger";
}

// Close statements and connection
$stmt->close();
$conn->close();

// Redirect back to the form page
header("Location: child_details_entry.html");
exit();
?>
