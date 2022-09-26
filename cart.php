 <?php
error_reporting(E_ERROR | E_WARNING | E_PARSE);

session_start();
include('conect.php');

if (empty($_SESSION['cart'])) {
	header("location: product.php");

	exit;
}

       ?>

<?php include('header2.php');?>
		<!--/ End Header -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	
              

<script type="text/javascript">
	

$(document).ready(function(){

$("#ajaxform").submit(function(event){

	var postdata = $("#ajaxform").serialize();

 	$.post("delete_cart.php",postdata,function(response){

 		$("#resp").show().html(response);

 	})
 	return false;
  	
})

});



</script>
	<!-- Breadcrumbs -->
	<div class="breadcrumbs">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="bread-inner">
						<ul class="bread-list">
							<li><a href="index1.html">Home<i class="ti-arrow-right"></i></a></li>
							<li class="active"><a href="blog-single.html">Cart</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- End Breadcrumbs -->
			
	<!-- Shopping Cart -->
	<div class="shopping-cart section">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<!-- Shopping Summery -->
					<table class="table shopping-summery">
						<thead>
							<tr class="main-hading">
								<th>PRODUCT</th>
								<th>NAME</th>
								<th class="text-center">UNIT PRICE</th>
								<th class="text-center">QUANTITY</th>
								<th class="text-center">TOTAL</th> 
								<th class="text-center">REMOVE</th>
							</tr>
						</thead>
						<tbody>
								<div id="resp" style="display:none; color:green"></div>
							  	<?php
  	$delivery=0;
  	$total_price =0;
    $Ttotal=0;
  	if(isset($_SESSION['cart']))
  	{
foreach($_SESSION['cart'] as $key => $value)

{ 
  $sr = $key+1;
  $delivery=200;
	$total_price = $value["Price"]*$value["Quantity"];
	$total += $value["Price"]*$value["Quantity"];
	$_SESSION['total']=$total+$delivery;
	 //print_r($_SESSION['cart']);


	                   echo"

							<tr>
								<td class='image rounded' data-title='$sr'><img src='$value[Item_Image]' style='height:80px; width:130px;'></td>

								<td class='product-des' data-title='Description'>
									<p class='product-name'>$value[Item_Name]</p>
									
								</td>

								<td class='price' data-title='Price'><span> $value[Price]</span><input type='hidden' class='iprice' value='$value[Price]'>
								</td>

								<td class='qty' data-title='Qty'>

								<!--Input Order-->
									<form action='manage_cart.php' method='POST' id='user_form'> 
									 <input class='text-center form_data' name='Mod_Quantity' id='qty'onchange='this.form.submit();' type='number' value='$value[Quantity]' min='1' max='10'>
                     <input type='hidden' name='Item_Name' value='$value[Item_Name]' id='iname'>
                     </form>
									<!--/ End Input Order -->

								</td>
								<td class='total-amount itotal' data-title='Total' onchange='subfTotal();'><span>$total_price</span></td>
								<form action='delete_cart.php' method='POST' id='ajaxform'>
								<td class='action' data-title='Remove'>
								<button name ='Remove_Item'><a><i class='ti-trash remove-icon'></i></a></button>
								<input type='hidden' name='Item_Name' value='$value[Item_Name]'>
								</form>
								</td>
							</tr>";
						}
					}

						?>
							
							</tbody>
					</table>
					<!--/ End Shopping Summery -->
				</div>
			</div>
			<div class="row">
				<div class="col-12">
					<!-- Total Amount -->
					<div class="total-amount">
						<div class="row">
							<div class="col-lg-8 col-md-5 col-12">
								<div class="left">
								<!--<div class="coupon">
										<form action="#" target="_blank">
											<input name="Coupon" placeholder="Enter Your Coupon">
											<button class="btn">Apply</button>
										</form>
									</div>-->
								</div>
							</div>
							<div class="col-lg-4 col-md-7 col-12">
								<div class="right">
									<ul>
										<li>Cart Subtotal<span><h6 class="text-center" id="subtotal">  <?php  echo "₦". $total;?></h6></span></li>
										<li>Delivery<span><h6>₦200</h6></span></li>
										<li class="last">You Pay<span><h6 class="text-center" id="gtotal"> <?php  echo "₦".$_SESSION['total'] ;?></h6></span></li>
									</ul>



                  <div class="content">
									<img src="images/payment-method.png" alt="#">
								</div>
									<div class="button5">
										<form id="paymentForm"method="post" action="" >

  <div class="form-group">
   <!-- <label for="email">Email Address</label>-->
    <input type="hidden" id="email-address" value="<?php echo $_SESSION['email']; ?>" required />
  </div>
  <div class="form-group">
    <!--<label for="amount">Amount</label>-->
    <input type="hidden" id="amount"value=" <?php   echo $_SESSION['total']; ?>"  required />
  </div>
  <div class="form-group">
   <!-- <label for="first-name">First Name</label>-->
    <input type="hidden" id="first-name" value="<?php echo $_SESSION['firstname']; ?>" />
  </div>
  <div class="form-group">
   <!-- <label for="last-name">Last Name</label>-->
    <input type="hidden" id="last-name" value="<?php echo $_SESSION['lastname']; ?>" />
  </div>


  <?php

if (!empty($_SESSION["cart"])) {  
         echo '
    <button onclick="payWithPaystack()" class="btn btn-warning btn block" style="background-color:#FF8C00!important;" id="pay" type="submit" name="submit">Card payment </button>';

    if (empty($_SESSION['user'])) {
      echo '<script type="text/javascript">var item = document.getElementById("pay");
      item.onclick=function(){
alert("login to checkout");
window.location.href="login.php";
 }
 </script>';
      // code...
    }
  }
    ?>
</form>
<form action="clone.php" method="get">
  <button  class="btn btn-dark btn block" style="background-color:#2f2b2f!important;" id="delive" name="reference" value="pod"> pay on delivery  </button>
</form>
<button onclick="window.history.back();" class="btn">Continue shopping</button>

</div>
<script src="https://js.paystack.co/v1/inline.js"></script> 
</div>	



									</div>
								</div>
							</div>
						</div>
					</div>
					<!--/ End Total Amount -->
				</div>
			</div>
		</div>
	</div>

		 <script>
 const paymentForm = document.getElementById('paymentForm');
paymentForm.addEventListener("submit", payWithPaystack, false);
function payWithPaystack(e) {
  e.preventDefault();
  let handler = PaystackPop.setup({
    key: 'pk_test_68d3625480dc1f6f6e05ddb7a618d698b9107b3c', // Replace with your public key
    email: document.getElementById("email-address").value,
    amount: <?php   echo $_SESSION['total']; ?> * 100,
    firstname: document.getElementById("first-name").value,
    lastname: document.getElementById("last-name").value,
    ref: 'AS'+Math.floor((Math.random() * 1000000000) + 1), // generates a pseudo-unique reference. Please replace with a reference you generated. Or remove the line entirely so our API will generate one for you
    // label: "Optional string that replaces customer email"

    onClose: function(){
    	window.location ="http://localhost/workbench/cart.php?transaction=cancel";

      alert(' transaction cancelled.');
    },
    callback: function(response){
      let message = 'Payment complete! Reference: ' + response.reference;
      alert(message);
  window.location = "http://localhost/workbench/clone.php?reference=card"
// On the redirected page, you can call Paystack's verify endpoint.
    }
  });
  handler.openIframe();
}
</script>

	<!--/ End Shopping Cart -->			
	<!-- Start Shop Services Area  -->

	<!-- Start Footer Area -->
<?php include'footer.php';?>