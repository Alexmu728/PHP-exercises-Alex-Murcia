<?php
        session_start();

        if(!isset($_SESSION["movies"])){
            $_SESSION["movies"]=[];
        }
        
        $movies=$_SESSION["movies"];

            if($_SERVER["REQUEST_METHOD"]=="POST"){
                $name=$_POST["name"];
                $isan=$_POST["isan"];
                $year=$_POST["year"];
                $punctuation=$_POST["punctuation"];
            
                if(empty($name) && empty($isan)){
                    echo "The name and the isan are empty";
                }elseif(!empty($isan) && strlen($isan)== 8){
                    if(!empty($name) && !empty($year) && !empty($punctuation)){
                        $existingMovie=false;
                        $existingIsan=false;

                        foreach($movies as &$movie){
                            if($movie["isan"]==$isan){
                                $movie["name"]=$name;
                                $movie["year"]=$year;
                                $movie["punctuation"]=$punctuation;
                                $existingMovie=true;
                                echo "Movie modified. Name: $name, ISAN: $isan, Year: $year and Punctuation: $punctuation";
                                break;
                            }
                        }
                        if(!$existingMovie){
                            foreach($movies as $movie){
                                if($movie["isan"]==$isan){
                                    $existingIsan=true;
                                    break;
                                }
                            }

                            if($existingIsan){
                                echo "You are trying to register an ISAN number that has already been added.";
                            }else{
                                $movies[]= ["name"=>$name, "year"=>$year, "isan"=>$isan, "punctuation"=>$punctuation];
                            echo "Movie registered. Name: $name, ISAN: $isan, Year: $year and Punctuation: $punctuation";
                            }
                        }
                    }else{
                        echo "Not all the fields have value";
                    }
                }elseif(empty($isan) && !empty($name)){
                    foreach($movies as $movie){
                        if(stripos($movie["name"], $name)!= false){
                            echo "<li>".$movie["name"]." ".$movie["year"]."</li>";
                        }else{
                            echo "<li>No movies found</li>";
                        }
                    }
                }else{
                    echo "Error";
                }
            }
            
		?>
<!DOCTYPE HTML>

<html>

	<head>

		<meta charset="utf-8">

		<title></title>

	</head>

	<body>

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

		

	</body>

</html>