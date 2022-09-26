
<?php



session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	if (isset($_POST['add_to_cart'])) {
		if (isset($_SESSION['cart'])) {
			$myItems = array_column($_SESSION['cart'], 'Item_Name');
			if (in_array($_POST['Item_Name'], $myItems)) {
				echo "<script>
 	 	
 	 	window.history.back();
 	 	</script>";
			} else {
				$count = count($_SESSION['cart']);
				$_SESSION['cart'][$count] = array(
					'Item_Name' => $_POST['Item_Name'],
					'Item_Image' => $_POST['Item_Image'],
					'Price' => $_POST['Price'],
					'id' => $_POST['id'],
					'Quantity' => 1
				);
				echo "<script>
 	 
 	 	window.history.back();
 	 	</script>";
				//print_r($_SESSION['cart']);

			}
		}           else {
			$_SESSION['cart'][0] = array(
				'Item_Name' => $_POST['Item_Name'],
				'Item_Image' => $_POST['Item_Image'],
				'Price' => $_POST['Price'],
				'id' => $_POST['id'], 'Quantity' => 1
			);
			echo "<script>
 	 	
 	 	window.history.back();
 	 //	</script>";
		}
		//print_r($_SESSION['cart']);
	}
	if (isset($_POST['Remove_Item'])) {

		foreach ($_SESSION['cart'] as $key => $value) {
			if ($value['Item_Name'] == $_POST['Item_Name']) {
				unset($_SESSION['cart'][$key]);
				$_SESSION['cart'] = array_values($_SESSION['cart']);
				echo "<script>
         			alert('Item Removed');  
         			window.location.href='cart.php';
         			</script>";
			}
		}
	}

}

if (isset($_POST['Mod_Quantity'])) {

	foreach ($_SESSION['cart'] as $key => $value) {
		if ($value['Item_Name'] == $_POST['Item_Name']) {
			$_SESSION['cart'][$key]['Quantity'] = $_POST['Mod_Quantity'];
			//echo "added";
			//print_r($_SESSION['cart']);
			echo "<script> 
                   window.location.href='cart.php';
                  //</script>";
		}
	}
}
?>