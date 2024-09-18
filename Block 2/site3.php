<!DOCTYPE HTML>

<html>

	<head>

		<meta charset="utf-8">

		<title></title>

	</head>

	<body>

		<?php

            $array=[];
            $count=0;

			for($i=0;$i<20;$i++){
                $array[$i]= rand(1,50);
                $count++;
            } 

            foreach($array as $num){
                echo "$num ||";
            }

            echo "<br>";
            echo "<br>";
            

            $biggest=0;

            /*function biggest($num){
                for($i=0;$i<$num.length;$i++){
                    if($num[i]>$biggest){
                        $biggest=$num[i];
                    }
                }
                echo "The biggest number is "+$biggest;
            }

            function smallest($num){
                for($i=0;$i<$num.length;$i++){
                    if($num[i]<$smallest){
                        $smallest=$num[i];
                    }
                }
                echo "The smallest number is "+$smallest;
            }*/

            sort($array);

            foreach($array as $num){
                echo "$num ||";
                if($num>$biggest){
                    $biggest=$num;
                }
            }
            
            echo "<br>";
            echo "<br>";
            echo "<br>";

            $smallest=$array[0];

            $sum=array_sum($array);

            $mean= $sum/$count;

            echo "Smallest: <p style='color:blue'>$smallest</p>";

            echo "<br>";

            echo "Biggest: <p style='color:red'>$biggest</p>";

            echo "<br>";

            echo "Sum: $sum";

            echo "<br>";

            echo "Mean: $mean";


		?>

	</body>

</html>