<?php
header("Access-Control-Allow-Origin: http://127.0.0.1:5500");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");
header("Content-Type: application/json");

require("../models/Model.php");
require("../models/Seat.php");
require("../connection/connection.php");


if(!isset($_GET["id"])){
    $seats = Seat::all($mysqli);

    $response["seats"] = [];
    foreach($seats as $s){
        $response["seats"][] = $s->toKeyValuePair();  
    }
    echo json_encode(value: $response); 
    return;
}

$id = $_GET['id'];
$seat = Seat::find($mysqli, $id);
$response = $seat->toKeyValuePair();
echo json_encode($response);