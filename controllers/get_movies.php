<?php
header("Access-Control-Allow-Origin: http://127.0.0.1:5500");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");
header("Content-Type: application/json");

require("../models/Model.php");
require("../models/Movie.php");
require("../connection/connection.php");


if(!isset($_GET["id"])){
    $movies = Movie::all($mysqli);

    $response["movies"] = [];
    foreach($movies as $m){
        $response["movies"][] = $m->toKeyValuePair(); 
    }
    echo json_encode(value: $response);
    return;
}

$id = $_GET['id'];
$movie = Movie::find($mysqli, $id);
$response = $movie->toKeyValuePair();
echo json_encode($response);