<?php
include('connection.php');

    /**
     * Summary of getIPAddress
     * @return mixed
     */
    function getIPAddress() {  
    //whether ip is from the share internet  
     if(!empty($_SERVER['HTTP_CLIENT_IP'])) {  
                $ip = $_SERVER['HTTP_CLIENT_IP'];  
        }  
    //whether ip is from the proxy  
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  
                $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];  
     }  
//whether ip is from the remote address  
    else{  
             $ip = $_SERVER['REMOTE_ADDR'];  
     }  
     return $ip;  
}   


function cart(){
    if(isset($_GET['add-to-cart'])){
        global $con;
        $get_ip_address = getIPAddress();
        $get_product_id=$_GET['add-to-cart'];
        $select_query="Select * from carts_detail where ip_address='$get_ip_address' and product_id=$get_product_id";
        $result_query=mysqli_query($con,$select_query);
        $num_of_rows=mysqli_num_rows($result_query);
        if($num_of_rows>0){
            echo "<script>alert('This item is already present inside cart')</script>";
            echo "<script>window.open('index.php','_self')</script>";
        }   
        else{
            $insert_query="insert into  `carts_detail` (product_id,ip_address,quantity) values ($get_product_id,'$get_ip_address',0)";
            $result_query=mysqli_query($con,$insert_query);
            echo "<script>window.open('index.php','_self')</script>";
            echo "<script>alert('Item is added to cart')</script>";
        }
    }
}
//Function Cart item number
function cart_item(){
    if(isset($_GET['add-to-cart'])){
        global $con;
        $get_ip_address = getIPAddress();
        $select_query="Select * from carts_detail where ip_address='$get_ip_address'";
        $result_query=mysqli_query($con,$select_query);
        $count_cart_item=mysqli_num_rows($result_query);
    }   
        else{
            global $con;
            $get_ip_address = getIPAddress();
            $select_query="Select * from carts_detail where ip_address='$get_ip_address'";
            $result_query=mysqli_query($con,$select_query);
            $count_cart_item=mysqli_num_rows($result_query);
        }
        echo $count_cart_item;
}
?>