<?php 

require('BaseController.php');
class AuthController{
    
    public function login(){

        $data = json_decode(file_get_contents("php://input"), true);
        
        global $mysqli;

        $email = $data["email"];
        $password = $data["password"];

        if (!isset($email) || !isset($password)) {
            echo json_encode(["success" => false, "message" => "Missing data"]);
            exit;
        }

        $response = User::loginUser($mysqli, $email, $password);
        echo json_encode($response);
    }

    public function register() {
        global $mysqli;

        $data = json_decode(file_get_contents("php://input"), true);

        $name = $data["name"];
        $email = $data["email"];
        $password = $data["password"];
        $phone_number = $data["phone_number"];
        $age = $data["age"];
        $favorite_genre = $data["favorite_genre"];

        if (!isset($data["name"]) || !isset($data["email"]) || !isset($data["password"]) || !isset($data["phone_number"]) || !isset($data["age"]) || !isset($data["favorite_genre"])) {
            echo json_encode(["success" => false, "message" => "Missing data"]);
        exit;
        }

        $newId = User::create($mysqli, $data, "sssiis");

        if ($newId) {
            echo json_encode([
                "success" => true,
                "user" => [
                        "id" => $newId,
                        "name" => $name,
                        "email" => $email,
                        "password" => $password,
                        "phone_number" => $phone_number,
                        "age" => $age,
                        "favorite_genre" => $favorite_genre
                    ]
            ]);
    
        } else {
            echo json_encode([
                "success" => false,
                "message" => "Registration failed."
            ]);
        }
    }
}
