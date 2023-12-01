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

$dateInput = $_POST['dateInput'];
$classIdInput = $_POST["classIdInput"];

$query = "UPDATE `class` 
          SET   date = '".$dateInput."'
            WHERE classID = " . $classIdInput;

// Execute the query
if (mysqli_query($conn, $query)) {
  echo "Data inserted successfully.";
  // Redirect back to the test-data.php page
  header("Location: http://localhost/chess_club/admin/class.php");
  exit();
} else {
  echo "Error: " . $query . "<br>" . mysqli_error($conn);
}
?>
