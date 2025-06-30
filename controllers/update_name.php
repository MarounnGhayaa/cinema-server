<?php
header("Access-Control-Allow-Origin: http://127.0.0.1:5500");
header("Access-Control-Allow-Methods: POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");
header("Content-Type: application/json");

require("../connection/connection.php");
require("../models/Model.php");
require("../models/User.php");

$data = json_decode(file_get_contents("php://input"), true);

if (!isset($data["column_name"]) || !isset($data["new_value"]) || !isset($data["id"])) {
    echo json_encode(["success" => false, "message" => "Missing data"]);
    exit;
}

$column_name = $data["column_name"];
$new_value = $data["new_value"];
$id = $data["id"];

$types = "si";

$updated = User::update($mysqli, $types, $column_name, $new_value, $id);

if ($updated) {
    echo json_encode([
        "success" => true,
        "updatedUser" => [
            "id" => $id,
            "column_name" => $column_name,
            "column_value" => $new_value
        ]
    ]);
} else {
    echo json_encode([
        "success" => false,
        "message" => "Update failed."
    ]);
}
