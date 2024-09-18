<!DOCTYPE HTML>

<html>

	<head>

		<meta charset="utf-8">

		<title></title>

	</head>

	<body>

		<?php

			class square{
                private $side;

                public function __construct($side) {
                    if($side>=0){
                        $this->side = $side;
                    }else{
                        throw new Exception("The given side of $side is negative");
                    }
                }

                public function getArea(){
                    $area=$this->side*$this->side;
                    return $area;
                }
            }

            $array=[];
            for($i=0;$i<5;$i++){
                $array[$i]=rand(-5,5);
            }

            foreach($array as $side){
                try{
                    $square= new square($side);
                    echo "Side: $side, Area: ".$square->getArea()."<br>";
                }catch(Exception $e){
                    echo $e->getMessage()."<br>";
                }
            }
            

            
            
		?>

	</body>

</html>