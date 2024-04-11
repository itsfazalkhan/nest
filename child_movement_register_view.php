<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NEST | Child Movement Register</title>
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
                <li class="dropdown">
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
                <li class="active" class="dropdown">
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
        <h2>Child Movement Register</h2>
        <form id="childMovementForm">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" id="name" name="name">
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
            $name = $_POST['name'];
            $sql = "SELECT * FROM child_movement WHERE name = '$name'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                echo "<h3>Child Movement Details:</h3>";
                while($row = $result->fetch_assoc()) {
                    echo "<p>Date: " . $row["date"]. "</p>";
                    echo "<p>Place: " . $row["place"]. "</p>";
                    echo "<p>Purpose: " . $row["purpose"]. "</p>";
                    echo "<p>Accompanied Person: " . $row["accompanied"]. "</p>";
                    echo "<p>Departure Date: " . $row["departure_date"]. "</p>";
                    echo "<p>Return Date: " . $row["return_date"]. "</p>";
                    echo "<p>Remark: " . $row["remark"]. "</p>";
                    echo "<p>Child's Sign (Image): <img src='" . $row["child_sign"] . "' alt='Child Sign'></p>";
                    echo "<p>Person's Sign (Image): <img src='" . $row["person_sign"] . "' alt='Person Sign'></p>";
                    echo "<p>Staff's Sign (Image): <img src='" . $row["staff_sign"] . "' alt='Staff Sign'></p>";
                }
            } else {
                echo "No child movement details found for the given name.";
            }
        }
        ?>
    </div>

    <script>
        $(document).ready(function () {
            $("#childMovementForm").submit(function (event) {
                event.preventDefault();
                alert("Data saved successfully!");
            });
        });
    </script>

</body>

</html>