<?php
header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Method: POST");
header("Access-Control-Allow-Header: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods,Authorization");

// Include the database connection file
require "../../model/dbconn.php";

// Check the connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }

$name = $_POST['nameInput'];
$spec = $_POST["specInput"];
$email = $_POST["emailInput"];
$contact = $_POST["contactInput"];
$coachID = $_POST["coachIdInput"];

$query = "UPDATE `coach` 
          SET   name = '".$name."',
                specialization = '".$spec."',
                email = '".$email."',
                contactNumber = '".$contact."'
            WHERE coachID = " . $coachID;

// Execute the query
if (mysqli_query($conn, $query)) {
  echo "Data inserted successfully.";
  // Redirect back to the test-data.php page
  header("Location: http://localhost/chess_club/admin/coach.php");
  exit();
} else {
  echo "Error: " . $query . "<br>" . mysqli_error($conn);
}
?>
