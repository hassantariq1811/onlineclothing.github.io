<?php
include('connection.php');
if(isset($_POST['insert_product'])){
    $product_brand=$_POST['brand'];
    $product_title=$_POST['title'];
    $product_image=$_FILES['img']['name'];
    $temp_image=$_FILES['img']['tmp_name'];
    $product_price=$_POST['price'];

    if($product_brand==''|| $product_title==''||$product_image==''||$product_price==''){
        echo "<script>alert('Please fill all the availabe fields')</script>";
        exit();
    }

    else{
        move_uploaded_file($temp_image,"img/$product_image");
        $insert_product="insert into `feature_product` (product_brand,product_title,product_image,product_price) 
        values('$product_brand','$product_title','$product_image','$product_price')";
        $result_query=mysqli_query($con,$insert_product);
        if($result_query){
            echo "<script>alert('Successfully Inserted Product')</script>";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Clothing Website</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
     <style>
        body{
            margin: 0;
            padding: 0;
            font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
            background: linear-gradient(90deg,#E3E6F3,#8f92a0);
            height: 100vh;
            overflow: hidden;
        }
     </style>
</head>
<body class="bg-light">
    
    <div class="container-fluid my-3">
        <h1 class="text-center">Insert Product</h1>
        <div class="row d-flex align-item-center justify-content-center">
            <div class="col-lg-12 col-xl-6">
        <form action="" method="POST" enctype="multipart/form-data">
            <!--brand-->
            <div class="form-outline mb-4 ">
                <label for="brand" class="form-label">Product Brand</label>
                <input type="text" name="brand" id="brand" class="form-control" placeholder="Enter Product Brand" autocomplete="off" required maxlength="32" pattern="[A-Za-z]+">
            </div>
            <!--title-->
            <div class="form-outline mb-4 ">
                <label for="title" class="form-label">Product Title</label>
                <input type="text" name="title" id="title" class="form-control" placeholder="Enter Product Title " autocomplete="off" required maxlength="32" pattern="[A-Za-z]+">
            </div>
            <!--img-->
            <div class="form-outline mb-4 ">
                <label for="img" class="form-label">Product Image</label>
                <input type="file" name="img" id="img" class="form-control px-0 py-0" required accept="image/png, image/jpeg, image/jpg">
            </div>
            <!--Price-->
            <div class="form-outline mb-4">
                <label for="pric3" class="form-label">Product Price</label>
                <input type="text" name="price" id="price" class="form-control" placeholder="Enter Product Price" autocomplete="off" required pattern="\d+(\.\d{2})?">
            </div><br>
            <div class="form-outline mb-4 ">
                <input type="submit"name="insert_product" class="btn btn-info mb-3 px-3" value="Insert Product">
            </div>
        </form>
        </div>
        </div>
    </div>  
</body>
</html>