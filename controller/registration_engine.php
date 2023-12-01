<?php
header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Method: POST");
header("Access-Control-Allow-Header: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods,Authorization");

// Include the database connection file
require "../model/dbconn.php";

// Check the connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }

$firstName = $_POST["firstName"];
$lastName = $_POST["lastName"];
$email = $_POST["email"];
$password = $_POST["password"];
$roleID = $_POST["accType"];

$query = "INSERT INTO `user` (`firstName`, `lastName`, `email`, `password`, `roleID`) 
          VALUES ('$firstName', '$lastName', '$email', '$password', '$roleID')";

//$result = mysqli_query($conn, $query) or die("Insert Query Failed");

// Execute the query
if (mysqli_query($conn, $query)) {
  echo '
  <script type="text/javascript">
    window.onload = function () { alert("Welcome at c-sharpcorner.com."); }
  </script>';
  // Redirect back to the test-data.php page
  header("Location: http://localhost/chess_club/login.php");
  exit();
} else {
  echo "Error: " . $query . "<br>" . mysqli_error($conn);
}
?>
