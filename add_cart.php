<?php

include'conect.php';
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {

	//echo "fine connection";

if (isset($_SESSION['cart'])) {
			$myItems = array_column($_SESSION['cart'], 'Item_Name');
			if (in_array($_POST['Item_Name'], $myItems)) {
				echo 'product already in cart';
				
 	 	
 	 
			} else {
				$count = count($_SESSION['cart']);
				$_SESSION['cart'][$count] = array(
					'Item_Name' => $_POST['Item_Name'],
					'Item_Image' => $_POST['Item_Image'],
					'Price' => $_POST['Price'],
					'id' => $_POST['id'],
					'Quantity' => 1
				);
				echo " product added";
				//print_r($_SESSION['cart']);

			}
		}           else {
			$_SESSION['cart'][0] = array(
				'Item_Name' => $_POST['Item_Name'],
				'Item_Image' => $_POST['Item_Image'],
				'Price' => $_POST['Price'],
				'id' => $_POST['id'], 'Quantity' => 1
			);
			echo 
 	 	 "product added succesfully";
 	 	
 	 	
		}

}
?>