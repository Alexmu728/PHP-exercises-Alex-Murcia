<?php

    session_start();

    require "Model.php";

    if(!isset($_SESSION["movies"])){
        $_SESSION["movies"]=[];
    }
    if(!isset($_SESSION["username"])){
        $_SESSION["username"]="";
    } 

    if($_SERVER["REQUEST_METHOD"]=="POST"){
        if(isset($_POST["user"])){
            $_SESSION["username"]=$_POST["user"];
        }
        if(isset($_POST["name"], $_POST["isan"], $_POST["year"], $_POST["punctuation"])){
            $movies=$_SESSION["movies"];
            
                $name=$_POST["name"];
                $isan=$_POST["isan"];
                $year=$_POST["year"];
                $punctuation=$_POST["punctuation"];
            
                if(empty($name) && empty($isan)){
                    echo "The name and the isan are empty</br>";
                }elseif(!empty($isan) && strlen($isan)== 8){
                    $existingIsan=false;

                    foreach($movies as &$movie){
                        if($movie["isan"]==$isan){
                            $existingIsan=true;

                            if(!empty($name) && !empty($year) && !empty($punctuation)){
                                $movie["name"]=$name;
                                $movie["year"]=$year;
                                $movie["punctuation"]=$punctuation;
                                echo "Movie modified. Name: $name, ISAN: $isan, Year: $year and Punctuation: $punctuation</br>";
                            }else{
                                $key=array_search($movie, $movies);
                                unset($movies[$key]);
                                echo "Movie with ISAN $isan deleted</br>";
                            }
                            break;
                        }
                    }
                    if(!$existingIsan){
                        if(!empty($name) && !empty($year) && !empty($punctuation)){
                            $movies[]= ["name"=>$name, "year"=>$year, "isan"=>$isan, "punctuation"=>$punctuation];
                            echo "Movie registered. Name: $name, ISAN: $isan, Year: $year and Punctuation: $punctuation</br>";
                        }else{
                            echo "Not all fields have value</br>";
                        }
                    }

                }elseif(empty($isan) && !empty($name)){
                    $founded=false;
                    foreach($movies as $movie){
                        if(stripos($movie["name"], $name)!= false){
                            echo "<li>".$movie["name"]." ".$movie["year"]."</li>";
                            $founded=true;
                        }
                    }
                    if(!$founded){
                        echo "<li>No movies found</li>";
                    }
                }else{
                    echo "Error";
                }
            
        }
    }
    

?>

