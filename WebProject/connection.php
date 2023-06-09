<?php 

$con=mysqli_connect('localhost','root','','ecommerce_database');
if($con){
   //echo "Connect";
}
else{
    die(mysqli_error($con));
}


?>