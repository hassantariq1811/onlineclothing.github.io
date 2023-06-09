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
            <li><a  href="about.php">About</a></li>
            <li><a class= "active" href="contact.php">Contact</a></li>
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
        <h2>#let's_talk</h2>
        <p>LEAVE A MESSAGE, We love to hear from you!</p>
    </section>
<section id="contact_details" class = "section-p1">
      <div class="details"> 
        <span>
            GET IN TOUCH
        </span>
        <h2>Visit one of our agency location or contact us today</h2>
        <h3>Head Office</h3>
<div>
    <li>
        <i class="fal fa-map "></i>
        <p>COMSATS University,Sahiwal campus</p>
    </li>
    <li>
        <i class="far fa-envelope "></i>
        <p>contact@example.com</p>
    </li>
    <li>
        <i class="fas fa-phone-alt " ></i>
        <p>contact@example.com</p>
    </li>
    <li>
        <i class="far fa-clock "></i>
        <p>Monday to Saturday: 9:00am to 16.pm </p>
    </li>
</div>
</div> 
<div class="map">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3432.6956089110495!2d73.14597757545941!3d30.64253502462798!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3922b6e4dde0c501%3A0xc37ea3d85326203!2sCOMSATS%20University%20Islamabad%20-%20Sahiwal%20Campus!5e0!3m2!1sen!2s!4v1685698700708!5m2!1sen!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe> </div>
        

</section>


<section id ="form-details">
<form action="" method="post">
<span>LEAVE A MESSAGE</span>
<h2>We love to hear from you</h2>
<input type="text" name="name" id="name"placeholder="Your Name" >
<input type="text" name="email" id="email" placeholder="E-mail" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$">
<input type="text" name="subject" id="subject" placeholder="Subject" pattern="[a-zA-Z]+">
<textarea name ="message" id="message" cols="38" rows="10" placeholder="Your Message"></textarea>
<input type="submit" style="background:#088178;color:#fff;font-weight:600;border-radius:6px" name="submit" id="submit" value="Submit">
</form>
<div class ="people">
    <div>
        <h2><span>Developers</span></h2>
    </div>
    <div> 
        <img src="img/people/hassan.jpg" alt="">
        <p><span>Hassan Tariq </span> Web Developer<br>Phone: +9212345678<br>Email: sp21-bse-009@cuisahiwal.edu.pk </p>
    </div>
    <div> 
        <img src="img/people/rayyan.jpg" alt="">
        <p><span>Rayyan Rao</span>  Web Developer<br>Phone: +9212345678<br>Email: sp21-bse-016@cuisahiwal.edu.pk</p>
    </div>
    <div> 
        <img src="img/people/shadab.jpg" alt="">
        <p><span>Shadab Shams</span>  Web Developer<br>Phone: +9212345678<br>Email: sp21-bse-032@cuisahiwal.edu.pk </p>
    </div>
</div>
</section>
<?php
if(isset($_POST['submit'])){
    $name=$_POST['name'];
    $email=$_POST['email'];
    $subject=$_POST['subject'];
    $message=$_POST['message'];

    if($name==''|| $email==''||$subject==''||$message==''){
        echo "<script>alert('Please fill all the availabe fields')</script>";
        exit();
    }

    else{
        $insert_product="insert into `feedback` (name,email,subject,message) 
        values('$name','$email','$subject','$message')";
        $result_query=mysqli_query($con,$insert_product);
        if($result_query){
            echo "<script>alert('Successfully Inserted Product')</script>";
        }
    }
}
?>





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