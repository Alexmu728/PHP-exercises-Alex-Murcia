<?php

function moviesInputs(&$movies, $name, $isan, $year, $punctuation){
    if(empty($name) && empty($isan)){
        return "The name and the isan are empty</br>";
    }

    if(!empty($isan) && strlen($isan)== 8){
        $existingIsan=false;

        foreach($movies as &$movie){
            if($movie["isan"]==$isan){
                $existingIsan=true;

                if(!empty($name) && !empty($year) && !empty($punctuation)){
                    $movie["name"]=$name;
                    $movie["year"]=$year;
                    $movie["punctuation"]=$punctuation;
                    return "Movie modified. Name: $name, ISAN: $isan, Year: $year and Punctuation: $punctuation</br>";
                }else{
                    $key=array_search($movie, $movies);
                    unset($movies[$key]);
                    return "Movie with ISAN $isan deleted</br>";
                }
            }
        }

        if(!$existingIsan){
            if(!empty($name) && !empty($year) && !empty($punctuation)){
                $movies[]= ["name"=>$name, "year"=>$year, "isan"=>$isan, "punctuation"=>$punctuation];
                return "Movie registered. Name: $name, ISAN: $isan, Year: $year and Punctuation: $punctuation</br>";
            }else{
                return "Not all fields have value</br>";
            }
        }

    }elseif(empty($isan) && !empty($name)){
        $founded=false;
        $output="";
        foreach($movies as $movie){
            if(stripos($movie["name"], $name)!== false){
                $output .= "<li>" . htmlspecialchars($movie["name"]) . " " . htmlspecialchars($movie["year"]) . "</li>";
                $founded=true;
            }
        }
        if($founded){
            return $output;
        }else{
            return "<li>No movies found</li>";
        }
    }
    return "Error processing movie data";
}