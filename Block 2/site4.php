<!DOCTYPE HTML>

<html>

	<head>

		<meta charset="utf-8">

		<title></title>

	</head>

	<body>

		<?php

			$string="last god spider requiem knight";

            $words=explode(" ", $string);

            $array=[];

            foreach($words as $key){
                $array[$key]=strlen($key);
            }
            var_dump($array);
		?>

	</body>

</html>