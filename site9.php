<!DOCTYPE HTML>

<html>

	<head>

		<meta charset="utf-8">

		<title></title>

	</head>

	<body>

		<?php

		
			$sold= rand(7000, 60000);
            $percentage=0;
            $commission=0;
            
            echo "$sold €";

            if($sold<10000){
                $percentage=5;
                echo " $percentage %<br>";

                $commission= $sold*1.05;
                echo "Commission: $commission";
            }elseif($sold>=10000 && $sold<20000){
                $percentage=8;
                echo " $percentage %<br>";

                $commission= $sold*1.08;
                echo "Commission: $commission";
            }
            elseif($sold>=20000 && $sold<40000){
                $percentage=10;
                echo " $percentage %<br>";

                $commission= $sold*1.10;
                echo "Commission: $commission";
            }elseif($sold>=40000){
                $percentage=13;
                echo " $percentage %<br>";

                $commission= $sold*1.13;
                echo "Commission: $commission";
            }

		?>

	</body>

</html>