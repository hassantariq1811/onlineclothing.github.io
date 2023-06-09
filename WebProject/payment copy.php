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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<style>.popup{
            width: 400px;
            background: #E3E6F3;
            border-radius: 6px;
            position: absolute;
            top:0%;
            left: 50%;
            transform: translate(-50%,-50%)scale(0.1);
            text-align: center;
            padding: 0 30px 30px;
            color: #333;
            visibility: hidden;
            transition: transform 0.4s,top 0.4s;
        }
        .popup img{
            width: 100px;
            margin-top: -50px;
            border-radius: 50%;
            box-shadow: 0 2px 2px rgba(0,0,0,0.2);
        }
        .popup h2{
            font-size: 38px;
            font-weight: 500;
            margin: 30px 0 10px;
        }
        .popup button{
            width: 100%;
            margin-top: 50px;
            padding: 10px 0;
            background:#006400;
            color: #fff;
            border: 0;
            outline: none;
            font-size: 18px;
            border-radius: 4px;
            cursor: pointer;
            box-shadow: 0 5px 5px rgba(0,0,0,0.2);
        }
        .open-popup{
            visibility: visible;
            top: 50%;
            transform: translate(-50%,-50%)scale(1);
        }</style>
</head>
<body>
    <?php
      
    $user_ip=getIPAddress();
    $get_user="Select * from `user_table` where user_ip='$user_ip'";
    $result=mysqli_query($con,$get_user);
    $run_query=mysqli_fetch_array($result);
    $user_id=$run_query['user_id'];
    ?>
    <div class="container">
        <h2 class="text-center text-info">Payment Options</h2>
        <div class="row d-flex justify-content-center align-items-center my-5">
            <div class="col-md-6">
            <button class="normal" onclick="openPopup()"><img src="img/paypal.png" alt=""></button>
            </div>
            <div class="col-md-6">
            <button class="normal" onclick="openPopup1()"><img src="img/cod.jpg" alt="" width="300px"></button>
            </div>
            
        </div>
    </div>
    <div class="popup" id="popup">
                        <img src="img/Succ.png" alt="">
                        <h2>PAYMENT SUCCESSFUL</h2>
                        <p>Your Order has been placed</p>
                        <button type="button"class="btn btn-outline-success btn_payment_page"onclick="closePopup()">Ok</button>
                        <a href="index.php"><button class="btn btn-outline-success btn_payment_page" type="button">Return To Merchent</button></a>
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
                        <h2>ORDER SUCCESSFULLY PLACED</h2>
                        <p>Order Deliver within One Week</p>
                        <button type="button"class="btn btn-outline-success btn_payment_page"onclick="closePopup1()">Ok</button>
                        <a href="index.php"><button class="btn btn-outline-success btn_payment_page" type="button">Return To Merchent</button></a>
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