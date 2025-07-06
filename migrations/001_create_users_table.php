<?php 
require("../connection/connection.php");


$query = "CREATE TABLE users (
        id INT AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(255) NOT NULL,
        email VARCHAR(255) NOT NULL,
        password VARCHAR(255) NOT NULL,
        favorite_genre VARCHAR(255) NOT NULL,
        phone_number INT NOT NULL,
        age INT NOT NULL,
        role VARCHAR(255) DEFAULT 'user')";

$execute = $mysqli->prepare($query);
$execute->execute();

echo json_encode(value: "Users table created successfully.");