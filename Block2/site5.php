<!DOCTYPE HTML>

<html>

	<head>

		<meta charset="utf-8">

		<title></title>

	</head>

	<body>

		<?php

			$months=array("January"=>"31", "February"=>"28","March"=>"31","April"=>"30","May"=>"31","June"=>"30","July"=>"31","August"=>"31","September"=>"30","October"=>"31","November"=>"30","December"=>"31");

            echo "<table border='1'>";
            echo "<tr>";
            echo "<td>Index</td>";
            foreach (array_keys($months) as $month) {
                echo "<td>$month</td>";
            }
            echo "<tr>";
            echo "<td>Value</td>";
            foreach ($months as $month => $days) {
                echo "<td>$days</td>";
            }
            echo "</table>";
            
		?>

	</body>

</html>