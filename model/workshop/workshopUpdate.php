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

$title = $_POST['titleInput'];
$date = $_POST["dateInput"];
$location = $_POST["locationInput"];
$descriptions = $_POST["descriptionsInput"];
$workshopID = $_POST["workshopIdInput"];

$query = "UPDATE `workshop` 
          SET   title = '".$title."',
                date = '".$date."',
                location = '".$location."',
                description = '".$descriptions."'
            WHERE workshopID = " . $workshopID;

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
