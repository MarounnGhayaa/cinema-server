<?php

header("Access-Control-Allow-Origin: http://127.0.0.1:5500");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");
header("Content-Type: application/json");


require(__DIR__ . "/../connection/connection.php");

require(__DIR__ . "/../models/User.php");
require(__DIR__ . "/../models/Movie.php");
require(__DIR__ . "/../models/Seat.php");

require(__DIR__ . "/../services/ResponseService.php");
require(__DIR__ . "/../services/UserService.php");
require(__DIR__ . "/../services/MovieService.php");
require(__DIR__ . "/../services/SeatService.php");