<!DOCTYPE HTML>

<html>

	<head>

		<meta charset="utf-8">

		<title></title>

	</head>

	<body>

        <div style="height:50%;">
        

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

		<?php
        
        $movies=array();

            if($_SERVER["REQUEST_METHOD"]=="POST"){
                $name=$_POST["name"];
                $isan=$_POST["isan"];
                $year=$_POST["year"];
                $punctuation=$_POST["punctuation"];
            }

            if(empty($name) && empty($isan)){
                echo "The name and the isan are empty";
            }else if(!empty($isan) && strlen($isan)== 8){
                if(!empty($name) && !empty($year) && !empty($punctuation)){
                    foreach($movies as $movie){
                        if($movie[$isan]==$isan){
                            $movie[$name]=$name;
                            $movie[$year]=$year;
                            $movie[$punctuation]=$punctuation;
                            echo "Movie modified. Name: $name, ISAN: $isan, Year: $year and Punctuation: $punctuation";
                        }else{
                            $movie[$name]=$name;
                            $movie[$year]=$year;
                            $movie[$isan]=$isan;
                            $movie[$punctuation]=$punctuation;
                            echo "Movie registered. Name: $name, ISAN: $isan, Year: $year and Punctuation: $punctuation";
                        }
                    }
                }else{
                    echo "Not all the fields have value";
                }
            }else if(empty($isan) && !empty($name)){
                foreach($movies as $movie){
                    foreach($movie[$name] as $moviename){
                        if($moviename == $name){
                            echo"<ul>$moviename</ul>";
                        }
                    }
                }
            }else{
                echo "Error";
            }

            
            
		?>

	</body>

</html>