<?php
require_once("Model.php");

class Movie extends Model{

    private int $id; 
    private string $title;
    private string $description;
    private string $cast;
    private string $rating;
    private string $genre;
    private string $image_url;
    protected static string $table = "movies";

    public function __construct(array $data){
        $this->id = $data["id"];
        $this->title = $data["title"];
        $this->description = $data["description"];
        $this->cast = $data["cast"];
        $this->rating = $data["rating"];
        $this->genre = $data["genre"];
        $this->image_url = $data["image_url"];
    }

    public function getId(): int {
        return $this->id;
    }
    public function getTitle(): string {
        return $this->title;
    }
    public function getEDescription(): string {
        return $this->description;
    }
    public function getCast(): string {
        return $this->cast;
    }
    public function getRating(): string {
        return $this->rating;
    }
    public function getGenre(): string {
        return $this->genre;
    }
    public function getImageUrl(): string {
        return $this->image_url;
    }
    public function setTitle(string $title) {
        $this->title = $title;
    }

    public function setDescription(string $description) {
        $this->description = $description;
    }
    public function setCast(string $cast) {
        $this->cast = $cast;
    }
    public function setRating(string $rating) {
        $this->rating = $rating;
    }
    public function setGenre(string $genre) {
        $this->genre = $genre;
    }
    public function setImageUrl(string $image_url) {
        $this->image_url = $image_url;
    }
    public function toArray(){
        return [$this->id, $this->title, $this->description, $this->cast, $this->rating, $this->genre, $this->image_url];
    }

    public function toKeyValuePair() {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->description,
            'cast' => $this->cast,
            'rating' => $this->rating,
            'genre' => $this->genre,
            'image_url' => $this->image_url
        ];
    }
}