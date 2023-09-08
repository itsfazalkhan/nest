<?php
// Set up database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "nest";

$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $serial = $_POST["serial"];
  $admission = $_POST["Admission"];
  $name = $_POST["name"];
  $location = $_POST["location"];
  $contact = $_POST["contact"];
  $dob = $_POST["dob"];
  $pb = $_POST["pb"];
  $dst = $_POST["dst"];
  $nt = $_POST["nt"];
  $rl = $_POST["rl"];
  $ct = $_POST["ct"];
  $sc = $_POST["sc"];
  $im = $_POST["im"];
  $blood_group = $_POST["blood_group"];
  $weight = $_POST["weight"];
  $height = $_POST["height"];
  $general_health = $_POST["general_health"];
  $shape_of_face = $_POST["shape_of_face"];
  $body_type = $_POST["body_type"];
  $date_of_admission = $_POST["date_of_admission"];
  $admitted_to_class = $_POST["admitted_to_class"];
  $section = $_POST["section"];
  $referred_by = $_POST["referred_by"];

  // Insert form data into database
  $sql = "INSERT INTO students (serial, admission, name, location, contact, dob, pb, dst, nt, rl, ct, sc, im, blood_group, weight, height, general_health, shape_of_face, body_type, date_of_admission, admitted_to_class, section, referred_by)
  VALUES ('$serial', '$admission', '$name', '$location', '$contact', '$dob', '$pb', '$dst', '$nt', '$rl', '$ct', '$sc', '$im', '$blood_group', '$weight', '$height', '$general_health', '$shape_of_face', '$body_type', '$date_of_admission', '$admitted_to_class', '$section', '$referred_by')";
  if (mysqli_query($conn, $sql)) {
    echo "New student registered successfully";
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }
}

mysqli_close($conn);
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Orphanage Registry System</title>
    <style>
      /* Add global styles */
      body {
        font-family: Arial, sans-serif;
        background-color: #F2F2F2;
        background-image: url('https://www.google.com/url?sa=i&url=https%3A%2F%2Fpeacegospel.org%2Fcase-study-india-an-orphans-story-in-his-own-words%2F&psig=AOvVaw2-zi6ldSrV-NO-eYnZeO1o&ust=1677573745243000&source=images&cd=vfe&ved=0CBAQjRxqFwoTCOibtJ6ntf0CFQAAAAAdAAAAABAD');
      }
      
      /* Add styles for header and navigation */
      header {
        background-color: #333;
        color: #fff;
        padding: 20px;
      }
      
      nav ul {
        list-style: none;
        margin: 0;
        padding: 0;
        display: flex;
      }
      
      nav a {
        color: #fff;
        text-decoration: none;
        padding: 10px 20px;
        display: block;
      }
      
      /* Add styles for main content */
      main {
        padding: 20px;
      }
      
      /* Add styles for table */
      table {
        width: 100%;
        border-collapse: collapse;
      }
      
      th, td {
        border: 1px solid #333;
        padding: 8px;
        text-align: left;
      }
      
      th {
        background-color: #333;
        color: #fff;
      }
      
      /* Add styles for form */
      form {
        width: 60%;
        margin: 0 auto;
        padding: 20px;
        background-color: #fff;
        border: 1px solid #333;
        border-radius: 10px;
      }
      
      label {
        display: block;
        margin-bottom: 10px;
      }
      
      input[type="text"] {
        width: 100%;
        padding: 10px;
        font-size: 14px;
        border: 1px solid #333;
        border-radius: 5px;
        margin-bottom: 20px;
      }
      
      input[type="submit"] {
        width: 100%;
        padding: 10px;
        background-color: #333;
        color: #fff;
        border: none;
        border-radius: 5px;
        cursor: pointer;
      }
      
      /* Add styles for footer */
      footer {
        background-color: #333;
        color: #fff;
        padding: 10px;
        text-align: center;
      }
    </style>
  </head>
  <body>
    <main>
<h2>Children’s Distribution Register
        </h2>
         <label
for="name">date :</label>
          <input
type="date" id="dob" name="dob">
          <br><br>
           <label
for="name">Statinory:</label>
          <input
type="text" id="stat" name="stat">
          <br><br>
           <label
for="name">Cosmetics:</label>
          <input
type="text" id="cos" name="cos">
          <br><br>
           <label
for="name">Clothing:</label>
          <input
type="text" id="clo" name="clo">
          <br><br>
           <label
for="name">Toiletry:</label>
          <input
type="text" id="toi" name="toi">
          <br><br>
          <input
type="submit" value="Submit">
    </body>
    </main>

