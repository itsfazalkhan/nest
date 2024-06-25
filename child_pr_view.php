<?php
session_start();
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

    <title>Child Progress Report View</title>

    <style>
        table {
            border-collapse: collapse;
            width: 100%;
            margin-bottom: 50px;
        }
        th, td {
            border: 2px solid black;
            text-align: left;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
        }
        .container {
            margin-top: 20px;
        }
        .form-group {
            margin-bottom: 15px;
        }
        h3 {
            margin-top: 20px;
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
                <li class="active"><a href="child_pr_entry.html">Child Progress Report</a></li>
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
        <h2>View Child Progress Report</h2>
        <form action="child_pr_view.php" method="post">
            <div class="form-group">
                <label for="child_id">Child ID:</label>
                <input type="text" class="form-control" id="child_id" name="child_id" required>
                <label for="child_name">Child Name:</label>
                <input type="text" class="form-control" id="child_name" name="child_name" required>
            </div>
            <button type="submit" class="btn btn-default">Submit</button>
        </form>
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $servername = "localhost";
            $username = "root";
            $password = "";
            $database = "nestdb";

            $conn = new mysqli($servername, $username, $password, $database);

            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $child_id = $_POST['child_id'];
            $child_name = $_POST['child_name'];

            $stmt = $conn->prepare("SELECT * FROM child_details WHERE id = ? AND name = ?");
            $stmt->bind_param("is", $child_id, $child_name);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows == 0) {
                echo "<div class='alert alert-danger'>Invalid child ID or child name</div>";
            } else {
                echo "<h3>Child Details</h3>";
                echo "<table class='table table-bordered'>";
                echo "<tr><th>Child ID</th><th>Child Name</th></tr>";
                while ($row = $result->fetch_assoc()) {
                    echo "<tr><td>" . $row['id'] . "</td><td>" . $row['name'] . "</td></tr>";
                }
                echo "</table>";

                $stmt = $conn->prepare("SELECT * FROM academic WHERE child_id = ?");
                $stmt->bind_param("i", $child_id);
                $stmt->execute();
                $result = $stmt->get_result();

                if ($result->num_rows > 0) {
                    echo "<h3>Academic</h3>";
                    echo "<table class='table table-bordered'>";
                    echo "<tr><th>English</th><th>Maths</th><th>Science</th><th>Social Science</th><th>Physical Training</th><th>General Knowledge</th></tr>";
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr><td>" . $row['english'] . "</td><td>" . $row['maths'] . "</td><td>" . $row['science'] . "</td><td>" . $row['social_science'] . "</td><td>" . $row['physical_training'] . "</td><td>" . $row['general_knowledge'] . "</td></tr>";
                    }
                    echo "</table>";
                }

                $stmt = $conn->prepare("SELECT * FROM personality_development WHERE child_id = ?");
                $stmt->bind_param("i", $child_id);
                $stmt->execute();
                $result = $stmt->get_result();

                if ($result->num_rows > 0) {
                    echo "<h3>Personality Development</h3>";
                    echo "<table class='table table-bordered'>";
                    echo "<tr><th>Concentration</th><th>Curiosity</th><th>Initiative</th><th>Observation</th><th>Originality</th><th>Participation</th><th>Perseverance</th><th>Relationship</th><th>Responsibility</th><th>Self Confidence</th></tr>";
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr><td>" . $row['concentration'] . "</td><td>" . $row['curiosity'] . "</td><td>" . $row['initiative'] . "</td><td>" . $row['observation'] . "</td><td>" . $row['originality'] . "</td><td>" . $row['participation'] . "</td><td>" . $row['perseverance'] . "</td><td>" . $row['relationship'] . "</td><td>" . $row['responsibility'] . "</td><td>" . $row['self_confidence'] . "</td></tr>";
                    }
                    echo "</table>";
                }

                $stmt = $conn->prepare("SELECT * FROM co_curricular_activities WHERE child_id = ?");
                $stmt->bind_param("i", $child_id);
                $stmt->execute();
                $result = $stmt->get_result();

                if ($result->num_rows > 0) {
                    echo "<h3>Co Curricular Activities</h3>";
                    echo "<table class='table table-bordered'>";
                    echo "<tr><th>Art</th><th>Assembly</th><th>Craft</th><th>Drama</th><th>Dance</th><th>Debate</th><th>Drill</th><th>Games</th><th>Quiz</th><th>Singing</th></tr>";
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr><td>" . $row['art'] . "</td><td>" . $row['assembly'] . "</td><td>" . $row['craft'] . "</td><td>" . $row['drama'] . "</td><td>" . $row['dance'] . "</td><td>" . $row['debate'] . "</td><td>" . $row['drill'] . "</td><td>" . $row['games'] . "</td><td>" . $row['quiz'] . "</td><td>" . $row['singing'] . "</td></tr>";
                    }
                    echo "</table>";
                }

                $stmt = $conn->prepare("SELECT * FROM behaviour_attitude WHERE child_id = ?");
                $stmt->bind_param("i", $child_id);
                $stmt->execute();
                $result = $stmt->get_result();

                if ($result->num_rows > 0) {
                    echo "<h3>Behaviour and Attitude</h3>";
                    echo "<table class='table table-bordered'>";
                    echo "<tr><th>Accommodating Adjusting</th><th>Compassion</th><th>Emotional Stability</th><th>Hygiene</th><th>Overcoming Lures</th><th>Punctuality</th><th>Social Awareness</th><th>Secular Outlook</th></tr>";
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr><td>" . $row['accommodating_adjusting'] . "</td><td>" . $row['compassion'] . "</td><td>" . $row['emotional_stability'] . "</td><td>" . $row['hygiene'] . "</td><td>" . $row['overcoming_lures'] . "</td><td>" . $row['punctuality'] . "</td><td>" . $row['social_awareness'] . "</td><td>" . $row['secular_outlook'] . "</td></tr>";
                    }
                    echo "</table>";
                }
            }

            $stmt->close();
            $conn->close();
        }
        ?>
    </div>
</body>

</html>
