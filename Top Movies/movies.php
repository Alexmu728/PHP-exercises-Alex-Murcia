<?php
        session_start();

        if(!isset($_SESSION["movies"])){
            $_SESSION["movies"]=[];
        }
        if(!isset($_SESSION["username"])){
            $_SESSION["username"]="";
        }
        
        $movies=$_SESSION["movies"];

        if($_SERVER["REQUEST_METHOD"]=="POST" && isset($_POST["user"])){
            $_SESSION["username"]=$_POST["user"];
        }

        $username=$_SESSION["username"];


            if($_SERVER["REQUEST_METHOD"]=="POST" && isset($_POST["name"], $_POST["isan"],  $_POST["year"], $_POST["punctuation"])){
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

            $_SESSION["movies"]=$movies;
            
		?>
<!DOCTYPE HTML>

<html>

	<head>

		<meta charset="utf-8">

		<title></title>

	</head>

	<body>

        <h1>
            <?php 
            echo $username; 
            ?>'s Movies:
        </h1>

        <div style="height:10%;">
        

        </div>

        <div style="height:50%;">
            <form method="POST" action="movies.php">

                <label for="name">Name of the film:</label><br>
                <input type="text" id="name" name="name"><br><br>

                <label for="isan">ISAN number:</label><br>
                <input type="text" id="isan" name="isan"><br><br>

                <label for="year">Movie year:</label><br>
                <input type="text" id="year" name="year"><br><br>

                <label for="punctuation">Punctuation: </label><br>
                <select id="punctuation" name="punctuation">
                    <option value='0' >0</option>
                    <option value='1' >1</option>
                    <option value='2' >2</option>
                    <option value='3' >3</option>
                    <option value='4' >4</option>
                    <option value='5' >5</option>
                </select>
                <br><br>

                <input type="submit" value="Submit">
            </form>
        </div>

        <h2>Current Movies:</h2>
        <ul>
            <?php

            foreach($movies as $movie){
                echo "<li>".$movie["name"]." (".$movie["year"] . "), ISAN: ".$movie["isan"] . ", Punctuation: ".$movie["punctuation"] . "</li>";
            }
            ?>
        </ul>

	</body>

</html>