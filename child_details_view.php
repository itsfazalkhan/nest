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

// Step 3: Retrieve child details from the database
$sqlChildDetails = "SELECT * FROM child_details";
$resultChildDetails = $conn->query($sqlChildDetails);

// Step 4: Retrieve family constellation details from the database
$sqlFamilyConstellation = "SELECT * FROM family_constellation";
$resultFamilyConstellation = $conn->query($sqlFamilyConstellation);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="style.css">

    <title>Child Details View</title>

    <style>
        table {
            border-collapse: collapse;
            width: 100%;
            margin-bottom: 20px;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>

<body>
    <!-- Navigation Bar -->
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="#">NEST</a>
            </div>
            <ul class="nav navbar-nav">
                <li><a href="index.html">Home</a></li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">Child Details
                        <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="child_details_entry.html">Entry</a></li>
                        <li><a href="child_details_view.php">View</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">Medicine
                        <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="medicine_stock.html">Medicine Stock</a></li>
                        <li><a href="medicine_used.html">Medicine Used</a></li>
                    </ul>
                </li>
                <li><a href="child_pr_entry.html">Child Progress Report</a></li>
                <li><a href="volunteer_register.html">Volunteer Register</a></li>
                <li class="dropdown">
                  <a class="dropdown-toggle" data-toggle="dropdown" href="#">Children Stock/Distribution
                      <span class="caret"></span>
                  </a>
                  <ul class="dropdown-menu">
                      <li><a href="child_stock_register.html">Stock Entry</a></li>
                      <li><a href="child_distribution_register.html">Distribution</a></li>
                      <li><a href="child_stock_view.php">Stock View</a></li>
                      <li><a href="child_distribution_view.php">Distribution View</a></li>
                  </ul>
                </li>
                <li class="dropdown">
                  <a class="dropdown-toggle" data-toggle="dropdown" href="#">Movement
                      <span class="caret"></span>
                  </a>
                  <ul class="dropdown-menu">
                      <li><a href="child_movement_register.html">Children's Movement</a></li>
                      <li><a href="staff_movement_register.html">Staff Movement</a></li>
                      <li><a href="child_movement_view.php">Children's Movement View</a></li>
                      <li><a href="staff_movement_view.php">Staff Movement View</a></li>
                  </ul>
                </li>
                <li><a href="parent_meeting_register.html">Parents Meeting</a></li>
            </ul>
        </div>
    </nav>

    <div class="container">
        <h2>Child Details</h2>
        <table>
            <thead>
                <tr>
                    <th>Child Id</th>
                    <th>Admission Number</th>
                    <th>Date of Admission</th>
                    <th>Name</th>
                    <th>Age</th>
                    <th>Sex</th>
                    <th>Religion</th>
                    <th>Language</th>
                    <th>Permanent Address</th>
                    <th>Present Address</th>
                    <th>Phone Number</th>
                    <th>Aadhaar Number</th>
                    <th>Photo</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($resultChildDetails->num_rows > 0) {
                    while($rowChildDetails = $resultChildDetails->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $rowChildDetails["id"] . "</td>";
                        echo "<td>" . $rowChildDetails["admission_number"] . "</td>";
                        echo "<td>" . $rowChildDetails["date_of_admission"] . "</td>";
                        echo "<td>" . $rowChildDetails["name"] . "</td>";
                        echo "<td>" . $rowChildDetails["age"] . "</td>";
                        echo "<td>" . $rowChildDetails["sex"] . "</td>";
                        echo "<td>" . $rowChildDetails["religion"] . "</td>";
                        echo "<td>" . $rowChildDetails["language"] . "</td>";
                        echo "<td>" . $rowChildDetails["permanent_address"] . "</td>";
                        echo "<td>" . $rowChildDetails["present_address"] . "</td>";
                        echo "<td>" . $rowChildDetails["phone_number"] . "</td>";
                        echo "<td>" . $rowChildDetails["aadhaar_number"] . "</td>";
                        echo "<td><img src='data:image/jpeg;base64," . base64_encode($rowChildDetails["photo"]) . "' alt='Photo' width='50' height='50'/></td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='12'>No records found</td></tr>";
                }
                ?>
            </tbody>
        </table>

        <h2>Family Constellation</h2>
        <table>
            <thead>
                <tr>
                    <th>Child ID</th>
                    <th>Name</th>
                    <th>Relation</th>
                    <th>Age</th>
                    <th>Occupation</th>
                    <th>Education</th>
                    <th>Alive/Dead</th>
                    <th>Remarks</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($resultFamilyConstellation->num_rows > 0) {
                    while($rowFamily = $resultFamilyConstellation->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $rowFamily["child_id"] . "</td>";
                        echo "<td>" . $rowFamily["name"] . "</td>";
                        echo "<td>" . $rowFamily["relation"] . "</td>";
                        echo "<td>" . $rowFamily["age"] . "</td>";
                        echo "<td>" . $rowFamily["occupation"] . "</td>";
                        echo "<td>" . $rowFamily["education"] . "</td>";
                        echo "<td>" . $rowFamily["alive_dead"] . "</td>";
                        echo "<td>" . $rowFamily["remarks"] . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='8'>No family constellation records found</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>

<?php
// Step 5: Close connection
$conn->close();
?>
