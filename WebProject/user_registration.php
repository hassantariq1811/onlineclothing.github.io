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
    <style>
        body{
            margin: 0;
            padding: 0;
            font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
            background: linear-gradient(90deg,#E3E6F3,#8f92a0);
            height: 100vh;
            overflow: hidden;
        }
        .center{
            position:absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%,-50%);
            width: 400px;
            background: white;
            border-radius: 10px;
        }
        .center h2{
            text-align: center;
            padding: 0 0 20px 0;
            border-bottom: 1px solid silver;

        }
        .center form{
            padding: 0 40px;
            box-sizing: border-box;
        }
        form .text_field{
            position: relative;
            border-bottom: 2px solid #adadad;
            margin: 30px 0;
        }
        .text_field input{
            width: 100%;
            padding: 0 5px;
            height: 40px;
            font-size: 16px;
            border: none;
            background: none;
            outline: none;
        }
        .text_field label{
            position: absolute;
            top: 50%;
            left: 5px;
            color: #adadad;
            transform: translateY(-50%);
            font-size: 16px;
            pointer-events: none;
            transition: .5s;
        }
        .text_field span::before{
            content: '';
            position: absolute;
            top: 40px;
            left: 0;
            width: 0%;
            height: 2px;
            background: #088178;
            transition: .5s;
        }
        .text_field input:focus ~ label,
        .text_field input:valid ~ label{
            top: -5px;
            color: #088178;
        }
        .text_field input:focus ~ span::before,
        .text_field input:valid ~ span::before{
            width: 100%;
        }
        input[type="submit"]{
            width: 100%;
            height: 50px;
            border: 1px solid;
            background: #088178;
            border-radius: 25px;
            font-size: 18px;
            color: #e9f4fb;
            font-weight: 700;
            cursor: pointer;
            outline: none;
        }
        input[type="submit"]:hover{
            border-color: #2691d9;
            transition: .5s;
        }
        .signup_link{
            margin: 30px 0;
            text-align: center;
            font-size: 16px;
            color: #666666;
        }
        .signup_link a{
            color: #088178;
            text-decoration: none;
        }
        .signup_link a:hover{
            text-decoration: underline;
        }.popup{
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
        }
        
    </style>
</head>
<body >
    <div class="center">
        <h2 class="text-center">New User Registration</h2>
                <form action="" method="post" enctype="multipart/form-data">
                    <!--Username Field-->
                    <div class="text_field">
                        <input type="text" name="user_username" id="user_username" 
                       autocomplete="off" required  pattern="[A-Za-z0-9]+">
                       <span></span>
                       <label for="user_username" class="form-label">Username</label>

                    </div>
                    <!--Useremail Field-->
                    <div class="text_field">
                        <input type="email" name="user_email" id="user_email"
                        autocomplete="off" required  pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$">
                        <span></span>
                        <label for="user_email" class="form-label">Email</label>

                    </div>
                    <!--Password Field-->
                    <div class="text_field">
                        <input type="password" name="user_password" id="user_password" 
                        autocomplete="off" required  minlength="8" maxlength="30">
                        <span></span>
                        <label for="user_password" class="form-label">Password</label>

                    </div>
                    <!--Confirm Password Field-->
                    <div class="text_field">
                        <input type="password" name="conf_user_password" id="conf_user_password"
                        autocomplete="off" required  minlength="8" maxlength="30">
                        <span></span>
                        <label for="conf_user_password" class="form-label">Confirm Password</label>

                    </div>
                    <!--Address Field-->
                    <div class="text_field">
                        <input type="text" name="user_address" id="user_address" 
                         autocomplete="off" required  >
                         <span></span>
                         <label for="user_address" class="form-label">Address</label>

                    </div>
                    <!--Contact Field-->
                    <div class="text_field">
                        <input type="text" name="user_contact" id="user_contact"
                         autocomplete="off" required  pattern="[0-9]{4}-[0-9]{7}">
                         <span></span>
                         <label for="user_contact" class="form-label">Contact</label>

                    </div>
                    <input type="submit" value="Register"  name="user_register">

                    <div class="signup_link">
                        Already have an account? <a href="user_login.php">Login</a>
                    </div>
                    
                </form>
                
                    
    </div>
                     
</body>
</html>
<!--PHP Code-->
<?php
if(isset($_POST['user_register'])){
    $username=$_POST['user_username'];
    $useremail=$_POST['user_email'];
    $userpassword=$_POST['user_password'];
    $userconfirmpassword=$_POST['conf_user_password'];
    $useraddress=$_POST['user_address'];
    $usercontact=$_POST['user_contact'];
    $userip=getIPAddress();
    //select query
    $select_query="Select * from `user_table` where username='$username' or user_email='$useremail'";
    $result=mysqli_query($con,$select_query);
    $row_count=mysqli_num_rows($result);
    if($row_count>0){
        echo "<script>alert('Username and Email already exists')</script>";
    }
    elseif($userpassword!=$userconfirmpassword){
        echo "<script>alert('Password do not match')</script>";
    }
    else{
        //insert query
    $insert_query="insert into `user_table` (username,user_email,user_password,conf_user_password,user_ip,user_address,user_contact)
    values('$username','$useremail','$userpassword','$userconfirmpassword','$userip','$useraddress','$usercontact')";
    $sql_execute=mysqli_query($con,$insert_query);
    if($sql_execute){
        echo "<script>alert('Account created successfully!!!')</script>";
    }
    else{
        die(mysqli_error($con));
    }
    }
    //selecting cart item
    $select_cart_items="Select * from `carts_detail` where ip_address='$userip'";
    $result_cart=mysqli_query($con,$select_cart_items);
    $row_count1=mysqli_num_rows($result_cart);
    if($row_count1>0){
        $_SESSION['username']=$username;
        echo "<script>
        alert('You have item in cart');
    </script>";
    echo "<script>window.open('payment.php','_self')</script>";
    }
    else{
        echo "<script>window.open('index.php','_self')</script>";
    }
}
?>