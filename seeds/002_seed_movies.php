<?php

require("../connection/connection.php");
require("../Models/Movie.php");

$movies = [
    [
        "title" => "Project Impossible",
        "description" => "A media franchise centered around the Impossible Missions Force (IMF), a fictional clandestine organization of secret agents.",
        "cast" => "Tom Cruise, Simon Pegg, Rebecca Ferguson",
        "rating" => "PG-13",
        "genre" => "Action",
        "image_url" => "http://127.0.0.1:5500/assests/MissionImpossible.jpg"
    ],
    [
        "title" => "The Grand Heist",
        "description" => "A brilliant mastermind assembles a team for a once-in-a-lifetime museum robbery.",
        "cast" => "Oscar Isaac, Emily Blunt, Mahershala Ali",
        "rating" => "PG-13",
        "genre" => "Crime",
        "image_url" => "http://127.0.0.1:5500/assests/grandHeist.avif"
    ],
    [
        "title" => "Echoes of Time",
        "description" => "A physicist discovers a way to communicate with the past, but tampering with time has serious consequences.",
        "cast" => "Jake Gyllenhaal, Natalie Portman, Ken Watanabe",
        "rating" => "PG",
        "genre" => "Sci-Fi",
        "image_url" => "http://127.0.0.1:5500/assests/echosOfTime.jpg"
    ],
    [
        "title" => "Hearts in Paris",
        "description" => "Two strangers meet in Paris and form a deep connection that changes their lives forever.",
        "cast" => "Timothée Chalamet, Zendaya, Marion Cotillard",
        "rating" => "PG-13",
        "genre" => "Romance",
        "image_url" => "http://127.0.0.1:5500/assests/heartsInParis.jpg"
    ],
    [
        "title" => "The Laugh Riot",
        "description" => "A stand-up comedian finds unexpected fame after a viral joke—but it comes at a price.",
        "cast" => "Kevin Hart, Awkwafina, Steve Carell",
        "rating" => "PG",
        "genre" => "Comedy",
        "image_url" => "http://127.0.0.1:5500/assests/laughRiot.jpg"
    ],
];

foreach ($movies as $movie) {
    $movie = Movie::Create($mysqli, $movie, "ssssss");
}
echo json_encode("Movies seeded successfully.");
