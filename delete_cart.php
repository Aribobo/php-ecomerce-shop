<?php

include'conect.php';

session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {

		foreach ($_SESSION['cart'] as $key => $value) {
			if ($value['Item_Name'] == $_POST['Item_Name']) {
				unset($_SESSION['cart'][$key]);
				$_SESSION['cart'] = array_values($_SESSION['cart']);
					echo "<script> 
					alert('item removed');
                   window.location.href='cart.php';
                  </script>";
                  echo "removed";
         			
			}
		}
	


}



