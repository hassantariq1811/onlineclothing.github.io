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
        <h2 class="text-center">New Admin Registration</h2>
                <form action="" method="post" enctype="multipart/form-data">
                    <!--Username Field-->
                    <div class="text_field">
                        <input type="text" name="admin_username" id="admin_username" 
                       autocomplete="off" required  pattern="[A-Za-z0-9]+">
                       <span></span>
                       <label for="admin_username">Username</label>

                    </div>
                    <!--Useremail Field-->
                    <div class="text_field">
                        <input type="email" name="admin_email" id="admin_email"
                        autocomplete="off" required  pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$">
                        <span></span>
                        <label for="admin_email">Email</label>

                    </div>
                    <!--Password Field-->
                    <div class="text_field">
                        <input type="password" name="admin_password" id="admin_password" 
                        autocomplete="off" required  minlength="8" maxlength="30">
                        <span></span>
                        <label for="admin_password">Password</label>

                    </div>
                    <!--Confirm Password Field-->
                    <div class="text_field">
                        <input type="password" name="conf_admin_password" id="conf_admin_password"
                        autocomplete="off" required  minlength="8" maxlength="30">
                        <span></span>
                        <label for="conf_admin_password" >Confirm Password</label>

                    </div>
                    
                    <input type="submit" value="Register"  name="admin_register">

                    <div class="signup_link">
                        Already have an account? <a href="admin_login.php">Login</a>
                    </div>
                    
                </form>
                    
    </div>
                     
</body>
</html>
<!--PHP Code-->
<?php
if(isset($_POST['admin_register'])){
    $adminusername=$_POST['admin_username'];
    $adminemail=$_POST['admin_email'];
    $adminpassword=$_POST['admin_password'];
    $confadminpassword=$_POST['conf_admin_password'];
   // $adminip=getIPAddress();
    //select query
    $select_query="Select * from `admin_tabel` where admin_username='$adminusername' or admin_email='$adminemail'";
    $result=mysqli_query($con,$select_query);
    $row_count=mysqli_num_rows($result);
    if($row_count>0){
        echo "<script>alert('Username and Email already exists')</script>";
    }
    elseif($adminpassword!=$confadminpassword){
        echo "<script>alert('Password do not match')</script>";
    }
    else{
        //insert query
    $insert_query="insert into `admin_tabel` (admin_username,admin_email,admin_password,conf_admin_password)
    values('$adminusername','$adminemail','$adminpassword','$confadminpassword')";
    $sql_execute=mysqli_query($con,$insert_query);
    if($sql_execute){
        echo "<script>alert('Account created successfully!!!')</script>";
    }
    else{
        die(mysqli_error($con));
    }
    }

        //$_SESSION['admin_username']=$username;
}
?>