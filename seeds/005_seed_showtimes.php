<?php
require("../connection/connection.php");

$movie_ids = [];
$result = $mysqli->query("SELECT id FROM movies");
while ($row = $result->fetch_assoc()) {
    $movie_ids[] = $row['id'];
}

$auditorium_ids = [];
$result = $mysqli->query("SELECT id FROM auditoriums");
while ($row = $result->fetch_assoc()) {
    $auditorium_ids[] = $row['id'];
}

if (count($movie_ids) < 1 || count($auditorium_ids) < 1) {
    die("No movies or auditoriums found!");
}

$showtimes = [
    ["movie_id" => $movie_ids[0], "auditorium_id" => $auditorium_ids[0], "show_date" => "2025-07-01", "show_time" => "15:00:00"],
    ["movie_id" => $movie_ids[0], "auditorium_id" => $auditorium_ids[1], "show_date" => "2025-07-01", "show_time" => "18:30:00"],
    ["movie_id" => $movie_ids[1], "auditorium_id" => $auditorium_ids[0], "show_date" => "2025-07-02", "show_time" => "20:00:00"],
    ["movie_id" => $movie_ids[1], "auditorium_id" => $auditorium_ids[1], "show_date" => "2025-07-03", "show_time" => "11:00:00"]
];

foreach ($showtimes as $show) {
    $stmt = $mysqli->prepare("INSERT INTO showtimes (movie_id, auditorium_id, show_date, show_time) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("iiss", $show["movie_id"], $show["auditorium_id"], $show["show_date"], $show["show_time"]);
    $stmt->execute();
}

echo json_encode("Showtimes seeded successfully.");
