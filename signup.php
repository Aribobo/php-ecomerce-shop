<?php 
session_start();
error_reporting(E_ERROR | E_WARNING | E_PARSE);
include('conect.php'); // to conect to our database
include('function.php');
include('header2.php');
//lets declare variable empty
$fname= $lname= $phone= $email= $password= $checkbox= $address="";
$fnameErr= $lnameErr= $emailErr= $phoneErr= $passwordErr= $checkboxErr= $addressErr="";

//input field validation
if ($_SERVER["REQUEST_METHOD"] == "POST") {  
           
//String Validation  
    if (empty($_POST["fname"])) {  
         $fnameErr = "First Name is required";  
    } else {  
        $fname = input_data($_POST["fname"]);  
            // check if name only contains letters and whitespace  
            if (!preg_match("/^[a-zA-Z ]*$/",$fname)) {  
                $fnameErr = "Only alphabets and white space are allowed";  
            }  
    }  
//code for adress
     if (empty($_POST["address"])) {  
         $addressErr = "valid address is required";  
    } else {  
        $address= input_data($_POST["address"]);  
            // check if name only contains letters and whitespace  
            if (!preg_match('/^[\w]{3,200}$/',$address)) {  
                $addressErr = "please enter a valid address";  
            }  
    }  
    //another string validation for last name

 if (empty($_POST["lname"])) {  
         $lnameErr = "Last Name is required";  
    } else {  
        $lname = input_data($_POST["lname"]);  
            // check if name only contains letters and whitespace  
            if (!preg_match("/^[a-zA-Z ]*$/",$lname)) {  
                $lnameErr = "Only alphabets and white space are allowed";  
            }  
    }  


   //Number Validation  
    if (empty($_POST["phone"])) {  
            $phoneErr = "Mobile no is required";  
    } else {  
            $phone = input_data($_POST["phone"]);  
            // check if mobile no is well-formed  
            if (!preg_match ("/^[0-9]*$/", $phone) ) {  
            $phoneErr = "Only numeric value is allowed.";  
            }  
        //check mobile no length should not be less and greator than 10  
        if (strlen ($phone) != 11) {  
            $phoneErr = "Mobile no must contain 11 digits.";  
            }  
    }  
      
    //Email Validation   
    if (empty($_POST["email"])) {  
            $emailErr = "Email is required";  
    } else {  
            $email = input_data($_POST["email"]);  
            // check that the e-mail address is well-formed  
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {  
                $emailErr = "Invalid email format";  
            }  
     }  
   }


if(empty($_POST["password"])){
$password= "Only letters and numbers is required";
} else{
  $password =  input_data($_POST["password"]);
  if(!preg_match('/^[\w]{8,20}$/', $password)){
 $passwordErr = " password must be letters and numbers and at least 8 to 20 digit!";
   }
}


if (!isset($_POST['checkbox'])){  
            //$checkboxErr = "Accept terms of services before your account is created";  
    } else {  
            $checkbox = input_data($_POST["checkbox"]);  
    }  

   function input_data($data) {  
  $data = trim($data);  
  $data = stripslashes($data);  
  $data = htmlspecialchars($data);  
  return $data;  
}  

//the code below inserts the user detail into the data


  if(isset($_POST['submit'])) { 

         if($fnameErr == "" && $emailErr == "" && $phoneErr == ""  && $lnameErr == "" && $passwordErr == "" && $checkboxErr == "") { 

$match="select * from users where email = '$email' and phone ='$phone' ";
$result= mysqli_query($con,$match);
$num = mysqli_num_rows($result);
if($num==1){
    echo "Email or phone already taken";
}
// here is where we save to the database
else{
    $password = password_hash($password, PASSWORD_BCRYPT);
    $user_id = random_num(20);
    $type=0;
    $status=1;
    $query = "insert into users (id,email,password,type,firstname,lastname,address,contact_info,status) values ('$user_id','$email','$password','$type','$fname','$lname','$address','$phone','$status')";
    
    mysqli_query($con,$query);

  echo"<script>
    window.location.href='login.php';
    </script>";
}


    }  
      }  

?>


		<!--/ End Header -->
	
	<!-- Breadcrumbs -->
	<div class="breadcrumbs">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="bread-inner">
						<ul class="bread-list">
							<li><a href="index1.html">Home<i class="ti-arrow-right"></i></a></li>
							<li class="active"><a href="#">Contact</a></li>
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
									<h4>Join Us</h4>
									<h3>Create Acount</h3>
								</div>
<form class="form" style="color: #757575;" 
 action= " <?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?> " method="POST">
									<div class="row">
										<div class="col-lg-6 col-12">
											<div class="form-group">
												<label>First Name<span>*</span></label>
												<input type="text" name="fname" placeholder="">
													<div class="error"> <?php echo $fnameErr; ?> </div>
											</div>
										</div>

										<div class="col-lg-6 col-12">
											<div class="form-group">
												<label>Last Name<span>*</span></label>
												<input name="lname" type="text" placeholder="">
												<div class="error"> <?php echo $lnameErr; ?> </div> 
											</div>
										</div>
										<div class="col-lg-6 col-12">
											<div class="form-group">
												<label>Address<span>*</span></label>
												<input  type="address" name="address" placeholder="">
												 <div class="error"> <?php echo $addressErr; ?> </div> 
     
											</div>
										</div>
										<div class="col-lg-6 col-12">
											<div class="form-group">
												<label>Email<span>*</span></label>
												<input type="text" name="email" placeholder="">
												 <div class="error"> <?php echo $emailErr; ?> </div>
											</div>		
										</div>
										<div class="col-lg-6 col-12">
											<div class="form-group">
												<label>Phone<span>*</span></label>
												<input type="tel" name="phone" placeholder="">
												<div class="error"> <?php echo $phoneErr; ?> </div>
											</div>	
										</div>
										<div class="col-lg-6 col-12">
											<div class="form-group">
												<label>Password<span>*</span></label>
												<input type="password" name="password" placeholder="">
												 <div class="error"> <?php echo $passwordErr; ?> </div>

											</div>	
										</div>
										<div class="col-12">
											<div class="form-group button">
												<button type="submit" name="submit" class="btn ">Create Acount</button>
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
	