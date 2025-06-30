<?php
require_once("Model.php");

class Seat extends Model{

    private int $id; 
    private int $auditorium_id;
    private int $seat_number;
    private bool $is_selected;
    protected static string $table = "seats";

    public function __construct(array $data){
        $this->id = $data["id"];
        $this->auditorium_id = $data["auditorium_id"];
        $this->seat_number = $data["seat_number"];
        $this->is_selected = $data["is_selected"];
    }

    public function getId(): int {
        return $this->id;
    }
    public function getAuditoriumId(): int {
        return $this->auditorium_id;
    }
    public function getSeatNumber(): int {
        return $this->seat_number;
    }
    public function getIsSelected(): bool {
        return $this->is_selected;
    }
    public function setAuditoriumId(int $auditorium_id) {
        $this->auditorium_id = $auditorium_id;
    }
    public function setSeatNumber(int $seat_number) {
        $this->seat_number = $seat_number;
    }
    public function setIsSelected(bool $is_selected) {
        $this->is_selected = $is_selected;
    }
    public function toArray(){
        return [$this->id, $this->auditorium_id, $this->seat_number, $this->is_selected];
    }
    public function toKeyValuePair() {
        return [
            'id' => $this->id,
            'auditorium_id' => $this->auditorium_id,
            'seat_number' => $this->seat_number,
            'is_selected' => $this->is_selected
        ];
    }
}



