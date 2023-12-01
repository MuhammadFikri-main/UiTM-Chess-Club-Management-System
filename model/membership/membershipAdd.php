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

$firstName = $_POST["firstNameInputNew"];
$lastName = $_POST["lastNameInputNew"];
$email = $_POST["emailInputNew"];
$password = $_POST["passwordInputNew"];
$roleID = $_POST["accType"];

$query = "INSERT INTO `user` (`firstName`, `lastName`, `email`, `password`, `roleID`) 
          VALUES ('$firstName', '$lastName', '$email', '$password', '$roleID')";

//$result = mysqli_query($conn, $query) or die("Insert Query Failed");

// Execute the query
if (mysqli_query($conn, $query)) {
  echo "Data inserted successfully.";
  if($accRole == "admin"){
    header("Location: http://localhost/chess_club/admin/membership.php");
    exit();
  }else{
    header("Location: http://localhost/chess_club/user/member.php");
    exit();
  }
} else {
  echo "Error: " . $query . "<br>" . mysqli_error($conn);
}
?>
