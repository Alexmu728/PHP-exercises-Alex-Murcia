<!DOCTYPE HTML>

<html>

	<head>

		<meta charset="utf-8">

		<title></title>

	</head>

	<body>

		<?php

			function createTable($num1, $num2){
                echo "<table border='1'>";

                for($i=0;$i<$num1;$i++){
                    echo "<tr>";
                    for($j=0;$j<$num2;$j++){
                        echo "<td>table</td>";
                    }
                    echo "</tr>";
                }
            }

            $num1= rand(1,10);
            $num2= rand(1,10);

            createTable($num1, $num2);

		?>

	</body>

</html>