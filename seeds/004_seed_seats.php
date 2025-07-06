<?php

require("../connection/connection.php");
require("../Models/Seat.php");

$auditorium_ids = [];
$result = $mysqli->query("SELECT id FROM auditoriums");
while ($row = $result->fetch_assoc()) {
    $auditorium_ids[] = $row['id'];
}

if (count($auditorium_ids) < 1) {
    die("No auditoriums found!");
}

$seats = [
    ["id" => 1, "auditorium_id" => 1, "seat_number" => "1", "is_selected" => 0],
    ["id" => 2, "auditorium_id" => 1, "seat_number" => "2", "is_selected" => 0],
    ["id" => 3, "auditorium_id" => 1, "seat_number" => "3", "is_selected" => 0],
    ["id" => 4, "auditorium_id" => 1, "seat_number" => "4", "is_selected" => 0],
    ["id" => 5, "auditorium_id" => 1, "seat_number" => "5", "is_selected" => 0],
    ["id" => 6, "auditorium_id" => 2, "seat_number" => "1", "is_selected" => 0],
    ["id" => 7, "auditorium_id" => 2, "seat_number" => "2", "is_selected" => 0],
    ["id" => 8, "auditorium_id" => 2, "seat_number" => "3", "is_selected" => 0],
    ["id" => 9, "auditorium_id" => 2, "seat_number" => "4", "is_selected" => 0],
    ["id" => 10, "auditorium_id" => 2, "seat_number" => "5", "is_selected" => 0],
    ["id" => 11, "auditorium_id" => 2, "seat_number" => "6", "is_selected" => 0],
    ["id" => 12, "auditorium_id" => 2, "seat_number" => "7", "is_selected" => 0],
    ["id" => 13, "auditorium_id" => 2, "seat_number" => "8", "is_selected" => 0],
    ["id" => 14, "auditorium_id" => 3, "seat_number" => "1", "is_selected" => 0],
    ["id" => 15, "auditorium_id" => 3, "seat_number" => "2", "is_selected" => 0],
    ["id" => 16, "auditorium_id" => 3, "seat_number" => "3", "is_selected" => 0],
    ["id" => 17, "auditorium_id" => 4, "seat_number" => "1", "is_selected" => 0],
    ["id" => 18, "auditorium_id" => 4, "seat_number" => "2", "is_selected" => 0],
    ["id" => 19, "auditorium_id" => 4, "seat_number" => "3", "is_selected" => 0],
    ["id" => 20, "auditorium_id" => 4, "seat_number" => "4", "is_selected" => 0],
    ["id" => 21, "auditorium_id" => 5, "seat_number" => "1", "is_selected" => 0],
    ["id" => 22, "auditorium_id" => 5, "seat_number" => "2", "is_selected" => 0],
    ["id" => 23, "auditorium_id" => 5, "seat_number" => "3", "is_selected" => 0],
    ["id" => 24, "auditorium_id" => 5, "seat_number" => "4", "is_selected" => 0],
    ["id" => 25, "auditorium_id" => 5, "seat_number" => "5", "is_selected" => 0],
    ["id" => 26, "auditorium_id" => 5, "seat_number" => "6", "is_selected" => 0],
    ["id" => 27, "auditorium_id" => 5, "seat_number" => "7", "is_selected" => 0],
    ["id" => 28, "auditorium_id" => 5, "seat_number" => "8", "is_selected" => 0],
    ["id" => 29, "auditorium_id" => 5, "seat_number" => "9", "is_selected" => 0],
    ["id" => 30, "auditorium_id" => 5, "seat_number" => "10", "is_selected" => 0]
];

foreach ($seats as $seat) {
    $seat = Seat::Create($mysqli, $seat, "iiii");
}
echo json_encode("Seats seeded for all auditoriums.");
