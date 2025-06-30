<?php
header("Access-Control-Allow-Origin: http://127.0.0.1:5500");
header("Access-Control-Allow-Methods: POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");
header("Content-Type: application/json");

require("../connection/connection.php");
require("../models/Model.php");
require("../models/User.php");

$data = json_decode(file_get_contents("php://input"), true);

if (!isset($data["name"]) || !isset($data["email"]) || !isset($data["password"]) || !isset($data["email"]) || !isset($data["favorite_genre"]) || !isset($data["phone_number"]) || !isset($data["age"])) {
    echo json_encode(["success" => false, "message" => "Missing data"]);
    exit;
}

$name = $data["name"];
$email = $data["email"];
$password = $data["password"];
$favorite_genre = $data["favorite_genre"];
$phone_number = $data["phone_number"];
$age = $data["age"];

$data = [
    "name" => $name,
    "email" => $email,
    "password" => $password,
    "favorite_genre" => $favorite_genre,
    "phone_number" => $phone_number,
    "age" => $age];

$types = "ssssii";

$newId = User::create($mysqli, $data, $types);

if ($newId) {
    echo json_encode([
        "success" => true,
        "user" => [
            "id" => $newId,
            "name" => $name,
            "email" => $email,
            "favorite_genre" => $favorite_genre,
            "phone_number" => $phone_number,
            "age" => $age
        ]
    ]);
    
} else {
    echo json_encode([
        "success" => false,
        "message" => "Registration failed."
    ]);
}