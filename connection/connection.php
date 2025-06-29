<?php

try {

    $db_host = "localhost";
    $db_name = "cinema_db"; 
    $db_user = "root"; 
    $db_pass = null;

    $mysqli = new mysqli($db_host, $db_user, $db_pass, $db_name);

} catch (Exception $e) {    
    echo "Error connecting to database with exception: $e";
}
