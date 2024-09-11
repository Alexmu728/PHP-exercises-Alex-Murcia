<!DOCTYPE HTML>

<html>

	<head>

		<meta charset="utf-8">

		<title></title>

	</head>

	<body>

		<?php

		
			$age= rand(1,100);
            $height= rand(50,200);

            $accompanied= true;

            if($height>=120 && $age>=10){
                echo "As you are $age years old and your height is of $height m, welcome to the park attraction.";
            }elseif($age>5 && $age <10 && $accompanied==true){
                echo "Regardless of your age of $age years old, as you are accompanied, you can pass";
            }else{
                echo "As you are $age years old and your height is of $height m, you cannot enter to the park attraction.";
            }
		?>

	</body>

</html>