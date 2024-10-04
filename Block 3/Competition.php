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
                    $this->runners[$code]->addRace($time);
                }

                public function average(){
                    $average=0;
                    $i=0;

                    foreach($this->runners as $runner){
                        $time=$runner->getRaceTimes();
                        $average=$average+$time[0];
                        $i++;
                    }
                    return ($average/$i);
                }

                public function quickest(){
                    $quick=9999999;
                    $quickest="";
                    foreach($this->runners as $runner){
                        foreach($runner->getRaceTimes() as $time){
                            if($time<$quick){
                                $quick=$time;
                                $quickest=$runner->getName();
                            }
                        }
                    }
                    return "The quickest runner is $quickest with $quick time";
                }
            }

		?>

	</body>

</html>