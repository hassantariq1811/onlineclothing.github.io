<?php
include('connection.php');
include('common_function.php');

?>  
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Clothing Website</title>
    
    <link rel="stylesheet" href="popup.css">
</head>
<body bgcolor="#E3E6F3" style="background:#E3E6F3;">
    <?php
      
    $user_ip=getIPAddress();
    $get_user="Select * from `user_table` where user_ip='$user_ip'";
    $result=mysqli_query($con,$get_user);
    $run_query=mysqli_fetch_array($result);
    $user_id=$run_query['user_id'];
    ?>
    <div align="center">
        <h2 style="text-align:center; color:#088178;">Payment Options</h2>
        <div style="display:flex; align-item:center;">
           
            <button class="normal" onclick="openPopup()"><img src="img/paypal.png" alt=""></button>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <button class="normal" onclick="openPopup1()"><img src="img/cod.jpg" alt="" width="300px"></button>
            
            
        </div>
    </div>
    <div class="popup" id="popup">
                        <img src="img/Succ.png" alt="">
                        <h3>PAYMENT SUCCESSFUL</h3>
                        <p>Your Order has been placed</p>
                        <a href="index.php"><button class="btn btn-outline-success btn_payment_page" type="button"onclick="closePopup()">Continue Shopping</button></a>
	<a href="Invoice.php"><button class="btn btn-outline-success btn_payment_page" type="button">Get Invoice</button></a>
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
                    <div class="popup" id="popup1">
                        <img src="img/Succ.png" alt="">
                        <h3>ORDER PLACED SUCCESSFULLY </h3>
                        <p>Order Deliver within One Week</p>
                        <a href="index.php"><button class="btn btn-outline-success btn_payment_page" type="button" onclick="closePopup1()">Continue Shopping</button></a>
	<a href="Invoice.php"><button class="btn btn-outline-success btn_payment_page" type="button">Get Invoice</button></a>
                    </div>
                    <script>
                        let popup1=document.getElementById("popup1");
                        function openPopup1(){
                             popup1.classList.add("open-popup");
                       }
                        function closePopup1(){
                            popup1.classList.remove("open-popup");
                        }
                    </script>
    </div>
</body>
</html>