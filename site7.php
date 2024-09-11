<!DOCTYPE HTML>

<html>

	<head>

		<meta charset="utf-8">

		<title></title>

	</head>

	<body>

		<?php

		
			$number= rand(10, 100);
            echo $number;

            while($number!=1){
                if($number%2==0){
                    $number=$number/2;
                    echo ", $number";

                }elseif($number%2==1){
                    $number=$number*3+1;
                    echo ", $number";
                }
            };
		?>

	</body>

</html>