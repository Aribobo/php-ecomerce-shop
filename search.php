<?php

include('header2.php');?>

    <div class="product-area section">
            <div class="container">
				<div class="row">
					<div class="col-12">
						<div class="section-title">
							<h2>Search Results</h2>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-12">
							<div class="tab-content" id="myTabContent">
								<!-- Start Single Tab -->
								<div class="tab-pane fade show active" id="man" role="tabpanel">
									<div class="tab-single">
										<div class="row">
 <?php

  $output ="<script type='text/javascript'> alert('product not found'); window.history.back();</script>";

if (empty($_GET["search"])) {  
         $output="<script type='text/javascript'> alert('search cant be empty'); window.history.back();</script>";
         echo $output;
         return $searchq;  
         die();
    }

if(isset ($_GET['search'])){
  $searchq = $_GET['search'];
  $searchq = preg_replace("[A-Za-z]","",$searchq);
//$query = mysqli_query($con,"SELECT * FROM members WHERE first_name LIKE '%$searchq%' OR last_name LIKE '%searchq%' ") 

$query = "(SELECT id, name, price,photo,photo2  FROM products WHERE name LIKE '%$searchq%' OR photo LIKE '%$searchq%') 
";

 $result=mysqli_query($con,$query);
//or die("could not search!");
$count = mysqli_num_rows($result);
if ($count == 0){
  echo $output;
  die();
  }
  else{
    while ($row = mysqli_fetch_array($result)) {

?>
							<div class="col-xl-3 col-lg-4 col-md-4 col-12">
												 <form action="manage_cart.php" method="POST">
												<div class="single-product">
													<div class="product-img">
														<a>
															<img class="img-fluid" src="<?php echo'images/'.$row['photo'] ; ?>" alt="#" style="width:500px; height:190px;">
															<img class="hover-img" src="<?php echo'images/'.$row['photo2'] ; ?>" alt="#" style="width:500px; height:190px;">
														</a>
													
													</div>
													<div class="product-content">
													<a href="detail.php?id=<?php echo $row['id'];?>" ><span>  <?php echo $row['name']?></a></span>
														<div class="product-price">
													
															<span>₦<?php echo number_format( $row['price'],2);?></span>

                                
														</div>
													</div>
												</div>
												</form>
											</div>
									


									     <?php
                                                       }

                                                   }
                                                 }


    // echo json_encode($output);
                                                  ?>
										</div>
									</div>
								</div>
								<!--/ End Single Tab -->
								<!-- Start Single Tab -->
								
								<!--/ End Single Tab -->
							</div>
						</div>
					</div>
				</div>
            </div>
    </div>
	<!-- End Product Area -->
	
	<!-- Start Shop Services Area -->
	<section class="shop-services section home">
		<div class="container">
			<div class="row">
				<div class="col-lg-3 col-md-6 col-12">
					<!-- Start Single Service -->
					<div class="single-service">
						<i class="ti-rocket"></i>
						<h4>Fast Delivery</h4>
						<p>  @ ₦200</p>
					</div>
					<!-- End Single Service -->
				</div>
				<div class="col-lg-3 col-md-6 col-12">
					<!-- Start Single Service -->
					<div class="single-service">
						<i class="ti-reload"></i>
						<h4>Free Return</h4>
						<p>Within 3 days returns</p>
					</div>
					<!-- End Single Service -->
				</div>
				<div class="col-lg-3 col-md-6 col-12">
					<!-- Start Single Service -->
					<div class="single-service">
						<i class="ti-lock"></i>
						<h4>Sucure Payment</h4>
						<p>100% secure payment</p>
					</div>
					<!-- End Single Service -->
				</div>
				<div class="col-lg-3 col-md-6 col-12">
					<!-- Start Single Service -->
					<div class="single-service">
						<i class="ti-tag"></i>
						<h4>Best Peice</h4>
						<p>Guaranteed price</p>
					</div>
					<!-- End Single Service -->
				</div>
			</div>
		</div>
	</section>
	<!-- End Shop Services Area -->
	
	<!-- Start Footer Area -->
	<?php include'footer.php';?>