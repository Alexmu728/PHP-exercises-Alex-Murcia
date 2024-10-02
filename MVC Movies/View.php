<!DOCTYPE HTML>

<html>

	<head>

		<meta charset="utf-8">

		<title></title>

	</head>

	<body>

        <h1>
            <?php 
            echo !empty($username) ? htmlspecialchars($username) : ""; 
            ?>'s Movies:
        </h1>

        <div style="height:10%;">
        

        </div>

        <div style="height:50%;">
            <form method="POST" action="Controller.php">

                <label for="name">Name of the film:</label><br>
                <input type="text" id="name" name="name" value="<?php echo isset($_POST['name']) ?htmlspecialchars($_POST['name']):'';?>"><br><br>

                <label for="isan">ISAN number:</label><br>
                <input type="text" id="isan" name="isan" value="<?php echo isset($_POST['isan']) ?htmlspecialchars($_POST['isan']):'';?>"><br><br>

                <label for="year">Movie year:</label><br>
                <input type="text" id="year" name="year" value="<?php echo isset($_POST['year']) ?htmlspecialchars($_POST['year']):'';?>"><br><br>

                <label for="punctuation">Punctuation: </label><br>
                <select id="punctuation" name="punctuation">
                    <option value='0'<?php echo (isset($_POST['punctuation']) && $_POST['punctuation']== '0')?'selected' :'';?>>0</option>
                    <option value='1'<?php echo (isset($_POST['punctuation']) && $_POST['punctuation']== '1')?'selected' :'';?>>1</option>
                    <option value='2'<?php echo (isset($_POST['punctuation']) && $_POST['punctuation']== '2')?'selected' :'';?>>2</option>
                    <option value='3'<?php echo (isset($_POST['punctuation']) && $_POST['punctuation']== '3')?'selected' :'';?>>3</option>
                    <option value='4'<?php echo (isset($_POST['punctuation']) && $_POST['punctuation']== '4')?'selected' :'';?>>4</option>
                    <option value='5'<?php echo (isset($_POST['punctuation']) && $_POST['punctuation']== '5')?'selected' :'';?>>5</option>
                </select>
                <br><br>

                <input type="submit" value="Submit">
            </form>
        </div>


        <h2>Current Movies:</h2>
        <ul>
            <?php
            if(!empty($movies)){
                foreach($movies as $movie){
                    echo "<li>" . htmlspecialchars($movie["name"]) . " (" . htmlspecialchars($movie["year"]) . "), ISAN: " . htmlspecialchars($movie["isan"]) . ", Punctuation: " . htmlspecialchars($movie["punctuation"]) . "</li>";
                }
            }else{
                echo "<li>No movies found</li>";
            }
            ?>
        </ul>
        <h3><?php echo isset($function) ? $function: "";?></h3>

	</body>

</html>