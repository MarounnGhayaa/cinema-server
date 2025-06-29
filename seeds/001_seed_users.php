<?php
require("../connection/connection.php");

$users = [
    [
        "name" => "Maroun",
        "email" => "maroun@gmail.com",
        "password" => "maroun123",
        "favorite_genre" => "action",
        "phone_number" => 76156893,
        "age" => 30,
        "role" => "admin"
    ],
    [
        "name" => "Greg",
        "email" => "greg@gmail.com",
        "password" => "greg123",
        "favorite_genre" => "sci-fi",
        "phone_number" => 12000000,
        "age" => 20,
        "role" => "user"
    ],
    [
        "name" => "Sarah",
        "email" => "sarah@gmail.com",
        "password" => "sarah123",
        "favorite_genre" => "romance",
        "phone_number" => 12000001,
        "age" => 22,
        "role" => "user"
    ],
    [
        "name" => "Lola",
        "email" => "lola@gmail.com",
        "password" => "lola123",
        "favorite_genre" => "crime",
        "phone_number" => 12000002,
        "age" => 27,
        "role" => "user"
    ],
    [
        "name" => "Mike",
        "email" => "mike@gmail.com",
        "password" => "mike123",
        "favorite_genre" => "comedy",
        "phone_number" => 12000003,
        "age" => 17,
        "role" => "user"
    ],
    ];

foreach ($users as $user) {
    $stmt = $mysqli->prepare("INSERT INTO users (name, email, password, favorite_genre, phone_number, age, role) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssiis", $user["name"], $user["email"], $user["password"], $user["favorite_genre"],$user["phone_number"], $user["age"], $user["role"]);
    $stmt->execute();
}

echo json_encode("Users seeded successfully.");
