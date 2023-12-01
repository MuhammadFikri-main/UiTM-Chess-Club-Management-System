<?php
header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Method: POST");
header("Access-Control-Allow-Header: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods,Authorization");

// Include the database connection file
// require "$_SERVER[DOCUMENT_ROOT]" . "/ict600/chess_club/model/dbconn.php";
require "../../model/dbconn.php";

// Check the connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }

$title = $_POST["titleInputNew"];
$date = $_POST["dateInputNew"];
$location = $_POST["locationInputNew"];
$descriptions = $_POST["descriptionsInputNew"];

$query = "INSERT INTO `workshop` (`title`, `date`, `location`, `description`) 
          VALUES ('$title', '$date', '$location', '$descriptions')";

//$result = mysqli_query($conn, $query) or die("Insert Query Failed");

// Execute the query
if (mysqli_query($conn, $query)) {
  echo "Data inserted successfully.";
  // Redirect back to the test-data.php page
  header("Location: http://localhost/chess_club/admin/workshop.php");
  exit();
} else {
  echo "Error: " . $query . "<br>" . mysqli_error($conn);
}
?>
