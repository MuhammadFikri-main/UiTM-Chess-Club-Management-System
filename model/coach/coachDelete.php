<?php
// Set the content type of the response as JSON
header("Content-Type: application/json");

// Allow requests from any origin (CORS)
header("Access-Control-Allow-Origin: *");

// Include the database connection file
// require_once "$_SERVER[DOCUMENT_ROOT]" . "/ict600/chess_club/model/dbconn.php";
require "../../model/dbconn.php";

// Check if the 'type' parameter is provided and not empty
if (isset($_GET['coachId']) && !empty($_GET['coachId'])) {
    $coachId = $_GET['coachId'];

    // Prepare the query with a parameterized statement
    $query = "DELETE FROM coach WHERE coachID='" . $coachId . "'";

    // Execute the query
    $result = mysqli_query($conn, $query) or die("Select Query Failed.");

} else {
    // If the 'type' parameter is not provided or empty, set the response code and description
    $response['code'] = 400;
    $response['description'] = 'Invalid request';
}

// Convert the response array to JSON
// $json_response = json_encode($response);

// // Send the JSON response
// echo $json_response;
?>
