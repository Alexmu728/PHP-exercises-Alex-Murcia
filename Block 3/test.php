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
                $competition-> addRaceToRunner("A3", 19);
                $competition-> addRaceToRunner("A3", 4);
                $competition-> addRaceToRunner("A3", 2);
                $competition-> addRaceToRunner("A4", 10);
                $competition-> addRaceToRunner("A5", 5);
                $competition-> addRaceToRunner("A5", 7);
                $competition-> addRaceToRunner("A5", 8);
                $competition-> addRaceToRunner("A6", 11);
                $competition-> addRaceToRunner("A6", 8);
                $competition-> addRaceToRunner("A7", 30);
                $competition-> addRaceToRunner("A8", 5);
                $competition-> addRaceToRunner("A9", 4);
                $competition-> addRaceToRunner("A9", 1);
                $competition-> addRaceToRunner("A10", 17);
                $competition-> addRaceToRunner("A10", 14);
                $competition-> addRaceToRunner("A10", 5);
                $competition-> addRaceToRunner("A11", 2);
                $competition-> addRaceToRunner("A12", 16);

		echo "Average time of the 1st race: ".$competition->averageFirstRaceTime()." seconds<br>";
		    
	    	echo "Runner with the quickest race: ".$competition->quickestRace()."<br>";

	    	$long=$competition->runnersWithMoreThanTwoLongRaces();
	    	echo "Runners with more than two races over 15 seconds: ".implode(", ", $long)."<br>";
		    
	    	$endE = $competition->runnersWithNameEndingInE();
	   	echo "Runners whose names end with 'e': ".implode(", ", $endE)."<br>";
	
            }catch(Exception $e){
                echo $e-> getMessage();
            }

		?>

	</body>

</html>
