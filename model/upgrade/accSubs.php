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

$roleId = $_POST["roleId"];
$userId = $_POST["userId"];

echo $roleId;
echo $userId;

$query="UPDATE `user` 
        SET  roleID = (SELECT roleID FROM roles WHERE role='".$roleId."')
        WHERE userID = " . $userId;

$result = mysqli_query($conn, $query) or die("Insert Query Failed");

// Execute the query
if (mysqli_query($conn, $query)) {
  echo "Data inserted successfully.";
  // Redirect back to the test-data.php page
  header("Location: ../../controller/signout.php");
  exit();
} else {
  echo "Error: " . $query . "<br>" . mysqli_error($conn);
}
?>
