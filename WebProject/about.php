<?php
include('common_function.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Clothing Website</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" >
    <link rel="stylesheet" href="popup1.css">
</head>
<body>
    <section id="header">
        <a href="#"><img src="img/logo.png" class="logo " alt=""></a>
        <div id="navbar">
            <li><a href="index.php">Home</a></li>
            <li><a href="shop.php">Shop</a></li>
            <li><a  href="blog.php">Blog</a></li>
            <li><a class= "active" href="about.php">About</a></li>
            <li><a href="contact.php">Contact</a></li>
            <li id="lg-cart"><a href="cart.php"><i class="fas fa-shopping-cart"></i><sup><?php cart_item();?></sup></a></li>
            <li><i class="fas fa-user" onclick="openPopup()" id="but"></i></li>
            <a href="#" id="close"><i class="fas fa-times"></i></a>
        </div>
        <div id="mobile">
            <a href="cart.html" style="color: black;"><i class="fas fa-shopping-cart"></i></a>
            <i id="bar" class="fas fa-outdent"></i>
        </div>
        <div class="popup" id="popup">
                        <h3>Accounts</h3>
                        <a href="user_login.php"><button class="nom" type="button"onclick="closePopup()">User Login</button></a>
	                    <a href="admin_login.php"><button class="nom" type="button">Admin Login</button></a>
                        <button class="nom" type="button"onclick="closePopup()">Cancel</button>
                    </div>
                    <script>
                        let popup=document.getElementById("popup");
                        function openPopup(){
                             popup.classList.add("open-popup");
                       }
                        function closePopup(){
                            popup.classList.remove("open-popup");
                        }
                    </script>
    </section>

    <section id="page-header" class="about-header">
        <h2>#KnowUs</h2>
        <p>Lorem ipsum dolor sit amet consectetur</p>
    </section>

    <section id="about-head" class="section-p1">
        <img src="img/about/a6.jpg" alt="">
        <div>
            <h2>Who Are We?</h2>
            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Rem perferendis maxime repellat quis officia sed fugiat, voluptate optio repudiandae vero inventore amet et, molestias veniam earum eos! Quia, a excepturi!</p>
            <abbr title="">Create stunning images with as mush or as title control as you likes thanks to a choice of Basic and Creative modes.</abbr>
            <br><br>

            <marquee bgcolor=""#ccc loop="-1" scrollamount="-5" width="100%"> Create stunning images with as mush or as title control as you likes thanks to a choice of Basic and Creative modes.</marquee>

        </div>

    </section>

    <section id="about-app" class="section-p1">
        <h1>Download Our <a href="#">APP</a></h1>
        <div class="video">
            <video autoplay muted loop src="img/about/1.mp4"></video>
        </div>
    </section>

    <section id="feature" class="section-p1">
        <div class="fe-box">
            <img src="img/features/f1.png" alt="">
            <h6>Free Shipping</h6>
        </div>
        <div class="fe-box">
            <img src="img/features/f2.png" alt="">
            <h6>Online Order</h6>
        </div>
        <div class="fe-box">
            <img src="img/features/f3.png" alt="">
            <h6>Save Money</h6>
        </div>
        <div class="fe-box">
            <img src="img/features/f4.png" alt="">
            <h6>Promotions</h6>
        </div>
        <div class="fe-box">
            <img src="img/features/f5.png" alt="">
            <h6>Happy Sell</h6>
        </div>
        <div class="fe-box">
            <img src="img/features/f6.png" alt="">
            <h6>F24/7 Support</h6>
        </div>
    </section>

    <section id="newsletter" class="section-p1 section-m1">
        <div class="newstext">
            <h4>Sign Up For Newsletters</h4>
            <p>Get E-mail updates about our latest shop and <span>special offers.</span> </p>
        </div>
        <div class="form">
            <input type="text" placeholder="Your email address">
            <a href="user_login.php"><button class="normal">Sign Up</button></a>
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
</body>
</html>