<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Clothing Website</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" >
</head>
<body>
    <h3 class="text-center" style="color:#088178">All Products</h3>
    <table class="table table-bordered-mt-5">
        <thead class="bg-info">
            <tr>
                <th>Product ID</th>
                <th>Product Title</th>
                <th>Product Image</th>
                <th>Product Brand</th>
                <th>Product Price</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody class="bg-secondary text-light">

        <?php
        $get_product="Select * from `feature_product`";
        $result=mysqli_query($con,$get_product);
        $number=0;
        while($row=mysqli_fetch_assoc($result)){
            $product_id=$row['product_id'];
            $product_brand=$row['product_brand'];
            $product_title=$row['product_title'];
            $product_image=$row['product_image'];
            $product_price=$row['product_price'];
            $number++;
            echo "<tr class='text-center '>
            <td>$number</td>
            <td>$product_title</td>
            <td><img src='img/$product_image' class='product_img'></td>
            <td>$product_brand</td>
            <td>$$product_price</td>
            <td><a href='admin.php?edit_fproducts=$product_id' class='text-light'><i class='fas fa-edit'></i></a></td>
            <td><a href='admin.php?delete_fproducts=$product_id' class='text-light'><i class='fas fa-trash'></i></a></td>
        </tr>";
        }
        ?>
           
        </tbody>
    </table>
</body>
</html>