<?php
// Set the content type of the response as JSON
header("Content-Type: application/json");

// Allow requests from any origin (CORS)
header("Access-Control-Allow-Origin: *");

// Include the database connection file
require "../model/dbconn.php";

// Check if the 'type' parameter is provided and not empty
if (isset($_GET['classId']) && !empty($_GET['classId'])) {
    $classId = $_GET['classId'];
    $date = $_GET['date'];
    $coachId = $_GET['coachId'];
    $sessionId = $_GET['sessionId'];

    // Prepare the query with a parameterized statement
    $query = "SELECT class.classID, class.date, sessions.time AS classTime, coach.name AS coachName, coach.specialization, CONCAT(user.firstName, ' ', user.lastName) AS memberName
    FROM class
    INNER JOIN sessions ON class.sessionID = sessions.sessionID
    INNER JOIN coach ON class.coachID = coach.coachID
    INNER JOIN user ON class.userID = user.userID
    WHERE class.date = '". $date ."'
      AND sessions.time = (SELECT time FROM sessions where sessionID = '".$sessionId."' )
      AND coach.name = (SELECT name FROM coach where coachID = '".$coachId."')";

    // Execute the query
    $result = mysqli_query($conn, $query) or die("Select Query Failed.");

    // Get the number of rows returned by the query
    $count = mysqli_num_rows($result);

    if ($count) {
        // Fetch the member details
        // $row = mysqli_fetch_assoc($result);

        $response['memberNames'] = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $response['memberNames'][] = $row['memberName'];
            $response['classDetails'][] = array(
                'classID' => $row['classID'],
                'date' => $row['date'],
                'classTime' => $row['classTime'],
                'coachName' => $row['coachName'],
                'specialization' => $row['specialization']
            );
        }
        // Assign the fetched row to the response
        // $response['classDetails'] = $row;
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
