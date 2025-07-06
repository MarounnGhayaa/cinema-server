<?php 

class SeatService {

    public static function SeatsToArray($seats_db){
        $results = [];

        foreach($seats_db as $s){
             $results[] = $s->toArray();
        } 

        return $results;
    }
}