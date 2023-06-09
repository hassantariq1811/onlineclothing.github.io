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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <style>
        body{
            background: linear-gradient(90deg,#E3E6F3,#8f92a0);
        }
        button.nor{
    font-size: 14px;
    font-weight: 600;
    padding: 15px 30px;
    color: #fff;
    background-color: #088178;
    border-radius: 4px;
    cursor: pointer;
    border: none;
    outline: none;
    transition: 0.2s;
    padding: 25px;
    margin: 3px;
    
}
a{
    text-decoration: none;
    color: white;
}
.nor:hover{
    background-color:#081000; 
    box-shadow: 20px 20px 30px rgba(0, 0, 0, 0.06);
}
@media (max-width:540px){
    button.nor{
        font-size: 14px;
        font-weight: 600;

        border-radius: 4px;
        padding: 40px;
        margin: 10px;
        
    }
}
@media(max-width:769px){
    button.nor{
        font-size: 14px;
        font-weight: 600;
        border-radius: 4px;
        padding: 40px;
        margin: 10px;
        
    }
}
.product_img{
    width: 80px;
    object-fit: contain;
}
    </style>
</head>
<body>
    <section id="header">
        <a href="#"><img src="img/logo.png" class="logo " alt=""></a>
        
    </section> 
    <section style="display:flex; text-decoration: none; background-color:#E3E6F3">
    <?php
     if(!isset($_SESSION['admin_username'])){
        echo "<li style='list-style: none;'>
        <p style='font-size: 20px; color:#088178;'>Welcome Guest&nbsp;</p>
    </li>";
     }
     else{
        echo "<li style='list-style: none;'>
        <p style='font-size: 20px; color:#088178;'>Welcome ".$_SESSION['admin_username']."&nbsp;</p>
    </li>";
     }
     
     ?>
     </section>
    <section class="section-p1 section-m1">
        <hr>
    <div>
        <h3 align="center">ADMIN PANEL</h3>
        <h3 style="text-align:center; padding:12px; font-size:34px;">Manage Details</h3>
    </div>
    <div>
        <center>
                <button class="nor"><a href="insert_fProduct.php">Add Feature Product</a></button>
                <button class="nor"><a href="admin.php?view_fproducts">View Feature Product</a></button>
                <button class="nor"><a href="admin.php?view_feedback">View Feedback</a></button>
                <button class="nor"><a href="admin.php?list_user">List Users</a></button>
                <button class="nor"><a href="logout.php">Logout</a></button></center>
        </div>
        <hr>
</section>
<div class="container my-3">
    <?php
    if(isset($_GET['view_fproducts'])){
        include('view_fproducts.php');
    }
    if(isset($_GET['edit_fproducts'])){
        include('edit_fproducts.php');
    }
    if(isset($_GET['delete_fproducts'])){
        include('delete_fproducts.php');
    }
    if(isset($_GET['view_feedback'])){
        include('view_feedback.php');
    }
    if(isset($_GET['delete_feedback'])){
        include('delete_feedback.php');
    }
    if(isset($_GET['list_user'])){
        include('list_user.php');
    }
    if(isset($_GET['delete_user'])){
        include('delete_user.php');
    }
    ?>
</div>
 
    <script src="script.js"></script>
</body>
</html>