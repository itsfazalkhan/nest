<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NEST | Child Details Entry</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="style.css">
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
                <li class="dropdown active">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">Child Details
                        <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="child_details_entry.html">Entry</a></li>
                        <li><a href="child_details_view.html">View</a></li>
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
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">Child Progress Report
                        <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="child_progress_report_entry.html">Entry</a></li>
                        <li><a href="child_progress_report_view.html">View</a></li>
                    </ul>
                </li>
                <li><a href="volunteer_register.html">Volunteer Register</a></li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">Children Stock/Distribution
                        <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="child_stock_register.html">Stock Entry</a></li>
                        <li><a href="child_distribution_register.html">Distribution</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">Movement
                        <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="child_movement_register.html">Children's Movement</a></li>
                        <li><a href="staff_movement_register.html">Staff Movement</a></li>
                    </ul>
                </li>
                <li><a href="parent_meeting_register.html">Parents Meeting</a></li>
            </ul>
        </div>
    </nav>

    <div class="container">
        <h2>Child Details Entry</h2>
        <form id="childDetailsForm" method="post">
            <div class="form-group">
                <label for="childName">Child's Name:</label>
                <input type="text" class="form-control" id="childName" name="childName">
            </div>
            <button type="submit" class="btn btn-default" name="searchBtn">Search</button>
        </form>

        <?php
        // Database connection
        $servername = "your_servername";
        $username = "your_username";
        $password = "your_password";
        $dbname = "your_database";

        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Handling form submission
        if(isset($_POST['searchBtn'])) {
            $childName = $_POST['childName'];
            $sql = "SELECT * FROM child_details WHERE name = '$childName'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                echo "<h3>Child Details:</h3>";
                while($row = $result->fetch_assoc()) {
                    echo "<p>Admission Number: " . $row["admission_number"]. "</p>";
                    echo "<p>Date of Admission: " . $row["date_of_admission"]. "</p>";
                    echo "<p>Age: " . $row["age"]. "</p>";
                    echo "<p>Sex: " . $row["sex"]. "</p>";
                    echo "<p>Religion". $row["religion"]. "</p>";
                    echo "<p>Language". $row["language"]. "</p>";
                    echo "<p>Permanent Address". $row["per_add"]. "</p>";
                    echo "<p>Present Address". $row["pre_add"]. "</p>";
                    echo "<p>Phone Number". $row["phone"]. "</p>";
                    echo "<p>Aadhaar Number". $row["aadhaar"]. "</p>";

                    // Fetching family constellation data
                    $sql_family = "SELECT * FROM family_constellation";
                    $result_family = $conn->query($sql_family);

                    if ($result_family->num_rows > 0) {
                        // Outputting table structure
                        echo "<h3>Family Constellation:</h3>";
                        echo "<table class='table'>";
                        echo "<thead>";
                        echo "<tr>";
                        echo "<th>Name</th>";
                        echo "<th>Relation</th>";
                        echo "<th>Age</th>";
                        echo "<th>Occupation</th>";
                        echo "<th>Education</th>";
                        echo "<th>Alive/Dead</th>";
                        echo "<th>Remarks</th>";
                        echo "</tr>";
                        echo "</thead>";
                        echo "<tbody>";
                        // Outputting data rows
                        while($row_family = $result_family->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>".$row_family["name"]."</td>";
                            echo "<td>".$row_family["relation"]."</td>";
                            echo "<td>".$row_family["age"]."</td>";
                            echo "<td>".$row_family["occupation"]."</td>";
                            echo "<td>".$row_family["education"]."</td>";
                            echo "<td>".$row_family["alive_dead"]."</td>";
                            echo "<td>".$row_family["remarks"]."</td>";
                            echo "</tr>";
                        }
                        echo "</tbody>";
                        echo "</table>";
                    } else {
                        echo "No child details found";
                    }
                }
            } else {
                echo "Invalid Entry";
            }
        }