<?php 
    // Include the database connection file
    require "../model/dbconn.php";

    // Execute the SQL query to fetch the count of roles from the user table
    $sql = "SELECT COUNT(*) as count, r.role 
    FROM user u 
    INNER JOIN roles r ON u.roleID=r.roleID 
    WHERE r.role <> 'admin'
    GROUP BY r.role";
    $result = $conn->query($sql);

    // Create an array to store the results
    $roleCounts = array();
    $roleNames = array();

    if ($result->num_rows > 0) {
        // Fetch the count and role name values from the database results
        while ($row = $result->fetch_assoc()) {
            $roleCounts[] = $row["count"];
            $roleNames[] = $row["role"];
        }
    }

    // Close the database connection
    $conn->close();

    // Return the results as JSON
    $response = array(
        "roleCounts" => $roleCounts,
        "roleNames" => $roleNames
    );

    echo json_encode($response);
?>
