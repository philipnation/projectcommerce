<?php
session_start();
	if(isset($_SESSION["shopping_cart"]))
	{
		$item_array_id = array_column($_SESSION["shopping_cart"], "item_id");
		if(!in_array($_POST["foodid"], $item_array_id))
		{
			$count = count($_SESSION["shopping_cart"]);
			$item_array = array(
				'item_id'			=>	$_POST["foodid"],
				'item_name'			=>	$_POST["foodname"],
				'item_price'		=>	$_POST["price"],
				'item_quantity'		=>	$_POST["quantity"],
                'product_image'     =>  $_POST["foodimage"],
				'unit_price'     =>  $_POST["price"]
			);
			$_SESSION["shopping_cart"][$count] = $item_array;
            echo "<span style='color:green';>product added</span>";
            
		}
		else
		{
			echo "<span style='color:red';>item already in the cart</span>";
            //echo "<script>location.href='home'</script>";
		}
	}
	else
	{
		$item_array = array(
			    'item_id'			=>	$_POST["foodid"],
				'item_name'			=>	$_POST["foodname"],
				'item_price'		=>	$_POST["price"],
				'item_quantity'		=>	$_POST["quantity"],
                'unit_price'        =>  $_POST["price"],
                'product_image'     =>  $_POST["foodimage"]
		);
		$_SESSION["shopping_cart"][0] = $item_array;
        echo "product added";
	}
?>