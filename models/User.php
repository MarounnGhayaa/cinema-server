<?php
require_once("Model.php");

class User extends Model{

    private int $id; 
    private string $name;
    private string $email;
    private string $password;
    private string $favorite_genre;
    private int $phone_number;
    private int $age;
    private string $role;
    protected static string $table = "users";

    public function __construct(array $data){
        $this->id = $data["id"];
        $this->name = $data["name"];
        $this->email = $data["email"];
        $this->password = $data["password"];
        $this->favorite_genre = $data["favorite_genre"];
        $this->phone_number = $data["phone_number"];
        $this->age = $data["age"];
        $this->role = $data["role"];
    }

    public function getId(): int {
        return $this->id;
    }
    public function getName(): string {
        return $this->name;
    }
    public function getEmail(): string {
        return $this->email;
    }
    public function getPassword(): string {
        return $this->password;
    }
    public function getFavoriteGenre(): string {
        return $this->favorite_genre;
    }

     public function getPhoneNumber(): int {
        return $this->phone_number;
    }

    public function getAge(): int {
        return $this->age;
    }
    public function getRole(): string {
        return $this->role;
    }
    public function setName(string $name) {
        $this->name = $name;
    }
    public function setEmail(string $email) {
        $this->email = $email;
    }
    public function setPassword(string $password) {
        $this->password = $password;
    }
    public function setFavoriteGenre(string $favorite_genre) {
        $this->favorite_genre = $favorite_genre;
    }

    public function setPhoneNumber(int $phone_number) {
        $this->phone_number = $phone_number;
    }

    public function setAge(int $age) {
        $this->age = $age;
    }   
    public function setRole(string $role) {
        $this->role = $role;
    }
    public function toArray(){
        return [$this->id, $this->name, $this->email, $this->password, $this->favorite_genre, $this->phone_number, $this->age, $this->role];
    }
    public function toKeyValuePair() {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'password' => $this->password,
            'favorite_genre' => $this->favorite_genre,
            'phone_number' => $this->phone_number,
            'age' => $this->age,
            'role' => $this->role
    ];
    }
    public static function loginUser($mysqli, $email, $password) {
        $query = $mysqli->prepare("SELECT id, name, email, favorite_genre, phone_number, age, role 
                                    FROM users 
                                    WHERE email = ? AND password = ?");

        $query->bind_param("ss", $email, $password);
        $query->execute();
        $result = $query->get_result();

        if ($row = $result->fetch_assoc()) {
            return [
                "success" => true,
                "user" => $row
            ];
        } else {
            return [
                "success" => false,
                "message" => "Invalid email or password"
            ];
        }
    }
  
}



