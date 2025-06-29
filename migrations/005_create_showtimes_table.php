<?php 
require("../connection/connection.php");

$query = "CREATE TABLE showtimes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    movie_id INT NOT NULL,
    auditorium_id INT NOT NULL,
    show_date DATE NOT NULL,
    show_time TIME NOT NULL,
    FOREIGN KEY (movie_id) REFERENCES movies(id),
    FOREIGN KEY (auditorium_id) REFERENCES auditoriums(id)
)";

$execute = $mysqli->prepare($query);
$execute->execute();

echo "Showtimes table created successfully.";
