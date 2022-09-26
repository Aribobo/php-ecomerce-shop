<?php include 'includes/session.php';
include('conect.php');
include('header2.php'); ?>

<?php
  if(isset($_SESSION['user'])){
       echo"<script type = 'text/javascript'> document.location='product.php'</script>";
  }
?>


<body class="hold-transition login-page">
<div class="login-box">
  
		<!--/ End Header -->
	
	<!-- Breadcrumbs -->
	<div class="breadcrumbs">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="bread-inner">
						<ul class="bread-list">
							<li><a href="index1.html">Home<i class="ti-arrow-right"></i></a></li>
							<li class="active"><a href="blog-single.html">Log-In</a></li>
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
									<?php
      if(isset($_SESSION['error'])){
        echo "
          <div class='callout callout-danger text-center'>
            <h4 style='color:orange;'>".$_SESSION['error']."</h4> 
          </div>
        ";
        unset($_SESSION['error']);
      }
      if(isset($_SESSION['success'])){
        echo "
          <div class='callout callout-success text-center'>
            <p>".$_SESSION['success']."</p> 
          </div>
        ";
        unset($_SESSION['success']);
      }
    ?>
								<div class="title">
									<h3>Log-in </h3>
									<br>
									<h4><a href="signup.php">Create Acount</a></h4>
								</div>
								<form class="form" action="verify.php" method="POST">
									<div class="row">
										
										<div class="col-lg-6 col-12">
											<div class="form-group">
												<label>Email<span>*</span></label>
												<input name="email" type="text" placeholder="">
											</div>		
										</div>
									
										<div class="col-lg-6 col-12">
											<div class="form-group">
												<label>Password<span>*</span></label>
												<input name="password" type="password" placeholder="">
											</div>	
										</div>
										<div class="col-12">
											<div class="form-group button">
												<button name="login" type="submit" class="btn ">Log-In</button>
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
