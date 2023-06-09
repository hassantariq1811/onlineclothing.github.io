<?php
include('connection.php');
include('common_function.php');
session_start();

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
<?php
 cart();
 getIPAddress();
?>
    <section id="header">
        <a href="#"><img src="img/logo.png" class="logo " alt=""></a>
        <div id="navbar">
            <li><a class="active" href="index.php">Home</a></li>
            <li><a href="shop.php">Shop</a></li>
            <li><a href="blog.php">Blog</a></li>
            <li><a href="about.php">About</a></li>
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
     <section style="display:flex; text-decoration: none; background-color:#E3E6F3">
     <?php
     if(!isset($_SESSION['username'])){
        echo "<li style='list-style: none;'>
        <p style='font-size: 20px; color:#088178;'>Welcome Guest&nbsp;</p>
    </li>";
     }
     else{
        echo "<li style='list-style: none;'>
        <p style='font-size: 20px; color:#088178;'>Welcome ".$_SESSION['username']."&nbsp;</p>
    </li>";
     }
     if(!isset($_SESSION['username'])){
        echo "<li style='list-style: none;'>
        <p><a href='user_login.php' style='text-decoration:none;font-size:20px; font-weight:bold;'>Login</a></p> 
     </li>";
     }
     else{
        echo "<li style='list-style: none;'>
        <p><a href='logout.php' style='text-decoration:none;font-size:20px; font-weight:bold;'>Logout</a></p> 
     </li>";
     }
     ?>
     </section>
    <section id="hero">
        <h4>Trade-in-offer</h4>
        <h2>Super value deals</h2>
        <h1>On all products</h1>
        <p>Save more with coupons & up to 70% off!</p>
        <a href="shop.php"><button>Shop Now </button></a>
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

    <section id="product1" class="section-p1">
        <h2>Featured Products</h2>
        <p>Summer Collection New Morden Design</p>
        <div class="pro-container">
            <?php
            $select_query="Select * from `feature_product` order by rand()";
            $result_query=mysqli_query($con,$select_query);
            while($row=mysqli_fetch_assoc($result_query)){
                $pro_id=$row['product_id'];
                $pro_brand=$row['product_brand'];
                $pro_title=$row['product_title'];
                $pro_image=$row['product_image'];
                $pro_price=$row['product_price'];
                echo "<div class='pro'>
                <img src='img/$pro_image' alt=''>
                <div class='des'>
                    <span>$pro_brand</span>
                    <h5>$pro_title</h5>
                    <div class='star'>
                        <i class='fas  fa-star'></i>
                        <i class='fas  fa-star'></i>
                        <i class='fas  fa-star'></i>
                        <i class='fas  fa-star'></i>
                        <i class='fas  fa-star'></i>
                    </div>
                    <h4> $ $pro_price</h4>
                </div>
                <a href='index.php?add-to-cart=$pro_id'><i class='fas fa-cart-plus cart'></i></a>
            </div>";
            }
            ?>
        </div>
    </section>

    <section id="banner" class="section-m1">
        <h4>Repair Services</h4>
        <h2>Up to <span>70% Off</span> - All t-Shirts & Accessories</h2>
        <a href="shop.php"><button class="normal">Explore More</button></a>
    </section>

    <section id="product1" class="section-p1">
        <h2>New Arrivals</h2>
        <p>Summer Collection New Morden Design</p>
        <div class="pro-container">
            <?php
            $select_query="Select * from `feature_product` order by rand()";
            $result_query=mysqli_query($con,$select_query);
            while($row=mysqli_fetch_assoc($result_query)){
                $pro_id=$row['product_id'];
                $pro_brand=$row['product_brand'];
                $pro_title=$row['product_title'];
                $pro_image=$row['product_image'];
                $pro_price=$row['product_price'];
                echo "<div class='pro'>
                <img src='img/$pro_image' alt=''>
                <div class='des'>
                    <span>$pro_brand</span>
                    <h5>$pro_title</h5>
                    <div class='star'>
                        <i class='fas  fa-star'></i>
                        <i class='fas  fa-star'></i>
                        <i class='fas  fa-star'></i>
                        <i class='fas  fa-star'></i>
                        <i class='fas  fa-star'></i>
                    </div>
                    <h4> $ $pro_price</h4>
                </div>
                <a href='index.php?add-to-cart=$pro_id'><i class='fas fa-cart-plus cart'></i></a>
            </div>";
            }
            ?>
        </div>
    </section>

    <section id="sm-banner" class="section-p1">
        <div class="banner-box">
            <h4>crazy deals</h4>
            <h2>buy 1 get 1 free</h2>
            <span>The best  classic dress is on sale at cara</span>
            <button class="white">Learn More</button>
        </div>
        <div class="banner-box banner-box2">
            <h4>spring/summer</h4>
            <h2>upcomming season</h2>
            <span>The best  classic dress is on sale at cara</span>
            <button class="white">Collection</button>
        </div>
    </section>

    <section id="banner3">
        <div class="banner-box">
            <h2>SEASONAL SALE</h2>
             <h3>Winter Collection -50% OFF</h3>
        </div>
        <div class="banner-box banner-box2">
            <h2>NEW FOOTWEAR COLLECTION</h2>
             <h3>Spring / Summer 2023</h3>
        </div>
        <div class="banner-box banner-box3">
            <h2>T-SHIRTS</h2>
             <h3>New Trendy Prints</h3>
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