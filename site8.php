<!DOCTYPE HTML>

<html>

	<head>

		<meta charset="utf-8">

		<title></title>

	</head>

	<body>

		<?php

		
			$base= rand(1, 100);

            echo "$base<br>";

            if($base%2==1){
                for($i=0;$i<=$base;$i++){
                    echo "* ";
                    for($j=$i;$j<$i;$j--){
                        echo " *";
                    
                    }
                    echo "<br>";
                }
            }
            
		?>

	</body>

</html>