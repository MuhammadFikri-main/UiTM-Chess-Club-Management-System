<?php
header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Method: POST");
header("Access-Control-Allow-Header: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods,Authorization");

// Include the database connection file
require '../../model/dbconn.php';

// Check the connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }

$title = $_POST["titleInputNew"];
$type = $_POST["typeInputNew"];
$descriptions = $_POST["descriptionsInputNew"];

$fileName = $_FILES['fileName']['name']; // The original name of the file
$fileType = $_FILES['fileName']['type']; // The MIME type of the file
$fileSize = $_FILES['fileName']['size']; // The size of the file in bytes
$tmpFilePath = $_FILES['fileName']['tmp_name']; // The temporary file path on the server
$errorCode = $_FILES['fileName']['error']; // Any error code associated with the file upload
$fileFolder = '../../upload-resources/'.$fileName;

$query = "INSERT INTO `resources` (`title`, `type`, `description`, `fileName`) 
          VALUES ('$title', '$type', '$descriptions', '$fileName')";

// Move the uploaded file to the desired folder
if (move_uploaded_file($tmpFilePath, $fileFolder)) {
  // Execute the query
  if (mysqli_query($conn, $query)) {
      echo "Data inserted successfully.";
      // Redirect back to the resources.php page
      header("Location: http://localhost/chess_club/admin/resources.php");
      exit();
  } else {
      echo "Error: " . $query . "<br>" . mysqli_error($conn);
  }
} else {
  echo "Error uploading file.";
}

?>
