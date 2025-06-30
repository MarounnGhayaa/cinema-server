<?php
require_once("Model.php");

class Auditorium extends Model{

    private int $id;
    private string $name;
    private int $seat_capacity;
    private string $type;
    protected static string $table = "auditoriums";

    public function __construct(array $data){
        $this->id = $data["id"];
        $this->name = $data["name"];
        $this->seat_capacity = $data["seat_capacity"];
        $this->type = $data["type"];
    }

    public function getId(): int {
        return $this->id;
    }
    public function getName(): string {
        return $this->name;
    }
    public function getSeatCapacity(): int {
        return $this->seat_capacity;
    }
    public function getType(): string {
        return $this->type;
    }
    public function setName(string $name) {
        $this->name = $name;
    }
    public function setSeatCapacity(int $seat_capacity) {
        $this->seat_capacity = $seat_capacity;
    }
    public function setType(string $type) {
        $this->type = $type;
    }
    public function toArray(){
        return [$this->id, $this->name, $this->seat_capacity, $this->type];
    }
    public function toKeyValuePair() {
        return 
        [
            'id' => $this->id,
            'name' => $this->name,
            'seat_capacity' => $this->seat_capacity,
            'type' => $this->type
        ];
    }
}