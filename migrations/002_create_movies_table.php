<?php 
require("../connection/connection.php");


$query = "CREATE TABLE movies (
        id INT AUTO_INCREMENT PRIMARY KEY,
        title VARCHAR(100) NOT NULL,
        description TEXT NOT NULL,
        cast TEXT NOT NULL,
        rating VARCHAR(255) NOT NULL,
        genre VARCHAR(255) NOT NULL,
        image_url VARCHAR(255) NOT NULL)";

$execute = $mysqli->prepare($query);
$execute->execute();