<?php
header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Method: POST");
header("Access-Control-Allow-Header: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods,Authorization");

// Include the database connection file
require "../../model/dbconn.php";

session_start();

// Check the connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }

$accRole = $_SESSION['role'];

$date = $_POST["dateInputNew"];
$time = $_POST["timeInputNew"];
$coach = $_POST["coachInputNew"];
$member = $_POST["userInputNew"];

$query = "INSERT INTO `class` (`date`, `sessionID`, `coachID`, `userID`) 
          VALUES ('$date', '$time', '$coach', '$member')";

//$result = mysqli_query($conn, $query) or die("Insert Query Failed");

// Execute the query
if (mysqli_query($conn, $query)) {
  echo "Data inserted successfully.";
  if($accRole == "admin"){
    header("Location: http://localhost/chess_club/admin/class.php");
    exit();
  }else{
    header("Location: http://localhost/chess_club/user/m-class.php");
    exit();
  }
} else {
  echo "Error: " . $query . "<br>" . mysqli_error($conn);
}
?>
