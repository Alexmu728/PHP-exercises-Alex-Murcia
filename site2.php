<!DOCTYPE HTML>

<html>

	<head>

		<meta charset="utf-8">

		<title></title>

	</head>

	<body>

		<?php

			$biggest=0;
            $num1 = rand(1, 100);
            $num2 = rand(1, 100);
            $num3 = rand(1, 100);

            if($num1>$biggest){
                $biggest=$num1;
            }
            if($num2>$biggest){
                $biggest=$num2;
            }
            if($num3>$biggest){
                $biggest=$num3;
            }

            echo "$num1<br>$num2<br>$num3<br>";
            echo "The biggest number is $biggest";
		?>

	</body>

</html>