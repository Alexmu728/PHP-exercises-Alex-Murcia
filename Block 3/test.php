<!DOCTYPE HTML>

<html>

	<head>

		<meta charset="utf-8">

		<title></title>

	</head>

	<body>

		<?php

            try{
                $runner1=new Runner("Alex","A1");
                $runner2=new Runner("Ferna","A2");
                $runner3=new Runner("Gorka","A3");
                $runner4=new Runner("Peio","A4");
                $runner5=new Runner("Kevin","A5");
                $runner6=new Runner("Yeray","A6");
                $runner7=new Runner("Curto","A7");
                $runner8=new Runner("Losada","A8");
                $runner9=new Runner("Corra","A9");
                $runner10=new Runner("Asier","A10");
                $runner11=new Runner("Izan","A11");
                $runner12=new Runner("Igor","A12");

                $competition=new Competition();

                $competition-> addRunner($runner1);
                $competition-> addRunner($runner2);
                $competition-> addRunner($runner3);
                $competition-> addRunner($runner4);
                $competition-> addRunner($runner5);
                $competition-> addRunner($runner6);
                $competition-> addRunner($runner7);
                $competition-> addRunner($runner8);
                $competition-> addRunner($runner9);
                $competition-> addRunner($runner10);
                $competition-> addRunner($runner11);
                $competition-> addRunner($runner12);

                $competition-> addRaceToRunner("A1", 20);
                $competition-> addRaceToRunner("A1", 23);
                $competition-> addRaceToRunner("A2", 10);
                $competition-> addRaceToRunner("A3", 20);
                $competition-> addRaceToRunner("A3", 20);
                $competition-> addRaceToRunner("A3", 20);
                $competition-> addRaceToRunner("A4", 20);
                $competition-> addRaceToRunner("A5", 20);
                $competition-> addRaceToRunner("A1", 20);
                $competition-> addRaceToRunner("A1", 20);
                $competition-> addRaceToRunner("A1", 20);
                $competition-> addRaceToRunner("A1", 20);
                $competition-> addRaceToRunner("A1", 20);
                $competition-> addRaceToRunner("A1", 20);
                $competition-> addRaceToRunner("A1", 20);
                $competition-> addRaceToRunner("A1", 20);
                $competition-> addRaceToRunner("A1", 20);
                $competition-> addRaceToRunner("A1", 20);
                $competition-> addRaceToRunner("A1", 20);
                $competition-> addRaceToRunner("A1", 20);
                $competition-> addRaceToRunner("A1", 20);


                

            }catch(Exception $e){
                echo $e-> getMessage();
            }

		?>

	</body>

</html>