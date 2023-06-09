<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Clothing Website</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" >
</head>
<body>
<?php
include('connection.php');
function getIPAddress1() {  
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
function cart_item1(){
    if(isset($_GET['add-to-cart'])){
        global $con;
        $get_ip_address = getIPAddress1();
        $select_query="Select * from carts_detail where ip_address='$get_ip_address'";
        $result_query=mysqli_query($con,$select_query);
        $count_cart_item=mysqli_num_rows($result_query);
    }   
        else{
            global $con;
            $get_ip_address = getIPAddress1();
            $select_query="Select * from carts_detail where ip_address='$get_ip_address'";
            $result_query=mysqli_query($con,$select_query);
            $count_cart_item=mysqli_num_rows($result_query);
        }
        echo $count_cart_item;
}
session_start();
?>
    <section id="header">
        <a href="#"><img src="img/logo.png" class="logo " alt=""></a>
        <div id="navbar">
            <li><a href="index.php">Home</a></li>
            <li><a href="shop.php">Shop</a></li>
            <li><a  href="blog.php">Blog</a></li>
            <li><a  href="about.php">About</a></li>
            <li><a href="contact.php">Contact</a></li>
            <li id="lg-cart"><a class= "active"   href="cart.html"><i class="fas fa-shopping-cart"></i><sup><?php cart_item1();?></sup></a></li>
            <li><a href=""><i class="fas fa-user"></i></a></li>
            <a href="#" id="close"><i class="fas fa-times"></i></a>
        </div>
        <div id="mobile">
            <a href="cart.html" style="color: black;"><i class="fas fa-shopping-cart"></i></a>
            <i id="bar" class="fas fa-outdent"></i>
        </div>
    </section>

    <section id="page-header" class="about-header">
        <h2>#CheckOut</h2>
    </section>
    <section>
        <div>
            <?php
            if(!isset($_SESSION['username'])){
                include('user_login.php');
            }
            else{
                include('payment.php');
            }
            ?>
        </div>
    </section>

    

    <footer class="section-p1">
        <div class="col">
            <img  class="logo"src="img/logo.png" alt="">
            <h4>Contact</h4>
            <p><strong>Address:</strong> 562 Mall Road, Street # 32,Lahore</p>
            <p><strong>Phone:</strong> (040)0123400 /(+92)321-1234567</p> 
            <p><strong>Hours:</strong> 10:00 - 18:00, Mon - Sat</p>
            <div class="follow">
                <h4>Follow Us</h4>
                <div class="icon">
                    <i class="fab fa-facebook-f"></i>
                    <i class="fab fa-twitter"></i>
                    <i class="fab fa-instagram"></i>
                    <i class="fab fa-pinterest-p"></i>
                    <i class="fab fa-youtube"></i>
                </div>
            </div>
        </div>
        <div class="col">
            <h4>About</h4>
            <a href="#">About us</a>
            <a href="#">Delivery Information</a>
            <a href="#">Privacy Policy</a>
            <a href="#">Terms & Conditions</a>
            <a href="#">Contact Us</a>
        </div>
        <div class="col">
            <h4>My Account</h4>
            <a href="#">Sign In</a>
            <a href="#">View Cart</a>
            <a href="#">My Wishlists</a>
            <a href="#">Track My Order</a>
            <a href="#">Help</a>
        </div>
        <div class="col install">
            <h4>Install App</h4>
            <p>From App Store or Google Play</p>
            <div class="row">
                <img src="img/pay/app.jpg" alt="">
                <img src="img/pay/play.jpg" alt="">
            </div>
            <p>Secured Payment Gateways</p>
            <img src="img/pay/pay.png" alt="">
        </div>
        <div class="copyright">
            <p>&copy; 2023,E-Commerce HTML CSS JS PHP</p>
        </div>
    </footer> 
    <script src="script.js"></script>
</html>