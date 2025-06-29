<?php
require("../connection/connection.php");

$result = $mysqli->query("SELECT id, seat_capacity FROM auditoriums");

while ($auditorium = $result->fetch_assoc()) {
    $auditorium_id = $auditorium['id'];
    $capacity = $auditorium['seat_capacity'];

    for ($i = 1; $i <= $capacity; $i++) {
        $seat_number = (string)$i;
        $query = $mysqli->prepare("INSERT INTO seats (auditorium_id, seat_number) VALUES (?, ?)");
        $query->bind_param("is", $auditorium_id, $seat_number);
        $query->execute();
    }
}

echo json_encode("Seats seeded for all auditoriums.");
