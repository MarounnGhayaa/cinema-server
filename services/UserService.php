<?php 

class UserService {

    public static function UsersToArray($users_db){
        $results = [];

        foreach($users_db as $u){
             $results[] = $u->toArray();
        } 

        return $results;
    }
}