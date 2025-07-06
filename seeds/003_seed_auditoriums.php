<?php

require("../connection/connection.php");
require("../Models/Auditorium.php");

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
    $auditorium = Auditorium::Create($mysqli, $auditorium, "sis");
}
echo json_encode("Auditoriums seeded successfully.");
