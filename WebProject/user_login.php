<?php
include('connection.php');
@session_start();
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
        }
    </style>
</head>
<body>
    <div class="center">
        <h2 class="text-center">User Login</h2>
                <form action="" method="post">
                    <!--Username Field-->
                    <div class="text_field">
                        <input type="text" name="user_username" id="user_username" class="form-control"
                         autocomplete="off" required  pattern="[A-Za-z0-9]+">
                         <span></span>
                        <label for="user_username" class="form-label">Username</label>
                    </div>
                    <!--Password Field-->
                    <div class="text_field">
                        <input type="password" name="user_password" id="user_password" class="form-control"
                         autocomplete="off" required  minlength="8" maxlength="30">
                         <span></span>
                        <label for="user_password" class="form-label">Password</label>
                    </div>
                    <input type="submit" value="Login"  name="user_login">
                    <div class="signup_link">
                        Don't have an account? <a href="user_registration.php"class="text-danger">Register</a></p>
                    </div>
                </form>
    </div>
</body>
</html>
<?php
  function getIPAddress2() {  
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
if(isset($_POST['user_login'])){
    $user_username=$_POST['user_username'];
    $user_password=$_POST['user_password'];
    $select_query="Select * from `user_table` where username='$user_username' && user_password='$user_password'";
    $result=mysqli_query($con,$select_query);
    $row_count=mysqli_num_rows($result);
    $user_ip=getIPAddress2();
    $select_query_cart="Select * from `carts_detail` where ip_address='$user_ip'";
    $select_cart=mysqli_query($con,$select_query_cart);
    $row_count_cart=mysqli_num_rows($select_cart);
    if($row_count>0){
        $_SESSION['username']=$user_username;
        if($row_count==1 && $row_count_cart==0){
            $_SESSION['username']=$user_username;
            echo "<script>alert('Login Sucessfully!!')</script>";
            echo "<script>window.open('index.php','_self')</script>";
        }
         else{
            $_SESSION['username']=$user_username;
            echo "<script>alert('Login Sucessfully!!')</script>";
            echo "<script>window.open('payment.php','_self')</script>";
         }   
    }
    else{
        echo "<script>alert('Invalid Credentials')</script>";
    }
}
?>