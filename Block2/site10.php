<!DOCTYPE HTML>

<html>

	<head>

		<meta charset="utf-8">

		<title></title>

	</head>

	<body>
        <form method="POST" action="site10.php">

            <label for="dni">DNI:</label><br>
            <input type="text" id="dni" name="dni" required><br>

            <label for="name">First Name:</label><br>
            <input type="text" id="name" name="name" required><br>

            <label for="lastname">Last Name:</label><br>
            <input type="text" id="lastname" name="lastname" required><br>

            <input type="submit" value="Submit">
        </form>

		<?php

			class person{
                private $dni;
                private $name;
                private $lastname;

                public function __construct($dni, $name, $lastname) {
                    $this->dni=$dni;
                    $this->name = $name;
                    $this->lastname=$lastname;
                }
              
                public function getDni(){
                    return $this->dni;
                }


                public function setDni($dni){
                    $this->dni=$dni;
                }

            
                public function getName(){
                    return $this->name;
                }

        
                public function setName($name){
                    $this->name=$name;
                }

            
                public function getLastName(){
                    return $this->lastname;
                }

                
                public function setLastName($lastname){
                    $this->lastname=$lastname;
                }

                public function fullName(){
                    return "Person: $this->name $this->lastname";
                }
            }

        class user extends person{
            private $points;

            public function getPoints(){
                return $this->points;
            }

            public function setPoints($p){
                $this->points=$p;
            }

            public function fullName(){
                echo "User: ".$this->getName()."  ".$this->getLastName();
            }

            public function totalPoints(){
                if($this->points<100){
                    echo "The user has less than 100 points, as it has $this->points";
                }else{
                    echo "The user has more than 100 points, as it has $this->points";
                }
            }
        }

        if($_SERVER["REQUEST_METHOD"]=="POST"){
            $dni=$_POST["dni"];
            $name=$_POST["name"];
            $lastName=$_POST["lastname"];

            $points=rand(50, 150);

            $user=new user($dni, $name, $lastName);
            $user->setPoints($points);

            echo $user->fullName()."</br>";
            $user->totalPoints();
        }

            
		?>

	</body>

</html>