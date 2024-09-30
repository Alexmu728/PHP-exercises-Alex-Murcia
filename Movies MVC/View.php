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