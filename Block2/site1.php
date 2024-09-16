<!DOCTYPE HTML>

<html>

	<head>

		<meta charset="utf-8">

		<title></title>

	</head>

	<body>

		<?php

			$array1=[0,1,2,3,4,5,6,7,8,9];
            foreach($array1 as $x){
                echo "$x ";
            }

            echo "<br>";

            $array2=[];

            foreach($array1 as $num) {
                $factorial=1;
                for ($i=1;$i<=$num;$i++) {
                    $factorial=$factorial*$i;
                }
                $array2[]=$factorial;
            }
    
            foreach($array2 as $x) {
                echo "$x ";
            }

		?>

	</body>

</html>