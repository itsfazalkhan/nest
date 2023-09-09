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
  <h2>Child progress report
        </h2>
<form action="/action_page.php">
  <label for="img">Select image:</label>
  <input type="file" id="img" name="img" accept="image/*">
  <input type="submit">
</form>
         <label
for="name">photo :</label>
          <input
type="text" id="dob" date="dob">
          <br><br>
           <label
for="name">year:</label>
          <input
type="text" id="dob" name="dob">
          <br><br>
<form action="/action_page.php">
  <label for="img">Select image:</label>
  <input type="file" id="img" name="img" accept="image/*">
  <input type="submit">
</form>
         <label
for="name">photo :</label>
          <input
type="text" id="dob" date="dob">
          <br><br>
           <label
for="name">year:</label>
          <input
type="text" id="dob" name="dob">
          <br><br>
<form action="/action_page.php">
  <label for="img">Select image:</label>
  <input type="file" id="img" name="img" accept="image/*">
  <input type="submit">
</form>
         <label
for="name">photo :</label>
          <input
type="text" id="dob" date="dob">
          <br><br>
<h2>Academic </h2>
           <label
for="name">year:</label>
          <input
type="text" id="dob" name="dob">
       <br><br>
        <label for="name">L1:</label>
          <input
type="text" id="l1" name="l1">
          <br><br>
           <label
for="name">L2:</label>
          <input
type="text" id="l2" name="l2">
          <br><br>
           <label
for="name">L3:</label>
          <input
type="text" id="l3" name="l3">
          <br><br>
           <label
for="name">MS:</label>
          <input
type="text" id="ms" name="ms">
          <br><br>
           <label
for="name">SC:</label>
          <input
type="text" id="sc" name="sc">
          <br><br>
           <label
for="name">SS:</label>
          <input
type="text" id="ss" name="ss">
          <br><br>
           <label
for="name">PT:</label>
          <input
type="text" id="pt" name="pt">
          <br><br>
           <label
for="name">GK:</label>
          <input
type="text" id="gk" name="gk">
          <br><br>
           <label for="name">Comments:</label>
          <input
type="text" id="com" name="com">
          <br><br>
          <input type="submit" value="Submit">
           <h2">Personal development:</h2>
        <label for="name">year:</label>
          <input
type="text" id="ye" name="ye">
          <br><br>
         <label for="name">CO:</label>
          <input
type="text" id="co" name="co">
          <br><br>
           <label
for="name">CU:</label>
          <input
type="text" id="cu" name="cu">
          <br><br>
           <label
for="name">IN:</label>
          <input
type="text" id="in" name="in">
          <br><br>
           <label
for="name">OB:</label>
          <input
type="text" id="ob" name="ob">
          <br><br>
           <label
for="name">OR:</label>
          <input
type="text" id="or" name="or">
          <br><br>
           <label
for="name">PA:</label>
          <input
type="text" id="pa" name="pa">
          <br><br>
           <label
for="name">PE:</label>
          <input
type="text" id="pe" name="pe">
          <br><br>
           <label
for="name">RL:</label>
          <input
type="text" id="rl" name="rl">

           <label
for="name">Comments:</label>
          <input
type="text" id="com" name="com">
          <br><br>
          <input type="submit" value="Submit">

           <h2">Co
curricular Activites:</h2>
 
        <label for="name">year:</label>
          <input
type="text" id="dob" name="dob">
          <br><br>
           <label
for="name">AR:</label>
          <input
type="text" id="dob" name="dob">
          <br><br>
           <label
for="name">AS:</label>
          <input
type="text" id="dob" name="">
          <br><br>
           <label
for="name">CR:</label>
          <input
type="text" id="dob" name="">
          <br><br>
           <label
for="name">DR:</label>
          <input
type="text" id="dob" name="">
          <br><br>
           <label
for="name">DC:</label>
          <input
type="text" id="dob" name="">
          <br><br>
           <label
for="name">DE:</label>
          <input
type="text" id="dob" name="">
          <br><br>
           <label
for="name">Drl:</label>
          <input
type="text" id="dob" name="">
          <br><br>
           <label
for="name">EL:</label>
          <input
type="text" id="dob" name="">
          <br><br>
           <label
for="name">GA:</label>
          <input
type="text" id="dob" name="">
          <br><br>
        <label for="name">OZ:</label>
          <input
type="text" id="dob" name="">
          <br><br>
        <label for="name">SG:</label>
          <input
type="text" id="sg" name="">
          <br><br>
           <label for="name">Comments:</label>
          <input
type="text" id="com" name="com">
          <br><br>
          <input type="submit" value="Submit">
      <h2>Co-curricular activites</h2>
      <label for="name">AA:</label>
          <input
type="text" id="aa" name="aa">
          <br><br>
           <label
for="name">Com:</label>
          <input
type="text" id="com" name="com">
          <br><br>
           <label
for="name">ES:</label>
          <input
type="text" id="es" name="es">
          <br><br>
           <label
for="name">HY:</label>
          <input
type="text" id="hy" name="hy">
          <br><br>
           <label
for="name">OL:</label>
          <input
type="text" id="ol" name="ol">
          <br><br>
           <label
for="name">PNC:</label>
          <input
type="text" id="pnc" name="pnc">
          <br><br>
           <label
for="name">SA:</label>
          <input
type="text" id="sa" name="sa">
          <br><br>
           <label
for="name">SO:</label>
          <input
type="text" id="so" name="so">
          <br><br>
           <label for="name">Comments:</label>
          <input
type="text" id="com" name="com">
          <br><br>
          <input type="submit" value="Submit">
    </body>
    </main>
