<?php
// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "nestdb";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Retrieve from data
    $name = $_POST['name'];
    $pass = $_POST['password'];

    // Prepare SQL statement with placeholders
    $sql = "SELECT * FROM login WHERE name='$name' AND password='$pass'";
    $result = $conn->query($sql);

    // Check if user exists and credentials are correct
    if ($result->num_rows == 1) {
        // Authentication successful
        // Start session and store user information if needed
        session_start();
        //$_SESSION['name'] = $name;
        
        // Redirect user to a different page
        header("Location: index.html");
        exit;
    } else {
        // Authentication failed
        $error = "Invalid username or password. Please try again.";
    }

    $conn->close();
}
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

    <title>NEST | Children's Village</title>

    <script>
        function validateForm() {
            var name = document.getElementById('name').value.trim();
            var password = document.getElementById('password').value;

            if (name === '' || phone === '' || password === '') {
                alert('Please fill in all fields.');
                return false; 
            }

            return true;
        }
    </script>

    <!-- Navigation Bar -->
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="#">NEST</a>
            </div>
            <ul class="nav navbar-nav">
                <li class="active"><a href="index_login.html">Home</a></li>
            </ul>
        </div>
    </nav>

</head>

<body>
    <div class="container">
        <h2>Login</h2>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <!--form onsubmit="return validateForm()"-->
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Enter your name" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password" required>
            </div>
            <button type="submit" class="btn btn-default">Submit</button>
        </form>
    </div>
</body>

</html>