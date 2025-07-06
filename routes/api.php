<?php

$apis = [
    '/login'                => ['controller' => 'AuthController', 'method' => 'login'],
    '/register'             => ['controller' => 'AuthController', 'method' => 'register'],

    '/users'                => ['controller' => 'UserController', 'method' => 'getAllUsers'],
    '/add_user'             => ['controller' => 'UserController', 'method' => 'addUser'],
    '/delete_user'          => ['controller' => 'UserController', 'method' => 'deleteUser'],
    '/delete_all_users'     => ['controller' => 'UserController', 'method' => 'deleteUsers'],
    '/update_user'          => ['controller' => 'UserController', 'method' => 'updateUser'],

    '/movies'               => ['controller' => 'MovieController', 'method' => 'getAllMovies'],
    '/add_movie'            => ['controller' => 'MovieController', 'method' => 'addMovie'],
    '/delete_movie'         => ['controller' => 'MovieController', 'method' => 'deleteMovie'],
    '/delete_all_movies'    => ['controller' => 'MovieController', 'method' => 'deleteMovies'],
    '/update_movie'         => ['controller' => 'MovieController', 'method' => 'updateMovie'],

    '/seats'                => ['controller' => 'SeatController', 'method' => 'getAllSeats'],
    '/add_seat'             => ['controller' => 'SeatController', 'method' => 'addSeat'],
    '/delete_seat'          => ['controller' => 'SeatController', 'method' => 'deleteSeat'],
    '/delete_all_seats'     => ['controller' => 'SeatController', 'method' => 'deleteSeats'],
    '/update_seat'          => ['controller' => 'SeatController', 'method' => 'updateSeat'],
];