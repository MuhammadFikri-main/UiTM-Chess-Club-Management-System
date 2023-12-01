<?php
    $DBhost = "127.0.0.1";
    $DBuser = "root";
    $DBpassword = "";
    $DBname = "chess_club_db";

    $conn = mysqli_connect($DBhost, $DBuser, $DBpassword, $DBname);

    if(!$conn){
        die("Connection failed:" . mysqli_connect_error());
    }
?>