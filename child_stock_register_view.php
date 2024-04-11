<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NEST | Children's Stock Register</title>
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
                        <li><a href="medicine_stock_entry.html">Medicine Stock Entry</a></li>
                        <li><a href="medicine_stock_view.html">Medicine Stock View</a></li>
                        <li><a href="medicine_used_entry.html">Medicine Used Entry</a></li>
                        <li><a href="medicine_used_view.html">Medicine Used View</a></li>
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
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">Volunteer Register
                        <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="volunteer_register_entry.html">Entry</a></li>
                        <li><a href="volunteer_register_view.html">View</a></li>
                    </ul>
                </li>
                <li class="active" class="dropdown">
                  <a class="dropdown-toggle" data-toggle="dropdown" href="#">Children Stock/Distribution
                      <span class="caret"></span>
                  </a>
                  <ul class="dropdown-menu">
                      <li><a href="child_stock_register_entry.html">Stock Entry</a></li>
                      <li><a href="child_stock_register_view.html">Stock View</a></li>
                      <li><a href="child_distribution_register_entry.html">Distribution Entry</a></li>
                      <li><a href="child_distribution_register_view.html">Distribution View</a></li>
                  </ul>
                </li>
                <li class="dropdown">
                  <a class="dropdown-toggle" data-toggle="dropdown" href="#">Movement
                      <span class="caret"></span>
                  </a>
                  <ul class="dropdown-menu">
                      <li><a href="child_movement_register_entry.html">Children's Movement Entry</a></li>
                      <li><a href="child_movement_register_view.html">Children's Movement View</a></li>
                      <li><a href="staff_movement_register_entry.html">Staff Movement Entry</a></li>
                      <li><a href="staff_movement_register_view.html">Staff Movement View</a></li>
                  </ul>
                </li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">Parents Meeting
                        <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="parent_meeting_register_entry.html">Parents Meeting Entry</a></li>
                        <li><a href="parent_meeting_register_view.html">Parents Meeting View</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
    <div class="container">
        <h2>Children's Stock Register</h2>
        <form id="childStockForm" method="post">
            <div class="form-group">
                <label for="date">Date:</label>
                <input type="date" class="form-control" id="date" name="date">
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
            $date = $_POST['date'];
            $sql = "SELECT * FROM children_stock WHERE date = '$date'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                echo "<h3>Stock Details for $date:</h3>";
                echo "<table class='table'>";
                echo "<thead>";
                echo "<tr>";
                echo "<th>Date</th>";
                echo "<th>Particulars</th>";
                echo "<th>Received From</th>";
                echo "<th>Received Quantity</th>";
                echo "<th>Issued Quantity</th>";
                echo "<th>Balance Quantity</th>";
                echo "</tr>";
                echo "</thead>";
                echo "<tbody>";
                while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>".$row["date"]."</td>";
                    echo "<td>".$row["particulars"]."</td>";
                    echo "<td>".$row["received_from"]."</td>";
                    echo "<td>".$row["received_quantity"]."</td>";
                    echo "<td>".$row["issued_quantity"]."</td>";
                    echo "<td>".$row["balance_quantity"]."</td>";
                    echo "</tr>";
                }
                echo "</tbody>";
                echo "</table>";
            } else {
                echo "No stock details found for $date";
            }
        }
        ?>
    </div>

    <script>
        $(document).ready(function () {
            $("#childStockForm").submit(function (event) {
                event.preventDefault();
                // AJAX request for form submission can be added here
                alert("Data fetched successfully!");
            });
        });
    </script>
</body>

</html>