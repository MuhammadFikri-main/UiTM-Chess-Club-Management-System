<?php 
function getTotalMember() {
    // Include the database connection file
    require "../model/dbconn.php";

    $query = "SELECT COUNT(*) AS userCount
    FROM user u
    INNER JOIN roles r ON u.roleID = r.roleID
    WHERE r.role <> 'admin'";

    $result = mysqli_query($conn, $query);

    if ($result) {
        $row = mysqli_fetch_assoc($result);
        $userCount = $row['userCount'];
        return $userCount;
    } else {
        echo "Error: " . mysqli_error($conn);
        return 0;
    }
}

function getTotalResources() {
    // Include the database connection file
    require "../model/dbconn.php";

    $query = "SELECT COUNT(*) AS resCount FROM resources";

    $result = mysqli_query($conn, $query);

    if ($result) {
        $row = mysqli_fetch_assoc($result);
        $resCount = $row['resCount'];
        return $resCount;
    } else {
        echo "Error: " . mysqli_error($conn);
        return 0;
    }
}

function getTotalWorkshop() {
    // Include the database connection file
    require "../model/dbconn.php";

    $query = "SELECT COUNT(*) AS workCount
    FROM workshop
    WHERE date > CURDATE()";

    $result = mysqli_query($conn, $query);

    if ($result) {
        $row = mysqli_fetch_assoc($result);
        $workCount = $row['workCount'];
        return $workCount;
    } else {
        echo "Error: " . mysqli_error($conn);
        return 0;
    }
}

function getTotalWorkshopById($id) {
    // Include the database connection file
    require "../model/dbconn.php";

    $query = "SELECT COUNT(*) AS workCount
    FROM userworkshop uw
    INNER JOIN workshop w ON uw.workshopID = w.workshopID 
    WHERE date > CURDATE() AND userID=".$id;

    $result = mysqli_query($conn, $query);

    if ($result) {
        $row = mysqli_fetch_assoc($result);
        $workCount = $row['workCount'];
        return $workCount;
    } else {
        echo "Error: " . mysqli_error($conn);
        return 0;
    }
}

function getTotalClassById($id) {
    // Include the database connection file
    require "../model/dbconn.php";

    $query="SELECT COUNT(*) AS classCount
            FROM class
            WHERE date > CURDATE() AND userID=".$id;

    $result = mysqli_query($conn, $query);

    if ($result) {
        $row = mysqli_fetch_assoc($result);
        $classCount = $row['classCount'];
        return $classCount;
    } else {
        echo "Error: " . mysqli_error($conn);
        return 0;
    }
}

function getTotalCoach() {
    // Include the database connection file
    require "../model/dbconn.php";

    $query = "SELECT COUNT(*) AS coachCount FROM coach";

    $result = mysqli_query($conn, $query);

    if ($result) {
        $row = mysqli_fetch_assoc($result);
        $coachCount = $row['coachCount'];
        return $coachCount;
    } else {
        echo "Error: " . mysqli_error($conn);
        return 0;
    }
}

function getResourceDownloadsByDay() {
    // Include the database connection file
    require "../model/dbconn.php";

    // Fetch the count of resource downloads by day
    $query = "SELECT DATE(`downloadInfo`) AS `date`, COUNT(*) AS `count` FROM `userresources` GROUP BY DATE(`downloadInfo`)";
    $result = mysqli_query($conn, $query);

    // Check if the query was successful
    if ($result) {
        // Create arrays to store the dates and counts
        $dates = array();
        $counts = array();

        // Loop through the query results and add the dates and counts to the arrays
        while ($row = mysqli_fetch_assoc($result)) {
            $dates[] = $row['date'];
            $counts[] = $row['count'];
        }

        // Close the database connection
        mysqli_close($conn);

        // Return the dates and counts as an associative array
        return array(
            'dates' => $dates,
            'counts' => $counts
        );
    } else {
        // If the query failed, handle the error
        echo "Error retrieving resource counts: " . mysqli_error($conn);
        return null;
    }
}

function getResourceDownload($id) {
    // Include the database connection file
    require "../model/dbconn.php";

    $query="SELECT COUNT(*) as total_download
            FROM userresources
            WHERE userID=".$id;

    $result = mysqli_query($conn, $query);

    if ($result) {
        $row = mysqli_fetch_assoc($result);
        $downCount = $row['total_download'];
        return $downCount;
    } else {
        echo "Error: " . mysqli_error($conn);
        return 0;
    }
}

function getMembershipTierData() {
    // Include the database connection file
    require "../model/dbconn.php";

    // Execute the SQL query to fetch the count of roles from the user table
    $sql = "SELECT COUNT(*) as count, roleID FROM user GROUP BY roleID";
    $result = $conn->query($sql);

    // Create an array to store the results
    $roleCounts = array();
    $roleIDs = array();

    if ($result->num_rows > 0) {
        // Fetch the count and roleID values from the database results
        while ($row = $result->fetch_assoc()) {
            $roleCounts[] = $row["count"];
            $roleIDs[] = $row["roleID"];
        }
    }

    // Close the database connection
    $conn->close();

    // Return the results as JSON
    $response = array(
        "roleCounts" => $roleCounts,
        "roleIDs" => $roleIDs
    );

    echo json_encode($response);
}

function getScheduleData() {
    // Include the database connection file
    require "../model/dbconn.php";

    // Execute the query
    $sql = "SELECT 'class' AS type, c.classID AS id, c.date, s.time AS sessionTime, ch.name AS coachName, COUNT(u.userID) AS userCount, COALESCE(NULL, '-') AS workshopID, COALESCE(NULL, 'Normal') AS title, COALESCE(NULL, 'Online') AS location, COALESCE(NULL, '-') AS description
    FROM class c
    INNER JOIN coach ch ON c.coachID = ch.coachID
    INNER JOIN sessions s ON c.sessionID = s.sessionID
    LEFT JOIN user u ON c.userID = u.userID
    GROUP BY c.classID, c.date, s.time, ch.name
    UNION ALL
    SELECT 'workshop' AS type, COALESCE(NULL, '-') AS id, w.date, COALESCE(NULL, 'TBD') AS sessionTime, COALESCE(NULL, 'Guest') AS coachName, NULL AS userCount, w.workshopID, w.title, w.location, w.description
    FROM workshop w
    ORDER BY date";

    $result = $conn->query($sql);

    // Create an array to store the results
    $scheduleData = array();

    if ($result->num_rows > 0) {
        // Fetch the rows from the database results
        while ($row = $result->fetch_assoc()) {
            $scheduleData[] = $row;
        }
    }

    // Close the database connection
    $conn->close();

    return $scheduleData;
}

function getScheduleDataById($id) {
    // Include the database connection file
    require "../model/dbconn.php";

    // Execute the query
    $sql = "SELECT 'class' AS type, c.classID AS id, c.date, s.time AS sessionTime, ch.name AS coachName, COUNT(u.userID) AS userCount, COALESCE(NULL, '-') AS workshopID, COALESCE(NULL, 'Training') AS title, COALESCE(NULL, 'Online') AS location, COALESCE(NULL, '-') AS description
    FROM class c
    INNER JOIN coach ch ON c.coachID = ch.coachID
    INNER JOIN sessions s ON c.sessionID = s.sessionID
    LEFT JOIN user u ON c.userID = u.userID
    WHERE u.userID = '$id' AND date > CURDATE()
    GROUP BY c.classID, c.date, s.time, ch.name
    
    UNION ALL
    
    SELECT 'workshop' AS type, COALESCE(NULL, '-') AS id, w.date, COALESCE(NULL, 'TBD') AS sessionTime, COALESCE(NULL, 'Guest') AS coachName, NULL AS userCount, w.workshopID, w.title, w.location, w.description
    FROM workshop w
    INNER JOIN userworkshop uw ON uw.workshopID = w.workshopID 
    WHERE uw.userID = '$id' AND date > CURDATE()
    
    ORDER BY date;";

    $result = $conn->query($sql);

    // Create an array to store the results
    $scheduleData = array();

    if ($result->num_rows > 0) {
        // Fetch the rows from the database results
        while ($row = $result->fetch_assoc()) {
            $scheduleData[] = $row;
        }
    }

    // Close the database connection
    $conn->close();

    return $scheduleData;
}

function getClassData($id) {
    // Include the database connection file
    require "../model/dbconn.php";

    // Execute the query
    $sql = "SELECT date, s.time, c.name , c.specialization
            FROM class cl
            INNER JOIN sessions s ON cl.sessionID = s.sessionID
            INNER JOIN coach c ON cl.coachID = c.coachID 
            WHERE userID=".$id;

    $result = $conn->query($sql);

    // Create an array to store the results
    $scheduleData = array();

    if ($result->num_rows > 0) {
        // Fetch the rows from the database results
        while ($row = $result->fetch_assoc()) {
            $scheduleData[] = $row;
        }
    }

    // Close the database connection
    $conn->close();

    return $scheduleData;
}

function getWorkshopData($id) {
    // Include the database connection file
    require "../model/dbconn.php";

    // Execute the query
    $sql = "SELECT w.* 
            FROM userworkshop uw
            INNER JOIN workshop w ON w.workshopID = uw.workshopID
            WHERE userID=".$id;

    $result = $conn->query($sql);

    // Create an array to store the results
    $scheduleData = array();

    if ($result->num_rows > 0) {
        // Fetch the rows from the database results
        while ($row = $result->fetch_assoc()) {
            $scheduleData[] = $row;
        }
    }

    // Close the database connection
    $conn->close();

    return $scheduleData;
}







?>