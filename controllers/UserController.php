<?php 

require('BaseController.php');

class UserController{
    
    public function getAllUsers(){
        global $mysqli;

        if(!isset($_GET["id"])){
            $users = User::all($mysqli);
            $users_array = UserService::usersToArray($users); 
            echo ResponseService::success_response($users_array);
            return;
        }

        $id = $_GET["id"];
        $user = User::find($mysqli, $id)->toArray();
        echo ResponseService::success_response($user);
        return;
    }

    public function addUser() {
        global $mysqli;

        $data = [
            "name" => $_GET['name'],
            "email" => $_GET["email"],
            "password" => $_GET["password"],
            "favorite_genre" => $_GET["favorite_genre"],
            "phone_number" => $_GET["phone_number"],
            "age" => $_GET["age"]
        ];

        if (!isset($data["name"]) || !isset($data["email"]) || !isset($data["password"]) || !isset($data["favorite_genre"]) || !isset($data["phone_number"]) || !isset($data["age"])) {
            echo json_encode(["success" => false, "message" => "Missing data"]);
            exit;
        }

        $user = User::create($mysqli, $data, "ssssii");
    
        echo ResponseService::success_response($user);
        return;    
    }

    public function deleteUsers(){
        global $mysqli;

        $response = User::deleteAll($mysqli);
        echo ResponseService::success_response($response);
        
        return;
    }

    public function deleteUser() {
        global $mysqli;

        $data = json_decode(file_get_contents("php://input"), true);
        $id = $data["id"];

        $user = User::deleteByID($mysqli, $id);
        echo ResponseService::success_response($user);

        return;
    }

    public function updateUser(){
        global $mysqli;

        $data = json_decode(file_get_contents("php://input"), true);

        if (!isset($data["column_name"]) || !isset($data["new_value"]) || !isset($data["id"])) {
            echo json_encode(["success" => false, "message" => "Missing data"]);
            exit;
        }

        $column_name = $data["column_name"];
        $new_value = $data["new_value"];
        $id = $data["id"];

        $updated_article = User::update($mysqli, "si", $column_name, $new_value, $id);
        echo ResponseService::success_response($updated_article);
        return;
    }

}
