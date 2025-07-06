<?php 
require("../connection/connection.php");

$query = "CREATE TABLE seats (
        id INT AUTO_INCREMENT PRIMARY KEY,
        auditorium_id INT NOT NULL,
        seat_number VARCHAR(255) NOT NULL,
        is_selected BOOLEAN NOT NULL DEFAULT FALSE,
        FOREIGN KEY (auditorium_id) REFERENCES auditoriums(id))";     

$execute = $mysqli->prepare($query);
$execute->execute();

echo json_encode("Seats table created successfully.");