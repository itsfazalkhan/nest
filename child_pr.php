<?php
// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();

// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "";
$database = "nestdb";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve form data
$child_id = $_POST['child_id'];
$child_name = $_POST['child_name'];

// Check if child_id and child_name exist in the child_details table
$stmt = $conn->prepare("SELECT * FROM child_details WHERE id = ? AND name = ?");
$stmt->bind_param("is", $child_id, $child_name);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows == 0) {
    $_SESSION['message'] = "Invalid child ID or child name";
    $_SESSION['msg_type'] = "danger";
    header("Location: child_pr_entry.html");
    exit();
}

// Retrieve and insert academic data
$english = $_POST['english'];
$maths = $_POST['maths'];
$science = $_POST['science'];
$social_science = $_POST['social_science'];
$physical_training = $_POST['physical_training'];
$general_knowledge = $_POST['general_knowledge'];

$stmt = $conn->prepare("INSERT INTO academic (child_id, child_name, english, maths, science, social_science, physical_training, general_knowledge) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("isssssss", $child_id, $child_name, $english, $maths, $science, $social_science, $physical_training, $general_knowledge);
$stmt->execute();

// Retrieve and insert personality development data
$concentration = $_POST['concentration'];
$curiosity = $_POST['curiosity'];
$initiative = $_POST['initiative'];
$observation = $_POST['observation'];
$originality = $_POST['originality'];
$participation = $_POST['participation'];
$perseverance = $_POST['perseverance'];
$relationship = $_POST['relationship'];
$responsibility = $_POST['responsibility'];
$self_confidence = $_POST['self_confidence'];

$stmt = $conn->prepare("INSERT INTO personality_development (child_id, child_name, concentration, curiosity, initiative, observation, originality, participation, perseverance, relationship, responsibility, self_confidence) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("isssssssssss", $child_id, $child_name, $concentration, $curiosity, $initiative, $observation, $originality, $participation, $perseverance, $relationship, $responsibility, $self_confidence);
$stmt->execute();

// Retrieve and insert behaviour and attitude data
$art = $_POST['art'];
$assembly = $_POST['assembly'];
$craft = $_POST['craft'];
$drama = $_POST['drama'];
$dance = $_POST['dance'];
$debate = $_POST['debate'];
$drill = $_POST['drill'];
$games = $_POST['games'];
$quiz = $_POST['quiz'];
$singing = $_POST['singing'];

$stmt = $conn->prepare("INSERT INTO co_curricular_activities (child_id, child_name, art, assembly, craft, drama, dance, debate, drill, games, quiz, singing) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("isssssssssss", $child_id, $child_name, $art, $assembly, $craft, $drama, $dance, $debate, $drill, $games, $quiz, $singing);
$stmt->execute();

// Retrieve and insert co-curricular activities data
$accommodating_adjusting = $_POST['accommodating_adjusting'];
$compassion = $_POST['compassion'];
$emotional_stability = $_POST['emotional_stability'];
$hygiene = $_POST['hygiene'];
$overcoming_lures = $_POST['overcoming_lures'];
$punctuality = $_POST['punctuality'];
$social_awareness = $_POST['social_awareness'];
$secular_outlook = $_POST['secular_outlook'];

$stmt = $conn->prepare("INSERT INTO behaviour_attitude (child_id, child_name, accommodating_adjusting, compassion, emotional_stability, hygiene, overcoming_lures, punctuality, social_awareness, secular_outlook) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("isssssssss", $child_id, $child_name, $accommodating_adjusting, $compassion, $emotional_stability, $hygiene, $overcoming_lures, $punctuality, $social_awareness, $secular_outlook);
$stmt->execute();


$_SESSION['message'] = "Progress report data saved successfully!";
$_SESSION['msg_type'] = "success";

// Close statements and connection
$stmt->close();
$conn->close();

// Redirect back to the form page
header("Location: child_pr_entry.html");
exit();
?>
