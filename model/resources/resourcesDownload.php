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

$userId = $_GET["userId"];
$resId = $_GET["resId"];
$fileName = $_GET['fileName'];
$downloadInfo = date("Y-m-d");

// Assuming $fileName contains the name of the file you want to download
$filePath = '../../upload-resources/' . $fileName;

// Check if the file exists
if (file_exists($filePath)) {
    // Set the appropriate headers
    header("Content-Type: application/octet-stream");
    header("Content-Transfer-Encoding: Binary");
    header("Content-Disposition: attachment; filename=\"" . basename($filePath) . "\"");

    // Read the file and output it to the user
    readfile($filePath);
} else {
    echo "File not found.";
}

$query = "INSERT INTO `userresources` (`resourcesID`, `userID`, `downloadInfo`) 
          VALUES ('$resId', '$userId', '$downloadInfo')";

// Execute the query
if (mysqli_query($conn, $query)) {
    echo "Data inserted successfully.";
    // Redirect back to the m-resources.php page
    header("Location: ../../user/m-resources.php");
    exit();
} else {
    echo "Error: " . $query . "<br>" . mysqli_error($conn);
}


?>
