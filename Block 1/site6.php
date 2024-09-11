<!DOCTYPE HTML>

<html>

	<head>

		<meta charset="utf-8">

		<title></title>

	</head>

	<body>

		<?php

		
			$power= rand(1, 5);
            $cuantity= rand(100, 200);

            $i=0;
            $result=0;
            echo "power $power cuantity $cuantity<br>";

            while($result<$cuantity){
                $i++;
                $result= $i ** $power;
                
                if ($result <= $cuantity) {
                    echo "$i - $result<br>";
                }
            };
		?>

	</body>

</html>