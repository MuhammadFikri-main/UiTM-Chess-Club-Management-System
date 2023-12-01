<?php 

function getAccDetails($userId) {
    // Include the database connection file
    require "../model/dbconn.php";

    $query = "SELECT u.*, r.role 
    FROM user  u
    INNER JOIN roles r ON u.roleID = r.roleID 
    WHERE userID=" . $userId;

    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        return $row;
    } else {
        echo "No data found.";
        return null;
    }
}
function getMembershipList(){
    // Include the database connection file
    require "../model/dbconn.php";

    $query = "SELECT u.*, r.role as accType
          FROM user u
          INNER JOIN roles r ON u.roleID = r.roleID
          WHERE r.role <> 'admin'";

    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $userID = $row['userID'];
            $firstName = $row['firstName'];
            $lastName = $row['lastName'];
            $email = $row['email'];
            $password = $row['password'];
            $role = $row['accType'];

            $resultsArray[] = $row;
        }
    } else {
        echo "No data found.";
    }

    // Return the results array
    return $resultsArray;
}

function getResourceList(){
    // Include the database connection file
    require "../model/dbconn.php";

    $query = "SELECT * FROM resources";

    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $resourcesID = $row['resourcesID'];
            $title = $row['title'];
            $type = $row['type'];
            $description = $row['description'];
            $fileName = $row['fileName'];

            $resultsArray[] = $row;
        }
    } else {
        echo "No data found.";
    }

    // Return the results array
    return $resultsArray;
}

function getWorkshopList(){
    // Include the database connection file 
    require "../model/dbconn.php";


    $query = "SELECT * FROM workshop";

    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $workshopID = $row['workshopID'];
            $title = $row['title'];
            $date = $row['date'];
            $location = $row['location'];
            $description = $row['description'];

            $resultsArray[] = $row;
        }
    } else {
        echo "No data found.";
    }

    // Return the results array
    return $resultsArray;
}
function getWorkshopListByDate(){
    // Include the database connection file 
    require "../model/dbconn.php";


    $query = "SELECT * FROM workshop where date > CURDATE()";

    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $workshopID = $row['workshopID'];
            $title = $row['title'];
            $date = $row['date'];
            $location = $row['location'];
            $description = $row['description'];

            $resultsArray[] = $row;
        }
    } else {
        echo "No data found.";
    }

    // Return the results array
    return $resultsArray;
}

function getCoachList(){
    // Include the database connection file
    require "../model/dbconn.php";

    $query = "SELECT * FROM coach";

    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $coachID = $row['coachID'];
            $name = $row['name'];
            $specialization = $row['specialization'];
            $email = $row['email'];
            $contactNumber = $row['contactNumber'];

            $resultsArray[] = $row;
        }
    } else {
        echo "No data found.";
    }

    // Return the results array
    return $resultsArray;
}

function getSessionList(){
    // Include the database connection file
    require "../model/dbconn.php";

    $query = "SELECT * FROM sessions";

    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $sessionID = $row['sessionID'];
            $time = $row['time'];

            $resultsArray[] = $row;
        }
    } else {
        echo "No data found.";
    }

    // Return the results array
    return $resultsArray;
}

function getClassList(){
    // Include the database connection file
    require "../model/dbconn.php";

    $query = "SELECT class.*, sessions.time, coach.name AS coach, COUNT(*) AS memberCount 
    FROM class 
    INNER JOIN sessions ON class.sessionID = sessions.sessionID 
    INNER JOIN coach ON class.coachID = coach.coachID 
    INNER JOIN user ON class.userID = user.userID 
    GROUP BY class.date, sessions.time, coach.name";

    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $classID = $row['classID'];
            $sessionID = $row['sessionID'];
            $coachID = $row['coachID'];
            $userID = $row['userID'];
            $date = $row['date'];
            $time = $row['time'];
            $coach = $row['coach'];
            $member = $row['memberCount'];

            $resultsArray[] = $row;
        }
    } else {
        echo "No data found.";
    }

    // Return the results array
    return $resultsArray;
}

function isUserSubscribed($userId, $workshopId) {
    // Include the database connection file
    require '../model/dbconn.php';
    
    // Prepare the query with parameterized statement
    $query = "SELECT COUNT(*) as count FROM userworkshop WHERE userID=? AND workshopID=?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "ii", $userId, $workshopId);
    
    // Execute the query
    mysqli_stmt_execute($stmt);
    
    // Bind the result
    mysqli_stmt_bind_result($stmt, $count);
    
    // Fetch the result
    mysqli_stmt_fetch($stmt);
    
    // Close the statement
    mysqli_stmt_close($stmt);
    
    // Check if the user is subscribed
    return $count > 0;
}

function getClassListById($id){
    // Include the database connection file
    require "../model/dbconn.php";

    $query = "SELECT class.*, sessions.time, coach.name AS coach, COUNT(*) AS memberCount 
    FROM class 
    INNER JOIN sessions ON class.sessionID = sessions.sessionID 
    INNER JOIN coach ON class.coachID = coach.coachID 
    INNER JOIN user ON class.userID = user.userID 
    WHERE user.userID='$id'
    GROUP BY class.date, sessions.time, coach.name";

    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $classID = $row['classID'];
            $sessionID = $row['sessionID'];
            $coachID = $row['coachID'];
            $userID = $row['userID'];
            $date = $row['date'];
            $time = $row['time'];
            $coach = $row['coach'];
            $member = $row['memberCount'];

            $resultsArray[] = $row;
        }
    } else {
        echo "No data found.";
    }

    // Return the results array
    return $resultsArray;
}

function getWorkshopListById($id){
    // Include the database connection file 
    require "../model/dbconn.php";


    $query="SELECT uw.* , w.*   
            FROM userworkshop uw
            INNER JOIN workshop w ON uw.workshopID=w.workshopID  
            WHERE userID='$id'";

    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $title = $row['title'];
            $date = $row['date'];
            $location = $row['location'];
            $description = $row['description'];

            $resultsArray[] = $row;
        }
    } else {
        echo "No data found.";
    }

    // Return the results array
    return $resultsArray;
}




?>