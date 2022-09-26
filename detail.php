


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
              

<script type="text/javascript">
	

$(document).ready(function(){

$("#ajaxform").submit(function(event){

	var postdata = $("#ajaxform").serialize();

 	$.post("add_cart.php",postdata,function(response){

 		$("#resp").show().html(response);

 	})
 	return false;
  	
})

});



</script>

<?php

include 'includes/session.php'; 

include('conect.php');
//echo   $_SESSION['email']." ".$_SESSION['phone']." ".$_SESSION['first_name']." ".$_SESSION['last_name']."  ". $_SESSION['address'];

	//print_r($_SESSION['cart']);


if (empty($_GET['id'])) {
	header("location: product.php");

	exit;
}

$productId = $_GET['id'];
$sql = mysqli_query($con, "SELECT * FROM products WHERE id ='$productId'") or  die(mysqli_error());
if ($sql->num_rows>0){
	$data = mysqli_fetch_array($sql);
	$image = $data['photo'];

	$name= $data['name'];
	$price=$data['price'];
	$id = $data['id'];
	$description=$data['description'];
}
else{
	header("location: product.php");
}

?>
<?php include'header2.php';?>

	<!--/ End Header -->

<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> -->
              

<script type="text/javascript">
	

$(document).ready(function(){

$("#ajaxform").submit(function(event){

	var postdata = $("#ajaxform").serialize();

 	$.post("add_cart.php",postdata,function(response){

 		$("#resp").show().html(response);

 	})
 	return false;
  	
})

});



</script>

	<br>
	<br>
	<br>
	<!-- Start Product Area -->
	  <div class="content-wrapper">
	    <div class="container">

	      <!-- Main content -->
	      <section class="content">
	        <div class="row">
	        	<div class="col-sm-9">
	        		<!--<div class="callout" id="callout" style="display:none; background-color:#FF8C00;">
	        			<br>
	        			<button type="button" class="close"><span aria-hidden="true">&times;</span></button>
	        			<span class="message"></span>
	        		</div>-->

	        		<div id="resp" style="display:none; color:green"></div>


		            <div class="row">
		            	<div class="col-sm-6">
		            		<img src="<?php echo (!empty($data['photo'])) ? 'images/'.$data['photo'] : 'img/airdot.jpg'; ?>" width="100%" height="100%" class="zoom" data-magnify-src="images/large-<?php echo $data['photo']; ?>">
		            		<br><br>
		            		 <form action="add_cart.php" method="POST" id="ajaxform">
		            			<div class="form-group">
			            			<div class="input-group col-sm-5">

                                <input type="hidden" id="pid"name="id" value="<?php echo $data ['id']  ;  ?> ">
                                 <input type="hidden" id="pid"name="Item_Image" value="<?php echo'images/'. $data ['photo']  ;  ?> ">
                             <input type="hidden" id="pid"name="Price" value="<?php echo $data ['price']  ;  ?> ">
                              <input type="hidden" id="pid"name="Item_Name" value="<?php echo $data ['name']  ;  ?> ">
							            </div>
							        
			            				   				<button type="submit" class="btn btn-warning" name="submit" style="background-color:#FF8C00;">Add to cart</button>			            		</div>
		            		</form>
		            	</div>
		            	<div class="col-sm-6">
		            		<h1 class="page-header"><?php echo $name; ?></h1>
		            		<h3><b><strong>₦</strong> <?php echo number_format($price, 2); ?></b></h3>
		            		<p><b>Category:</b> <a href="category.php?id=<?php echo $data['category_id']; ?>"><?php echo $name; ?></a></p>
	
		            		<p><?php echo $description; ?> </p>
		            	</div>
		            </div>
		            <br>
			
	        	</div>
	        
	        </div>
	      </section>
	     
	    </div>
	  </div>
   
	<!-- End Product Area -->
	
	
	<!-- End Shop Services Area -->
	
<?php include'footer.php'; ?>
   


