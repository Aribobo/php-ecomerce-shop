<?php
session_start(); 
$result = "";
if(isset($_POST['submit'])){
	include('conect.php'); 
	$email = mysqli_real_escape_string($con,$_POST['email']);
	if ($email=="") {
		$result="<div class='alert alert-danger warning-dismissible'><a href='#' class='close' data-dismissible='alert'aria-label='close'>&times;</a>email box cant be empty</div>";
		// code...
	}
	   else{ 
//$query= $con->query("SELECT id FROM members WHERE email ='$email");
      $query =mysqli_query($con,"select * from users where email = '$email'");
      $row = mysqli_fetch_array($query);
if (!$row > 0) {
	$result="<div class='alert alert-danger alert-dismissible'><a href='#' class='close' data-dismissible='alert'aria-label='close'>&times;</a>email does not exist</div>";
	// code...
}
else{
	$code =uniqid(true);
	$query2 = mysqli_query($con, "INSERT INTO resetpswd(code,email,date) VALUES('$code','$email',NOW())");
	if (!$query2) {
		// code...
		exit("Error occured").mysqli_error($con);
	}
	include('forgot_mailer.php');
}

	}
}

include('header2.php'); 
?>


  <div class="breadcrumbs">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="bread-inner">
            <ul class="bread-list">
              <li><a href="index1.html">Home<i class="ti-arrow-right"></i></a></li>
              <li class="active"><a href="blog-single.html">Reset Password</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- End Breadcrumbs -->
  
  <!-- Start Contact -->
  <section id="contact-us" class="contact-us section">
    <div class="container">
        <div class="contact-head">
          <div class="row">
            <div class="col-lg-12 col-12">
              <div class="form-main">
                <div class="title">
                  <p><?php echo $result; ?></p>
                  <h3>Log-in </h3>
                  <br>
                  <h4><a href="signup.php">Create Acount</a></h4>
                </div>

    
               <form class="form"   action= " " method="post">
                  <div class="row">
                    
                    <div class="col-lg-12 col-12">
                      <div class="form-group">
                        <label>Email<span>*</span></label>
                        <input name="email" type="email" placeholder="">
                      </div>    
                    </div>
                  
                   
                    <div class="col-12">
                      <div class="form-group button">
                        <button name="submit" type="submit" class="btn ">Reset</button>
                      </div>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
  </section>
  <!--/ End Contact -->
  
  <!-- Start Footer Area -->
  <?php include'footer.php';?>