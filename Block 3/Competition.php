<!DOCTYPE HTML>

<html>

	<head>

		<meta charset="utf-8">

		<title></title>

	</head>

	<body>

		<?php

			class Competition{
                private $runners=array();

                public function addRunner(Runner $runner){
                    $this->runners[$runner->getCode()]=$runner;
                }

                public function addRaceToRunner($code, $time){
                    addRace($time);
                }
            }

		?>

	</body>

</html>