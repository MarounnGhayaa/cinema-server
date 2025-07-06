<?php
 
require('BaseController.php');
class SeatController{
    
    public function getAllSeats(){
        global $mysqli;

        if(!isset($_GET["id"])){
            $seats = Seat::all($mysqli);
            $seats_array = SeatService::SeatsToArray($seats); 
            echo ResponseService::success_response($seats_array);
            return;
        }

        $id = $_GET["id"];
        $seat = Seat::find($mysqli, $id)->toArray();
        echo ResponseService::success_response($seat);
        return;
    }

    public function Seat() {
        global $mysqli;

        $data = [
            "auditorium_id" => $_GET['auditorium_id'],
            "seat_number" => $_GET["seat_number"],
            "is_selected" => $_GET["is_selected"],
        ];

        if (!isset($data["auditorium_id"]) || !isset($data["seat_number"]) || !isset($data["is_selected"])) {
            echo json_encode(["success" => false, "message" => "Missing data"]);
            exit;
        }

        $seat = Seat::create($mysqli, $data, "iii");
    
        echo ResponseService::success_response($seat);
        return;    
    }

    public function deleteSeats(){
        global $mysqli;

        $response = Seat::deleteAll($mysqli);
        echo ResponseService::success_response($response);
        
        return;
    }

    public function deleteSeat() {
        global $mysqli;

        $data = json_decode(file_get_contents("php://input"), true);
        $id = $data["id"];

        $seat = Seat::deleteByID($mysqli, $id);
        echo ResponseService::success_response($seat);

        return;
    }

    public function updateSeat(){
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

        $updated_article = Seat::update($mysqli, "si", $column_name, $new_value, $id);
        echo ResponseService::success_response($updated_article);
        return;
    }

}
