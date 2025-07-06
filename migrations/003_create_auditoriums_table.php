<?php 
require("../connection/connection.php");


$query = "CREATE TABLE auditoriums (
        id INT AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(255) NOT NULL,
        seat_capacity INT NOT NULL,
        type VARCHAR(50) NOT NULL)";

$execute = $mysqli->prepare($query);
$execute->execute();

echo json_encode("Auditoriums table created successfully.");