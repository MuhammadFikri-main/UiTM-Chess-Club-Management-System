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

$title = $_POST['titleInput'];
$type = $_POST["typeInput"];
$descriptions = $_POST["descriptionsInput"];
$resourcesID = $_POST["resourcesIdInput"];

$query = "UPDATE `resources` 
          SET   title = '".$title."', type = '".$type."',
                description = '".$descriptions."'
          WHERE resourcesID = " . $resourcesID;

$oldFileName = $_POST['oldFileName'];
$fileName = $_FILES['fileName']['name']; // The original name of the file
$fileType = $_FILES['fileName']['type']; // The MIME type of the file
$fileSize = $_FILES['fileName']['size']; // The size of the file in bytes
$tmpFilePath = $_FILES['fileName']['tmp_name']; // The temporary file path on the server
$errorCode = $_FILES['fileName']['error']; // Any error code associated with the file upload
$fileFolder = '../../upload-resources/'.$fileName;

if(!empty($fileName)){
  $update_fileName = $conn->prepare("UPDATE `resources` SET fileName = ? WHERE resourcesID = ?");
  $update_fileName->execute([$fileName, $resourcesID]);
}

// Move the uploaded file to the desired folder
if (move_uploaded_file($tmpFilePath, $fileFolder)) {

  unlink('../../upload-resources/'.$oldFileName);
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
