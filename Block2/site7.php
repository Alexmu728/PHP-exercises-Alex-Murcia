<!DOCTYPE HTML>

<html>

	<head>

		<meta charset="utf-8">

		<title></title>

	</head>

	<body>

		<?php

			class power{

                private $base;
                private $exponent;

                function __construct($base, $exponent=2) {
                    $this -> base=$base;
                    $this -> exponent=$exponent;
                }

                public function calculatePower(){
                    $power=1;
                    for($i=0;$i<$this->exponent;$i++){
                        $power=$power*$this->base;
                    }
                    echo "The power of $this->base with $this->exponent as exponent is $power";
                }
            }

            $num1=rand(1, 10);
            $num2=rand(1, 5);

            $classPower=new power($num1, $num2);

            $classPower-> calculatePower();
            
		?>

	</body>

</html>