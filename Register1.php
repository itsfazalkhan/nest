<?php
// Set up database connection
$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "database_name";

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
    <header>
      <nav>
        <ul>
          <li><a href="#home">Home</a></li>
          <li><a href="#about">About</a></li>
          <li><a href="#orphanages">Register 1</a></li>
          <li><a href="#register">Register 2</a></li>
          <li><a href="#register">Register 3</a></li>
          <li><a href="#register">Register 4</a></li>
          <li><a href="#register">Register 5</a></li>
          <li><a href="#register">Register 6</a></li>
          <li><a href="#register">Register 7</a></li>
        </ul>
      </nav>
    </header>
    <main>
      <section id="home">
        <h1>Welcome to the Orphanage Registry System</h1>
        <p>The Orphan Project is developed mainly for orphan home center to manage the orphan registration and maintenance. It is a standalone system which only can be access on a single computer which the system resides. The system is developed based on the center's size and requirements. The main users of the system are the staffs and administrator or manager. The registration process of the orphans is managed by the staffs while the system administrator is only involved in managing the staff record and maintenance. Only administrator has the authority and privileges to do the system maintenance such as backup and recovery if there is system failure. </p>
      </section>
      <section id="about">
        <h2>About the Orphanage Registry System</h2>
        <p>The Orphan Project is developed mainly for orphan home center to manage the orphan registration and maintenance. It is a standalone system which only can be access on a single computer which the system resides. The system is developed based on the center's size and requirements. The main users of the system are the staffs and administrator or manager. The registration process of the orphans is managed by the staffs while the system administrator is only involved in managing the staff record and maintenance. Only administrator has the authority and privileges to do the system maintenance such as backup and recovery if there is system failure. </p>
      </section>
      <!--<section id="orphanages">
        <h2>List of Registered Orphanages</h2>
        <table>
          <tr>
            <th>Name</th>
            <th>Location</th>
            <th>Contact</th>
          </tr>
          <tr>
            <td>Orphanage 1</td>
            <td>Location 1</td>
            <td>Contact 1</td>
          </tr>
          <tr>
            <td>Orphanage 2</td>
            <td>Location 2</td>
            <td>Contact 2</td>
          </tr>
        </table>
      </section>
    -->
      <section id="register">
        <h2>Register a New Student
        </h2>
        <form action="#">
          <label for="name">Serial No:</label>
          <input type="text" id="serial" name="serial">
          <br><br>
          <label for="name">Admission No:</label>
          <input type="text" id="Admission" name="Admission">
          <br><br>
          <label for="name">Name of the Child:</label>
          <input type="text" id="name" name="name">
          <br><br>
          <label for="location">Location:</label>
          <input type="text" id="location" name="location">
          <br><br>
          <label for="contact">Contact:</label>
          <input type="text" id="contact" name="contact">
          <br><br>
          <label for="name">Date of Birth:</label>
          <input type="text" id="dob" name="dob">
          <br><br>
          <label for="name">Place of Birth:</label>
          <input type="text" id="pb" name="pb">
          <br><br>
          <label for="name">District/State:</label>
          <input type="text" id="dst" name="dst">
          <br><br>
          <label for="name">Nationality:</label>
          <input type="text" id="nt" name="nt">
          <br><br>
          <label for="name">Religion:</label>
          <input type="text" id="rl" name="rl">
          <br><br>
          <label for="name">Caste:</label>
          <input type="text" id="ct" name="ct">
          <br><br>
          <label for="name">SC/ST:</label>
          <input type="text" id="sc" name="sc">
          <br><br>
          <label for="name">Identification Marks:</label>
          <input type="text" id="im" name="im">
          <br><br>

          <h2>Health Details
        </h2>
         <label for="name">Blood Group:</label>
          <input type="text" id="dob" name="dob">
          <br><br>
           <label for="name">Weight:</label>
          <input type="text" id="dob" name="dob">
          <br><br>
           <label for="name">Height:</label>
          <input type="text" id="dob" name="dob">
          <br><br>
           <label for="name">General Health:</label>
          <input type="text" id="dob" name="dob">
          <br><br>
           <label for="name">Shape of Face:</label>
          <input type="text" id="dob" name="dob">
          <br><br>
           <label for="name">Body Type:</label>
          <input type="text" id="dob" name="dob">
          <br><br>
          <h2>Admission Details
        </h2>
           <label for="name">Date of admission:</label>
          <input type="text" id="dob" name="dob">
          <br><br>
           <label for="name">Admitted to class:</label>
          <input type="text" id="dob" name="dob">
          <br><br>
           <label for="name">Section:</label>
          <input type="text" id="dob" name="dob">
          <br><br>
           <label for="name">Reffered by:</label>
          <input type="text" id="dob" name="dob">
          <br><br>
          <input type="submit" value="Submit">
        </form>
      </section>
    </main>

  </body>
</html>
