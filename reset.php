  <script type="text/javascript">

function Toggle(){
	var pass = document.getElementById('typepass');
	var pass2 = document.getElementById('typepass2');
	if (pass.type==='password') {
		pass.type = 'text';
	}
	if (pass2.type==='password') {
		pass.type = 'text';
	}
else{
	pass.type==='text';
	pass2.type ==='password';

}
 
}
</script>


<?php

error_reporting(E_ERROR | E_WARNING | E_PARSE);
session_start(); 
include('conect.php'); 
$msg= "";
if (!isset($_GET['code'])) {
	exit(include("notfound.php"));
	// code...
}
$code = $_GET['code'];

$getEmail = "SELECT email FROM  resetpswd WHERE  code ='$code'";
 $results=mysqli_query($con,$getEmail);
$row = mysqli_fetch_array($results);
$emailGot= $row['email'];

if(mysqli_num_rows($results)==0){
	//echo $emailGot;
exit(include("notfound.php"));
}
date_default_timezone_set("Africa/lagos");
$sql1= ("SELECT TIMESTAMPDIFF(SECOND, date,NOW()) AS tdif FROM resetpswd WHERE code ='$code'"); 
$result = $con->prepare($sql1);
$result->execute();
$result->store_result();
$result->bind_result($tdif);
$result->fetch();
if ($tdif>=600){
	$removeQuery = $con->query("DELETE FROM resetpswd WHERE code ='$code'");
	exit(include("timeout.php"));

}
if (isset($_POST['submit'])) {
	$password = mysqli_real_escape_string($con, $_POST['password']);
	$cpassword = mysqli_real_escape_string($con, $_POST['cpassword']); 


	$uppercase= preg_match('/^[\w]{8,20}$/',$password);
	$lowercase= preg_match('/^[\w]{8,20}$/',$password);
	$number= preg_match('/^[\w]{8,20}$/',$password);
	$spechialChars= preg_match('/^[\w]{8,20}$/',$password);
	// code...
	if ($password==""|| $cpassword=="") {
		// code...
		$msg="<div class='alert alert-danger alert-dismissible'><a href='#' class='close' data-dismissible='alert'aria-label='close'>&times;</a>password cant be empty</div>";
	}
	else{
		if($password!=$cpassword){

			$msg="<div class='alert alert-danger alert-dismissible'><a href='#' class='close' data-dismissible='alert'aria-label='close'>&times;</a>pass word did not match</div>";
		}
		elseif (!$uppercase|| !$lowercase|| !$number || !$spechialChars|| strlen($password) < 8) {
			$msg="<div class='alert alert-danger alert-dismissible'><a href='#' class='close' data-dismissible='alert'aria-label='close'>&times;</a>password must be 8 character in  one numeric one special characterlenghth</div>";
			// ............................
		
		}
		else{
		$password = password_hash($password,PASSWORD_BCRYPT);
		$query = mysqli_query($con,"UPDATE users SET password = '$password' WHERE email = '$emailGot'");
		if($query){
			echo $emailGot;
			$query = $con->query("DELETE FROM resetpswd WHERE code ='$code'");
			$msg="<div class='alert alert-danger alert-dismissible'><a href='#' class='close' data-dismissible='alert'aria-label='close'>&times;</a>password  updated succesfully<a class ='loginHome' href='login.php'> click to login</a> </div>";
			}
			else{
				$msg="<div class='alert alert-danger alert-dismissible'><a href='#' class='close' data-dismissible='alert'aria-label='close'>&times;</a>something went wrong contact admin</div>";
			// code...
			}
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
								<div class="title">
									<h3>Log-in </h3>
									<br>
									<h4><a href="create.php">Reset Password</a></h4>
								</div>
								<div class="card-body px-lg-5 pt-0" id="lobox">
<p><?php  echo $msg; ?></p></div>
								 <form class="form"   action= "" method="POST">
									<div class="row">
										
										<div class="col-lg-6 col-12">
											<div class="form-group">
												<label>password1<span>*</span></label>
												 <input type="password" id="typepass" class="form-control" name="password">
											</div>		
										</div>
									
										<div class="col-lg-6 col-12">
											<div class="form-group">
												<label>Password2<span>*</span></label>
												 <input type="password" id="typepass2" class="form-control" name="cpassword">

											</div>
											   <br>
                         <div class="form-check">
                 <input type="checkbox" class="form-check-input" id="materialLoginFormRemember" onclick="Toggle()">
                <label class="form-check-label" for="materialLoginFormRemember">show</label>
             </div>
                     <p>wants to visit home?<a href="major.php" class="loginHome">Home</a></p>	
										</div>
										<div class="col-12">
											<div class="form-group button">
												<button name="submit" type="submit" class="btn ">Log-In</button>
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