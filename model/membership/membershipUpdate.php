<?php
header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Method: POST");
header("Access-Control-Allow-Header: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods,Authorization");

// Include the database connection file
require '../../model/dbconn.php';

session_start();

// Check the connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }

$accRole = $_SESSION['role'];

$userID = $_POST['userIdInput'];
$firstName = $_POST["firstNameInput"];
$lastName = $_POST["lastNameInput"];
$email = $_POST["emailInput"];
$password = $_POST["passwordInput"];
$roleID = $_POST["roleIdInput"];

$query = "UPDATE `user` 
          SET   firstName = '".$firstName."',
                lastName = '".$lastName."',
                email = '".$email."',
                password = '".$password."',
                roleID = '".$roleID."'
            WHERE userID = " . $userID;

// Execute the query
if (mysqli_query($conn, $query)) {
  echo "Data inserted successfully.";

  if($accRole == "admin"){
    // Redirect back to the test-data.php page
    header("Location: http://localhost/chess_club/admin/membership.php");
    exit();
  }else{
    // Redirect back to the test-data.php page
    header("Location: http://localhost/chess_club/user/member.php");
    exit();
  }
} else {
  echo "Error: " . $query . "<br>" . mysqli_error($conn);
}
?>
