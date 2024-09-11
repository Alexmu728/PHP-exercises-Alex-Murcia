<!DOCTYPE HTML>

<html>

	<head>

		<meta charset="utf-8">

		<title></title>

	</head>

	<body>

		<?php

		
			$total_compra= rand(10, 110);

            $tipo=["pets", "clothes"];
            $num=rand(0,1);
            $tipo_compra=$tipo[$num];

            $total_price=0;

            echo "Shopping basket: $total_compra , variable: $tipo_compra<br>";

           
            if($total_compra<19 && $tipo_compra=="pets"){
                echo "Unable to send.";
            }elseif($total_compra<19 && $tipo_compra=="clothes"){
                echo "Shipping costs are 9 euros.<br>";
                $total_price=($total_compra+9)*1.21;
                echo "Total price of the purchase: $total_price €";
            }elseif($total_compra>=19 && $total_compra<=40 && $tipo_compra=="pets"){
                echo "The shipping costs are 9 euros.<br>";
                $total_price=($total_compra+9)*1.10;
                echo "Total price of the purchase: $total_price €";
            }elseif($total_compra>=19 && $total_compra<40 && $tipo_compra=="clothes"){
                echo "The shipping costs are 9 euros.<br>";
                $total_price=($total_compra+9)*1.21;
                echo "Total price of the purchase: $total_price €";
            }elseif($total_compra>=40 && $total_compra<80 && $tipo_compra=="pets"){
                echo "The shipping costs are 5 euros.<br>";
                $total_price=($total_compra+5)*1.10;
                echo "Total price of the purchase: $total_price €";
            }elseif($total_compra>=40 && $total_compra<80 && $tipo_compra=="clothes"){
                echo "The shipping costs are 5 euros.<br>";
                $total_price=($total_compra+5)*1.21;
                echo "Total price of the purchase: $total_price €";
            }elseif($total_compra>80 && $tipo_compra=="pets"){
                echo "The shipping costs are free.<br>";
                $total_price=$total_compra*1.10;
                echo "Total price of the purchase: $total_price €";
            }elseif($total_compra>80 && $tipo_compra=="clothes"){
                echo "The shipping costs are free.<br>";
                $total_price=$total_compra*1.21;
                echo "Total price of the purchase: $total_price €";
            }
		?>

	</body>

</html>