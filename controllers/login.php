<?php
header("Access-Control-Allow-Origin: http://127.0.0.1:5500");
header("Access-Control-Allow-Methods: POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");
header("Content-Type: application/json");

require("../connection/connection.php");
require("../models/Model.php");
require("../models/User.php");

$data = json_decode(file_get_contents("php://input"), true);

if (!isset($data["email"]) || !isset($data["password"])) {
    echo json_encode(["success" => false, "message" => "Missing data"]);
    exit;
}

$email = $data["email"];
$password = $data["password"];

$response = User::loginUser($mysqli, $email, $password);

echo json_encode($response);


