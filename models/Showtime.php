<?php
require_once("Model.php");

class Showtime extends Model{

    private int $id;
    private int $movie_id;
    private int $auditorium_id;
    private $show_date;
    private $show_time;
    protected static string $table = "showtimes";

    public function __construct(array $data){
        $this->id = $data["id"];
        $this->movie_id = $data["movie_id"];
        $this->auditorium_id = $data["auditorium_id"];
        $this->show_date = $data["show_date"];
        $this->show_time = $data["show_time"];
    }

    public function getId(): int {
        return $this->id;
    }
    public function getMovieId(): int {
        return $this->movie_id;
    }
    public function getAuditoriumId(): int {
        return $this->auditorium_id;
    }
    public function getShowDate() {
        return $this->show_date;
    }
    public function getShowTime() {
        return $this->show_time;
    }
    public function setMovieId(int $movie_id) {
        $this->movie_id = $movie_id;
    }
    public function setAuditoriumId(int $auditorium_id) {
        $this->auditorium_id = $auditorium_id;
    }
    public function setShowDate($show_date) {
        $this->show_date = $show_date;
    }
    public function setShowTime($show_time) {
        $this->show_time = $show_time;
    }
    public function toArray(){
        return [$this->id, $this->movie_id, $this->auditorium_id, $this->show_date, $this->show_time];
    }
    public function toKeyValuePair() {
        return 
        [
            'id' => $this->id,
            'movie_id' => $this->movie_id,
            'auditorium_id' => $this->auditorium_id,
            'show_date' => $this->show_date,
            'show_time' => $this->show_time
        ];
    }
}