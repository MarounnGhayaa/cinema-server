<?php
require("../connection/connection.php");

$auditoriums = [
    [
        "name" => "Main Hall",
        "seat_capacity" => 5,
        "type" => "Standard"
    ],
    [
        "name" => "Deluxe Theater",
        "seat_capacity" => 8,
        "type" => "Deluxe"
    ],
    [
        "name" => "IMAX Experience",
        "seat_capacity" => 3,
        "type" => "IMAX"
    ],
    [
        "name" => "Gold Class Lounge",
        "seat_capacity" => 4,
        "type" => "Luxury"
    ],
    [
        "name" => "Outdoor Screen",
        "seat_capacity" => 10,
        "type" => "Open Air"
    ]
];

foreach ($auditoriums as $auditorium) {
    $stmt = $mysqli->prepare("INSERT INTO auditoriums (name, seat_capacity, type) VALUES (?, ?, ?)");
    $stmt->bind_param("sis", $auditorium["name"], $auditorium["seat_capacity"], $auditorium["type"]);
    $stmt->execute();
}

echo json_encode("Auditoriums seeded successfully.");
