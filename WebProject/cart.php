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
    <style>
        .updateRemove{
    background-color: #088178;
    padding: 15px;
    margin: 15px;
    border: none;
    color:white;
    border-radius: 6px;
}
.updateRemove:hover{
    background-color: #099999;
    text-transform: uppercase;
}
    </style>
</head>
<body>
<?php
include('connection.php');
include('common_function.php');
?>
    <section id="header">
        <a href="#"><img src="img/logo.png" class="logo " alt=""></a>
        <div id="navbar">
            <li><a href="index.php">Home</a></li>
            <li><a href="shop.php">Shop</a></li>
            <li><a  href="blog.php">Blog</a></li>
            <li><a  href="about.php">About</a></li>
            <li><a href="contact.php">Contact</a></li>
            <li id="lg-cart"><a class= "active"   href="cart.php"><i class="fas fa-shopping-cart"></i><sup><?php cart_item();?></sup></a></li>
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
        <h2>#Cart</h2>
        <p>Add your coupon code & save 70%</p>
    </section>

     <section id="cart" class ="section-p1">
        <form action="" method="post">
<table width="100%">

    <?php
    global $con;
    $get_ip_add =getIPAddress();
    $total_price=0;
    $cart_query="Select * from `carts_detail` where  ip_address ='$get_ip_add'";
    $result=mysqli_query($con, $cart_query); 
    $result_count=mysqli_num_rows($result);
    if($result_count>0){
        echo "<thead>
        <tr>
            <th>Image</th>
            <th>Product Name</th>
            <th>Brand</th>
            <th>Prices</th>
            <th>Quantity</th>
            <th>Remove</th>
            <th>Operations</th>
        </tr>
        </thead>
        <tbody>";
        while($row = mysqli_fetch_array($result)) {
            $product_id =$row['product_id']; 
            $select_products="Select * from `feature_product` where 
            product_id ='$product_id'";
            $result_products =mysqli_query($con, $select_products);
        
            while($row_product_price=mysqli_fetch_array($result_products)){
            
            $product_price=array($row_product_price['product_price']); 
            $price_table = $row_product_price['product_price'];
            $product_title = $row_product_price['product_title'];
            $product_image = $row_product_price['product_image'];
            $product_brand = $row_product_price['product_brand'];
            $product_values=array_sum($product_price);
            $total_price+=$product_values;

    ?>
    <tr>
    <td width="100px"> <img src="img/<?php echo $product_image?>" alt=""></td>
    <td><?php echo $product_title ?> </td>
    <td><?php echo $product_brand ?> </td>
    <td> $<?php echo $price_table ?></td>
    <td><input type="number" value ="1" name="qty"></td>
    <?php
     $get_ip_add =getIPAddress();
     if(isset($_POST['Update_cart'])){
        $quantities=$_POST['qty'];
        $update_query="Update `carts_detail` set quantity=$quantities where ip_address='$get_ip_add'";
        $result_products_qty =mysqli_query($con, $update_query);
        $total_price*=$quantities;
     }
    ?>
    <td><input type="checkbox" name="removeitem[]" value="<?php echo $product_id?>"></td>
    <td><input type="submit" value="Update" class="updateRemove" name="Update_cart" >
    <input type="submit" value="Remove" class="updateRemove" name="remove_cart"></td>
    </tr>
   <?php
        }
        }
    }
    else{
        echo "<h2 style='text-align:center; color:red;'>Cart is empty</h2>";
    }
   ?>
    
</tbody>


</table>
</form>
<!--function to remove item-->
<?php
function remove_cart_item(){
    global $con;
    if(isset($_POST['remove_cart'])){
        foreach($_POST['removeitem'] as $remove_id){
            echo $remove_id;
            $delete_query="Delete from `carts_detail` where product_id=$remove_id";
            $run_delete_query=mysqli_query($con,$delete_query);
            if($run_delete_query){
                echo "<script>window.open('cart.php','_self')</script>";
            }
        }
    }
}
echo $remove_item=remove_cart_item();
?>

     </section>
     <?php
     $get_ip_add =getIPAddress();
// $total_price=0;
     $cart_query="Select * from `carts_detail` where  ip_address ='$get_ip_add'";
     $result=mysqli_query($con, $cart_query); 
     $result_count=mysqli_num_rows($result);
     if($result_count>0){
        echo "<section id='cart-add' class='section-p1'>
        <div id='coupon'>
            <h3>Apply coupon</h3>
            <div>
                <input type='text' placeholder='Enter Your coupon'>
                <button class ='normal'>Apply</button>
            </div><br><br>
            <div>
            <center>
            <a href='index.php'>
            <button class='normal'>Continue Shopping</button></a>
            </center>
            </div>
        </div>
        <div id='subtotal'>
        <h3>Cart Totals</h3>
        <table>
        <tr>
            <td>Cart subtotal</td>
           <td>$$total_price</td>
        </tr>
        <tr>
            <td>Shipping</td>
            <td>free</td>
        </tr>
        <tr>
            <td><strong>Total</strong></td>
            <td><strong>$$total_price</strong></td>
        </tr>
        </table>
        <a href='checkout.php'>
        <button class='normal'>Proceed to checkout</button>
        </a>
        </div>
        </section>";
     }
     else{
        echo "<center>
        <a href='index.php'>
        <button class='normal' style='background-color: #088178; color:white;'>Continue Shopping</button></a>
        </center>";
     }
     ?>

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