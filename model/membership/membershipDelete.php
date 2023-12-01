<?php
// Set the content type of the response as JSON
header("Content-Type: application/json");

// Allow requests from any origin (CORS)
header("Access-Control-Allow-Origin: *");

// Include the database connection file
require '../../model/dbconn.php';

// Check if the 'type' parameter is provided and not empty
if (isset($_GET['userId']) && !empty($_GET['userId'])) {
    $userId = $_GET['userId'];

    // Prepare the query with a parameterized statement
    $query = "DELETE FROM user WHERE userID='" . $userId . "'";

    // Execute the query
    $result = mysqli_query($conn, $query) or die("Select Query Failed.");

    if ($result) {
        // Deletion successful
        $response['code'] = 200;
        $response['description'] = 'Delete Success';
    } else {
        // Check if the deletion failed due to a constraint violation
        if (mysqli_errno($conn) == 1451) {
            $response['code'] = 400;
            $response['description'] = 'constraint';;
        } else {
            $response['code'] = 400;
            $response['description'] = 'Delete Failed';
        }
    }
    

} else {
    // If the 'type' parameter is not provided or empty, set the response code and description
    $response['code'] = 400;
    $response['description'] = 'Invalid request';
}

// Convert the response array to JSON
$json_response = json_encode($response);

// Send the JSON response
echo $json_response;
?>
