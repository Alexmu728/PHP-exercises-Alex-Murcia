<!DOCTYPE HTML>

<html>

	<head>

		<meta charset="utf-8">

		<title></title>

	</head>

	<body>

		<?php

			class check{
                private $name;

                public function __construct($name) {
                    $this->name=$name;
                }

                function checkFile(){
                    $exists=false;
                    if(file_exists($this->name)){
                        $exists=true;
                    }else{
                        throw new Exception("The file $this->name does not exist(Alex Murcia Exception)");
                    }
                    return $exists;
                }
            }


            $check=new check("config.php");

            try{
                $trueFalse=$check->checkFile();
                if($trueFalse==true){
                    echo "It returned true";
                }
            }catch(Exception $e){
                echo $e->getMessage();;
            }
            
            
		?>

	</body>

</html>