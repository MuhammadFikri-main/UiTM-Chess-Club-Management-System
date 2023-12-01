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

$name = $_POST["nameInputNew"];
$spec = $_POST["specInputNew"];
$email = $_POST["emailInputNew"];
$contact = $_POST["contactInputNew"];

$query = "INSERT INTO `coach` (`name`, `specialization`, `email`, `contactNumber`) 
          VALUES ('$name', '$spec', '$email', '$contact')";

//$result = mysqli_query($conn, $query) or die("Insert Query Failed");

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
