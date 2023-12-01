<?php
    session_start(); // Start the session

    // Clear all session variables
    $_SESSION = array();

    // Destroy the session
    session_destroy();

    // Redirect the user to the sign-in page or any other desired location
    header("Location: http://localhost/chess_club/login.php");
    exit();
?>