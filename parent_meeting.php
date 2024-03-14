<?php
// Step 1: Database connection parameters
$servername = "localhost"; // Change this if your MySQL server is hosted elsewhere
$username = "root"; // Your MySQL username
$password = ""; // Your MySQL password
$database = "nestdb"; // Your MySQL database name

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

    echo "success";
    
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Step 5: Close connection
$conn->close();
?>
