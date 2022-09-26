<?php 

error_reporting(E_ERROR | E_WARNING | E_PARSE);

session_start();
$_SESSION['name']=$_SESSION['first_name']." ". $_SESSION['last_name'];


include('conect.php');

 ?>

<!DOCTYPE html>
<html lang="zxx">
<head>
	<!-- Meta Tag -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name='copyright' content=''>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- Title Tag  -->
    <title>Axhia</title>
	<!-- Favicon -->
	<link rel="icon" type="image/png" href="images/balaga4.png">
	<!-- Web Font -->
	<link href="https://fonts.googleapis.com/css?family=Poppins:200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap" rel="stylesheet">
	
	<!-- StyleSheet -->
	
	<!-- Bootstrap -->
	<link rel="stylesheet" href="css/bootstrap.css">
	<!-- Magnific Popup -->
    <link rel="stylesheet" href="css/magnific-popup.min.css">
	<!-- Font Awesome -->
    <link rel="stylesheet" href="css/font-awesome.css">
	<!-- Fancybox -->
	<link rel="stylesheet" href="css/jquery.fancybox.min.css">
	<!-- Themify Icons -->
    <link rel="stylesheet" href="css/themify-icons.css">
	<!-- Nice Select CSS -->
    <link rel="stylesheet" href="css/niceselect.css">
	<!-- Animate CSS -->
    <link rel="stylesheet" href="css/animate.css">
	<!-- Flex Slider CSS -->
    <link rel="stylesheet" href="css/flex-slider.min.css">
	<!-- Owl Carousel -->
    <link rel="stylesheet" href="css/owl-carousel.css">
	<!-- Slicknav -->
    <link rel="stylesheet" href="css/slicknav.min.css">
	
	<!-- Eshop StyleSheet -->
	<link rel="stylesheet" href="css/reset.css">
	<link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/responsive.css">



</head>
<body class="js">
	
	<!-- Preloader -->
	<!--<div class="preloader">
		<div class="preloader-inner">
			<div class="preloader-icon">
				<span></span>
				<span></span>
			</div>
		</div>
	</div>-->
	<!-- End Preloader -->
	
		<!-- Header -->
		<header class="header shop">
			<!-- Topbar -->
			<div class="topbar">
				<div class="container">
					<div class="row">
						<div class="col-lg-4 col-md-12 col-12">
							<!-- Top Left -->
							<div class="top-left">
								<ul class="list-main">
									<li><i class="ti-headphone-alt"></i> 09063899239</li>
									<li><i class="ti-email"></i> support@axhiahub.com</li>
								</ul>
							</div>
							<!--/ End Top Left -->
						</div>
						<div class="col-lg-8 col-md-12 col-12">
							<!-- Top Right -->
							<div class="right-content">
								<ul class="list-main">
									<li><i class="ti-location-pin"></i> Nsukka</li>
									<li><i class="ti-alarm-clock"></i> Daily deal</li>
									<li><i class="ti-user"></i> <?php
									if (empty($_SESSION["user"])) { 
									 echo '<a href="signup.php">Sign Up</a>';

									}
								else{
									echo $_SESSION['name'];
								}	

									;?></li>
									<li><i class="ti-power-off"></i> <?php
									if (empty($_SESSION["user"])) { 
									 echo '<a href="login.php">Log In</a>';

									}
									else{
									echo '<a href="logout.php">Log Out</a>';
								}	
								?> 


							</li>
								</ul>
							</div>
							<!-- End Top Right -->
						</div>
					</div>
				</div>
			</div>
			<!-- End Topbar -->
			<div class="middle-inner">
				<div class="container">
					<div class="row">
						<div class="col-lg-2 col-md-2 col-12">
							<!-- Logo -->
							<div class="logo">
								<a href="product.php"><img src="images/balaga4.png" alt="logo" width="100px" height="70"></a>
							</div>
							<!--/ End Logo -->
							<!-- Search Form -->
							<div class="search-top">
								<div class="top-search"><a href="#0"><i class="ti-search"></i></a></div>
								<!-- Search Form -->
								<div class="search-top">
									<form class="search-form" action="search.php" id="search-form">
										<input type="text" placeholder="Search here..." name="search">
										<button value="search" type="submit"><i class="ti-search"></i></button>
									</form>
								</div>
								<div class="col-sm-9">
	        		<div class="callout" id="callout" style="display:none; background-color:#FF8C00;">
	        			<br>
	        			<button type="button" class="close"><span aria-hidden="true">&times;</span></button>
	        			<span class="message"></span>
	        		</div>
	        	</div>
								<!--/ End Search Form -->
							</div>
							<!--/ End Search Form -->
							<div class="mobile-nav"></div>
						</div>
						<div class="col-lg-8 col-md-7 col-12">
							<div class="search-bar-top">
								<div class="search-bar">
								 <form action="search.php" method="GET" class="form-inline" id="result">
										<input name="search" placeholder="Search Products Here....." type="search">
										<button type="submit" class="btnn"><i class="ti-search"></i></button>
									</form>
								</div>
							</div>
						</div>
						<div class="col-lg-2 col-md-3 col-12">
							<div class="right-bar">
								<!-- Search Form -->
								<!-- <div class="sinlge-bar">
									<a href="#" class="single-icon"><i class="fa fa-user-circle-o" aria-hidden="true"></i></a>
								</div>
 -->								<div class="sinlge-bar shopping">
                									 <?php

$count=0;
if (isset($_SESSION['cart'])) {
  # code...
  $count=count($_SESSION['cart']);
}

    ?>
<a href="cart.php" class="single-icon"><i class="ti-bag"></i> <span class="total-count"> <?php  echo $count; ?></span></a>
								
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- Header Inner -->
			<div class="header-inner">
				<div class="container">
					<div class="cat-nav-head">
						<div class="row">
							<div class="col-12">
								<div class="menu-area">
									<!-- Main Menu -->
									<nav class="navbar navbar-expand-lg">
										<div class="navbar-collapse">	
											<div class="nav-inner">	
												<ul class="nav main-menu menu navbar-nav">
													<li class="active"><a href="#">Home</a></li>
													<li><a href="#">Category<i class="ti-angle-down"></i></a>	<ul class="dropdown">
																<li><a href="category.php?id=1" >Elctroniccs</a></li>
																<li><a href="category.php?id=2" >Shoes</a></li>
																<li><a href="category.php?id=4" >Accesories</a></li>
															</ul>
															</li>											
													
														<li><a href="service.php">service</a>
															
														</li>
													</li>
													<li><a href="cart.php">Cart</a>
								
													</li>
													<li><a href="#">Pages</a></li>									
													<li><a href="#">Blog<i class="ti-angle-down"></i></a>
														<ul class="dropdown">
															<li><a href="blog-single-sidebar.html">Blog Single Sidebar</a></li>
														</ul>
													</li>
												</ul>
											</div>
										</div>
									</nav>
									<!--/ End Main Menu -->	
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<!--/ End Header Inner -->
		</header>