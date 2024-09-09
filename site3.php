<!DOCTYPE HTML>

<html>

	<head>

		<meta charset="utf-8">

		<title></title>

	</head>

	<body>

		<?php

		
            $num1 = rand(1, 100);
            
            echo "If the given number is $num1 it should show <br>.";

            if($num1>0 && $num1<=10){
                echo "He is between 1 and 10 years old";
            }
            elseif($num1>10 && $num1<=20){
                echo "He is between 10 and 20 years old";
            }
            elseif($num1>20 && $num1<=30){
                echo "He is between 20 and 30 years old";
            }
            elseif($num1>30 && $num1<=40){
                echo "He is between 30 and 40 years old";
            }
            elseif($num1>40 && $num1<=50){
                echo "He is between 40 and 50 years old";
            }
            elseif($num1>50 && $num1<=60){
                echo "He is between 50 and 60 years old";
            }
            elseif($num1>60 && $num1<=70){
                echo "He is between 60 and 70 years old";
            }
            elseif($num1>70 && $num1<=80){
                echo "He is between 70 and 80 years old";
            }elseif($num1>80 && $num1<=90){
                echo "He is between 80 and 90 years old";
            }
            elseif($num1>90 && $num1<=100){
                echo "He is between 90 and 100 years old";
            }

		?>

	</body>

</html>