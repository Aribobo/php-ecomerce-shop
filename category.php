<?php
include('header2.php');
include 'includes/session.php'; 

include('conect.php');
//echo   $_SESSION['email']." ".$_SESSION['phone']." ".$_SESSION['first_name']." ".$_SESSION['last_name']."  ". $_SESSION['address'];

    //print_r($_SESSION['cart']);


if (empty($_GET['id'])) {
    echo" <script> window.location.href='product.php';</script>";

    exit;
}

$productId = $_GET['id'];
$sql = mysqli_query($con, "SELECT * FROM category WHERE id ='$productId'") or  die(mysqli_error());
if ($sql->num_rows>0){
    $data = mysqli_fetch_array($sql);
    $name= $data['name'];
    }

?>
 <div class="product-area section">
        <div id="resp" style="display:none; color:green"></div>
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="section-title">
                            <h2><?php  echo $name ?></h2>
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
$query = "SELECT * FROM products  WHERE category_id = '$productId'  ORDER BY id ASC LIMIT 15";

$result = mysqli_query($con,$query);

if(mysqli_num_rows($result)>0){

  while($products = mysqli_fetch_array($result) ){

 
  ?>
                                            <div class="col-xl-3 col-lg-4 col-md-3 col-12">
                                                <div class="single-product">
                                                    <div class="product-img">
                                                       <!--  -->


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
                              else{
                                echo "<script> 
                   
                   window.location.href='product.php';
                  </script>";

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


<?php include'footer.php'; ?>

