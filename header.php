<!Doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>  </title>
     <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

         <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
   <link rel="stylesheet" href="Bootstrap/css/bootstrap.min.css">
      <link rel="stylesheet" href="Css2/mystyle.css">
       <!-- <script src="Bootstrap/js/bootstrap.bundle.min.js"></script>-->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
  </head>
  <body style="background-color: #fd7e14;">
       <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity=">sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <a class="navbar-brand" href="major.php"><h1>Oxhia</h1></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav" id="naving">
        <a class="nav-item nav-link active" href="Accesories.php"><h4>Accesories</h4> <span class="sr-only">(current)</span></a>
        <a class="nav-item nav-link" href="electronics.php"><h4>Electronics</h4></a>
      <a class="nav-item nav-link" href="fashion.php"><h4>fashion</h4></a>
        <a class="nav-item nav-link" href="cosmetics.php"><h4>Cosmetics</h4></a>
        <a class="nav-item nav-link" href="service.php"><h4>Services</h4></a>
          <form action="result.php" method="GET" class="form-inline" id="result">
    <input class="form-control mr-sm-2" type="text" name="search"placeholder="Search" aria-label="Search" >
    <button class="btn btn-outline-warning my-2 my-sm-0" id="tnt"  type="submit">Search</button>
<div class="dropdown">
    <button type="button" class="btn btn-dark dropdown-toggle" data-toggle="dropdown"> <i class="fas fa-user mr-3"></i>
    </button>
    <div class="dropdown-menu">
      <a class="dropdown-item" href="login.php"> Log-In</a>
      <a class="dropdown-item" href="signup.php"> Create Account</a>
    </div>
    <?php
$count=0;
if (isset($_SESSION['cart'])) {
  # code...
  $count=count($_SESSION['cart']);
}

    ?>

      <a style="margin-left: 5px;" href="mycart.php" class="btn btn-outline-dark"> <span class="fas fa-shopping-cart mr-3"> <span class="badge badge-pill badge-secondary"> <?php  echo $count; ?></span></span>
      </a>



  </div>
</div>
  </form>
    </div>
  </div>
</nav>
</body>
</html>
