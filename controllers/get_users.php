<?php
header("Access-Control-Allow-Origin: http://127.0.0.1:5500");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");
header("Content-Type: application/json");

require("../models/Model.php");
require("../models/User.php");
require("../connection/connection.php");


if(!isset($_GET["id"])){
    $users = User::all($mysqli);
    $response["users"] = [];
    foreach($users as $u){
        $response["users"][] = $u->toKeyValuePair();
    }
    echo json_encode(value: $response);
    return;
}

$id = $_GET['id'];
$user = User::find($mysqli, $id);
$response = $user->toKeyValuePair();
echo json_encode($response);