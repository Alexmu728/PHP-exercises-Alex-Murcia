<!DOCTYPE HTML>

<html>

	<head>

		<meta charset="utf-8">

		<title></title>

	</head>

	<body>

		<?php

		
			$word = "ananan";

			$reverse =  strrev($word);

			if($word == $reverse){
				echo "It is plaindrome";
			} else {
				echo "It is not palindrome"; 
			}

		?>

	</body>

</html>