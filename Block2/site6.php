<!DOCTYPE HTML>

<html>

	<head>

		<meta charset="utf-8">

		<title></title>

	</head>

	<body>

		<?php

			class birthday{
                public $info = array();

                public function __construct() {
                    $this->info = array(
                        "January" => array(),
                        "February" => array(),
                        "March" => array(),
                        "April" => array(),
                        "May" => array(),
                        "June" => array(),
                        "July" => array(),
                        "August" => array(),
                        "September" => array(),
                        "October" => array(),
                        "November" => array(),
                        "December" => array()
                    );
                }

                public function add($name, $month){
                    switch($month){
                        case "1":
                            array_push($this->info["January"], $name);
                            break;
                        case "2":
                            array_push($this->info["February"], $name);
                            break;
                        case "3":
                            array_push($this->info["March"], $name);
                            break;
                        case "4":
                            array_push($this->info["April"], $name);
                            break;
                        case "5":
                            array_push($this->info["May"], $name);
                            break;
                        case "6":
                            array_push($this->info["June"], $name);
                            break;
                        case "7":
                            array_push($this->info["July"], $name);
                            break;
                        case "8":
                            array_push($this->info["August"], $name);
                            break;
                        case "9":
                            array_push($this->info["September"], $name);
                            break;
                        case "10":
                            array_push($this->info["October"], $name);
                            break;
                        case "11":
                            array_push($this->info["November"], $name);
                            break;
                        case "12":
                            array_push($this->info["December"], $name);
                            break;
                    }
                }

                public function display(){
                    foreach($this->info as $month=>$names){
                        echo "<h3>$month</h3>";
                        foreach($names as $name){
                            echo "$name</br>";
                        }
                    }
                }

            }

            $birthday= new birthday();

            $names=array("Irati"=>"1", "Ferna"=>"1","Peio"=>"1", "Curto"=>"2", "Igor"=>"3", "Corra"=>"3", "Gorka"=>"4", "Yeray"=>"4", "Kevin"=>"5", "Losada"=>"6", "Izan"=>"6", "Aia"=>"7", "Laura"=>"7", "Nahia"=>"7", "Amaia"=>"8", "Lara"=>"8", "Eider"=>"9", "Maialen"=>"10", "Nora"=>"11", "Igea"=>"11", "Prego"=>"12", "Eneritz"=>"12");
            
            foreach($names as $name=>$month){
                $birthday->add($name, $month);
            }

            $birthday-> display();
		?>

	</body>

</html>