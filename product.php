<?php

include('header2.php');

?>

 <?php
session_start();
//include('function.php');
include('conect.php'); 

    if(isset($_SESSION['user'])){
 $user_id= $_SESSION['user'];
    

/*$email= mysqli_real_escape_string($con,$user_email);
$password= mysqli_real_escape_string($con,$user_password);*/
$query =mysqli_query($con,"select * from users where id = '$user_id'") or die (mysqli_error($con));

$row = mysqli_fetch_array($query);
  $email = $row['email'];
  $fname = $row['firstname'];
  $lname = $row['lastname'];
  $phone = $row['contact_info'];
  $address = $row['address'];
  $counter = mysqli_num_rows($query);

  $_SESSION['email'] = $email;
   $_SESSION['first_name'] = $fname;
    $_SESSION['last_name'] = $lname;
     $_SESSION['phone'] = $phone;
     $_SESSION['address'] = $address;

    //echo   $_SESSION['email']." ".$_SESSION['phone']." ".$_SESSION['first_name']." ".$_SESSION['last_name'];


      }

?>

	<?php

 //echo $_SESSION['user'];
?>
    <div class="product-area section">
    	<div id="resp" style="display:none; color:green"></div>
            <div class="container">
				<div class="row">
					<div class="col-12">
						<div class="section-title">
							<h2>Trending Items</h2>
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
$query = "SELECT * FROM products ORDER BY id ASC LIMIT 15";

$result = mysqli_query($con,$query);

if(mysqli_num_rows($result)>0){

  while($products = mysqli_fetch_array($result) ){

 
  ?>
											<div class="col-xl-3 col-lg-4 col-md-3 col-12">
												<div class="single-product">
													<div class="product-img">
														<a>
															<img class="img-fluid rounded" src="<?php echo'images/'.$products['photo'] ; ?>" alt="#" style="width:500px; height:190px;">
															<img class="hover-img rounded" src="<?php echo'images/'.$products['photo2'] ; ?>" alt="#" style="width:500px; height:190px;">
														</a>
													
													</div>
													<div class="product-content">
													<a href="detail.php?id=<?php echo $products['id'];?>" ><span>  <?php echo $products['name']?></a></span>
														<div class="product-price">
													
															<span>₦<?php echo number_format( $products['price'],2);?></span>

                                 
														</div>
													</div>
												</div>
												</form>
											</div>
									


									     <?php
                                }

                              }

                          ?>
										</div>
									</div>
								</div>
						
							</div>
						</div>
					</div>
				</div>
            </div>
    </div>
	
	<?php include'footer.php';?>

