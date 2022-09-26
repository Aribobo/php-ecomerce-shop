<?php
	include 'includes/session.php';

	$id = $_POST['id'];

	$conn = $pdo->open();

	$output = array('list'=>'');

	$stmt = $conn->prepare("SELECT * FROM details LEFT JOIN products ON products.id=details.product_id LEFT JOIN sales ON sales.id=details.sales_id WHERE details.sales_id=:id");
	$stmt->execute(['id'=>$id]);

	$total = 0;
	foreach($stmt as $row){
		$output['transaction'] = $row['pay_id'];
		$output['date'] = date('M d, Y', strtotime($row['sales_date']));
		$subtotal = $row['price']*$row['quantity'];
		$photo =$row['photo'];
		$total += $subtotal;
		$link ='../images/';
		$output['list'] .= "
			<tr class='prepend_items'>
				<td>".$row['name']."</td>
				<td>₦ ".number_format($row['price'], 2)."</td>
				<td>".$row['quantity']."</td>
				<td>₦ ".number_format($subtotal, 2)."</td>
		  <td>" .'<img src='.$link.$photo.' height="50px;" width="50";>' ."</td>
		  <td>".$row['seller']."</td>
			</tr>
		";
	}
	
	$output['total'] = '<b>₦ '.number_format($total+200, 2).'<b>';
	$pdo->close();
	echo json_encode($output);

?>