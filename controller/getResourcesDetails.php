<?php
// Set the content type of the response as JSON
header("Content-Type: application/json");

// Allow requests from any origin (CORS)
header("Access-Control-Allow-Origin: *");

// Include the database connection file
require "../model/dbconn.php";

// Check if the 'type' parameter is provided and not empty
if (isset($_GET['resourcesId']) && !empty($_GET['resourcesId'])) {
    $resourcesId = $_GET['resourcesId'];

    // Prepare the query with a parameterized statement
    $query = "SELECT * FROM resources WHERE resourcesID = '" . $resourcesId . "'";

    // Execute the query
    $result = mysqli_query($conn, $query) or die("Select Query Failed.");

    // Get the number of rows returned by the query
    $count = mysqli_num_rows($result);

    if ($count) {
        // Fetch the member details
        $row = mysqli_fetch_assoc($result);

        // Assign the fetched row to the response
        $response = $row;
    } else {
        // If no record is found, set the response code and description
        $response['code'] = 404;
        $response['description'] = 'Data not found';
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
