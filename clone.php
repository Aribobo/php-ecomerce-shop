  <?php

session_start();

include('conect.php');      

 $ref = $_GET['reference'];
 if ($ref=="card") {
      $ttype="card";
 }

 if ($ref=="pod") {
    $ttype="podd";
  
 }
 if ($ref=="") {
    echo"<script>
    alert('Sql prepare  error');
    window.location.href='cart.php';
    </script>";
 // header("location:javascript://history.go(-1) ");
 } 
 if (empty($_SESSION['user'])) {
     echo"<script>
    alert('login to proceed !!!');
    window.location.href='login.php';
    </script>";
    exit;
 }
 else {
 $userid=  $_SESSION['user'];
  $set='123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
 //$order_id=$order_id= mysqli_insert_id($con);
 $code=substr(str_shuffle($set), 0, 6);
 $pay_id=$ttype.$code;
 $order_id= mysqli_insert_id($con);

  $query1="INSERT  INTO sales (id,user_id,pay_id) VALUES ('$order_id','$userid','$pay_id')";
}
 if(mysqli_query($con,$query1)){

$order_id= mysqli_insert_id($con);
//$pay_id=$order_id.$ttype;
    $query2="INSERT INTO details (sales_id,product_id,quantity) VALUES (?,?,?)";
    $stmt=mysqli_prepare($con,$query2);
}
 
    if($stmt){

        mysqli_stmt_bind_param($stmt,"iii",$order_id,$product_id,$quantity);
        foreach($_SESSION['cart'] as $key => $values){
            $quantity=$values['Quantity']; 
            $product_id =$values['id'];
            mysqli_stmt_execute($stmt); 
   
}
unset($_SESSION['cart']);
 echo"<script>
    alert('order placed!!!');
    window.location.href='product.php';

    </script>";
} 
else
{
     echo"<script>
    alert('stmt  did not execute !!!');
    window.location.href='product.php';
    </script>";
}

 ?>

