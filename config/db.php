<?php

/* ------- DATABASE CONFIG -------
    ---------------------------------*/
    $db_server      = 'localhost';
    $db_user        = 'root';
    $db_password    = '';
    $db_name        = 'project_army';


 /* --------- DB Connect ---------
    -------------------------------*/
    $conn = new mysqli($db_server, $db_user, $db_password, $db_name);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 
    mysqli_set_charset($conn, "utf8");
?>
    
