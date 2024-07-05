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

// Step 3: Retrieve data from the database
$sql = "SELECT * FROM child_movement";
$result = $conn->query($sql);
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

    <title>Child Movement View</title>

    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            border: 2px solid black;
            text-align: left;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
        }
        img {
            max-width: 200px; /* Adjust this value to change the maximum width */
            max-height: 100px; /* Adjust this value to change the maximum height */
            width: auto;
            height: auto;
        }
    </style>
</head>

<body>
    <!-- Navigation Bar -->
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" >NEST</a>
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
                <li class="active" class="dropdown">
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
        <h2>Child Movement Register</h2>
        <table>
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Name</th>
                    <th>Place</th>
                    <th>Purpose</th>
                    <th>Accompanied By</th>
                    <th>Departure Date</th>
                    <th>Return Date</th>
                    <th>Remark</th>
                    <th>Child Sign</th>
                    <th>Person Sign</th>
                    <th>Staff Sign</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row["date"] . "</td>";
                        echo "<td>" . $row["name"] . "</td>";
                        echo "<td>" . $row["place"] . "</td>";
                        echo "<td>" . $row["purpose"] . "</td>";
                        echo "<td>" . $row["acc_person"] . "</td>";
                        echo "<td>" . $row["dep_date"] . "</td>";
                        echo "<td>" . $row["return_date"] . "</td>";
                        echo "<td>" . $row["remark"] . "</td>";
                        echo '<td><img src="' . ($row["child_sign"]) . '" alt="Photo " /></td>';
                        echo '<td><img src="' . ($row["person_sign"]) . '" alt="Photo " /></td>';
                        echo '<td><img src="' . ($row["staff_sign"]) . '" alt="Photo " /></td>';
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='11'>No records found</td></tr>";
                }
                $conn->close();
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>
