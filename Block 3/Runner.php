<!DOCTYPE HTML>


<html>


    <head>


        <meta charset="utf-8">


        <title></title>


    </head>


    <body>


        <?php


            class Runner{
                private $name;
                private $code;
                private $raceTimes=array();


                public function __construct($name, $code){
                    $this->name=$name;
                    $this->code=$code;
                }


                public function getName(){
                    return $this->name;
                }


               
                public function getCode(){
                    return $this->code;
                }
               
                public function getRaceTimes(){
                    return $this->raceTimes;
                }


                public function addRace($time){
                    if(count($this->raceTimes)>=5){
                        throw new Exception("The runner already has 5 races.");
                    }
                    if($time<5){
                        throw new Exception("There's a race that is less than 5 seconds.");
                    }
                    $this->raceTimes[]=$time;
                }


            }


        ?>


    </body>


</html>
