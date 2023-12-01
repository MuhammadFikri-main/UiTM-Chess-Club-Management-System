<?php

require_once "../model/dbconn.php";

session_start();

if ($_POST['email'] !== null && $_POST['password'] !== null) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Query the database to check if the account exists
    $query = "SELECT a.userID, a.email, a.password, m.role
              FROM user a
              INNER JOIN roles m ON a.roleID = m.roleID
              WHERE a.email = '$email' AND a.password = '$password'";

    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        // Account exists, retrieve the membership type
        $row = mysqli_fetch_assoc($result);
        $userId = $row['userID'];
        $role = $row['role'];

        // Save the role information in a session variable
        $_SESSION['role'] = $role;
        $_SESSION['userId'] = $userId;

        if($role == "admin"){
            header("Location: http://localhost/chess_club/admin/dashboard.php");
            exit();
        }else{
            header("Location: http://localhost/chess_club/user/m-home.php");
            exit();
        }
        //echo "Account with email '$email' and password '$password' already exists. Membership Type: $role";
    } else {
        echo "Account with email '$email' does not exist.";
    }
} else {
    echo "No input provided.";
}

?>
