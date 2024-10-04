<?php

function moviesInputs(&$movies, $name, $isan, $year, $punctuation){
    if(empty($name) && empty($isan)){   //Checks if the name and isan forms are empty
        return "The name and the isan are empty</br>";
    }

    if(!empty($isan) && strlen($isan)== 8){  //Checks if the isan is not empty and has a lenght of 8 digits
        $existingIsan=false;  //Boolean to check that the Isan doesn't exists

        foreach($movies as &$movie){   //loop on movies 
            if($movie["isan"]==$isan){  //Conditional to see if the Isan each movies has is the same that has been introduced in the form
                $existingIsan=true;  

                if(!empty($name) && !empty($year) && !empty($punctuation)){  // Conditional to see that all the forms are not empty and as the isan exists, just changes the content of those variables modifying the movie
                    $movie["name"]=$name;
                    $movie["year"]=$year;
                    $movie["punctuation"]=$punctuation;
                    return "Movie modified. Name: $name, ISAN: $isan, Year: $year and Punctuation: $punctuation</br>";
                }else{  //  If any of the other forms are empty, then the movie with the introduced Isan on the form, will be deleted
                    $key=array_search($movie, $movies);
                    unset($movies[$key]);
                    return "Movie with ISAN $isan deleted</br>";
                }
            }
        }

        if(!$existingIsan){  //  Checks that the introduces Isan does not exist
            if(!empty($name) && !empty($year) && !empty($punctuation)){   //  Checks that the other forms are not empty to add the information of the new movie as the Isan does not exist
                $movies[]= ["name"=>$name, "year"=>$year, "isan"=>$isan, "punctuation"=>$punctuation];
                return "Movie registered. Name: $name, ISAN: $isan, Year: $year and Punctuation: $punctuation</br>";
            }else{  // If any field is empty it does not work
                return "Not all fields have value</br>";
            }
        }

    }elseif(empty($isan) && !empty($name)){  //  Checks if the isan is empty and the name is not
        $founded=false;  // A bollean for each time a movie with the introduced name has been found
        $output="";  // An empty string to store the names of the movies once they are found
        foreach($movies as $movie){
            if(stripos($movie["name"], $name)!== false){  //  Checks that the introduced name is stored in any of the registered movies
                $output .= "<li>" . htmlspecialchars($movie["name"]) . " (" . htmlspecialchars($movie["year"]) . ")</li>";
                $founded=true;
            }
        }
        if($founded){  // Checks if the bollean for eaach movie that contains the introduced name is true
            return $output;  // If it is true, the output would be the name and the year of each founded movie
        }else{
            return "<li>No movies found</li>";
        }
    }
    return "Error processing movie data";
}
