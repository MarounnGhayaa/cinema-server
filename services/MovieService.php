<?php 

class MovieService {

    public static function MoviesToArray($movies_db){
        $results = [];

        foreach($movies_db as $m){
             $results[] = $m->toArray();
        } 

        return $results;
    }

}