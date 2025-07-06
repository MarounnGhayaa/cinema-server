<?php

require('BaseController.php');
class MovieController{
    
    public function getAllMovies(){
        global $mysqli;

        if(!isset($_GET["id"])){
            $movies = Movie::all($mysqli);
            $movies_array = MovieService::MoviesToArray($movies); 
            echo ResponseService::success_response($movies_array);
            return;
        }

        $id = $_GET["id"];
        $movie = Movie::find($mysqli, $id)->toArray();
        echo ResponseService::success_response($movie);
        return;
    }

    public function addMovie() {
        global $mysqli;

        $data = [
            "title" => $_GET['title'],
            "description" => $_GET["description"],
            "cast" => $_GET["cast"],
            "rating" => $_GET["rating"],
            "genre" => $_GET["genre"],
            "image_url" => $_GET["image_url"]
        ];

        if (!isset($data["title"]) || !isset($data["description"]) || !isset($data["cast"]) || !isset($data["rating"]) || !isset($data["genre"]) || !isset($data["image_url"])) {
            echo json_encode(["success" => false, "message" => "Missing data"]);
            exit;
        }

        $movie = Movie::create($mysqli, $data, "ssssss");
    
        echo ResponseService::success_response($movie);
        return;    
    }

    public function deleteMovies(){
        global $mysqli;

        $response = Movie::deleteAll($mysqli);
        echo ResponseService::success_response($response);
        
        return;
    }

    public function deleteMovie() {
        global $mysqli;

        $data = json_decode(file_get_contents("php://input"), true);
        $id = $data["id"];

        $movie = Movie::deleteByID($mysqli, $id);
        echo ResponseService::success_response($movie);

        return;
    }

    public function updateMovie(){
        global $mysqli;

        $data = [
            "column_name" => $_GET['column_name'],
            "new_value" => $_GET['new_value'],
            "id" => $_GET['id']
        ];

        if (!isset($data["column_name"]) || !isset($data["new_value"]) || !isset($data["id"])) {
            echo json_encode(["success" => false, "message" => "Missing data"]);
            exit;
        }

        $column_name = $data["column_name"];
        $new_value = $data["new_value"];
        $id = $data["id"];

        $updated_article = Movie::update($mysqli, "si", $column_name, $new_value, $id);
        echo ResponseService::success_response($updated_article);
        return;
    }

}
