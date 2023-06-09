<?php
if(isset($_GET['edit_fproducts'])){
    $edit_id=$_GET['edit_fproducts'];
    $get_data="Select * from `feature_product` where product_id=$edit_id";
    $result=mysqli_query($con,$get_data);
    $row=mysqli_fetch_assoc($result);
    $product_brand=$row['product_brand'];
    $product_title=$row['product_title'];
    $product_image=$row['product_image'];
    $product_price=$row['product_price'];
}
?>
<div class="container mt-5">
    <h1 class="text-center">Edit Feature Product</h1>
    <form action="" method="post" enctype="multipart/form-data">
    <div class="form-outline w-50 m-auto">
            <label for="product_brand" class="form-label">Product Brand</label>
            <input type="text" id="product_brand" name="product_brand" class="form-control"value="<?php echo $product_brand?>" required>
        </div>
        <div class="form-outline w-50 m-auto">
            <label for="product_title" class="form-label">Product Title</label>
            <input type="text" id="product_title" name="product_title" class="form-control" value="<?php echo $product_title?>"required>
        </div>
        <div class="form-outline w-50 m-auto">
            <label for="product_img" class="form-label">Product Image</label>
            <div class="d-flex">
            <input type="file" id="product_img" name="product_img" class="form-control px-0 py-1 w-90 m-auto" required>
            <img src="img/<?php echo $product_image?>" alt="" class="product_img">
            </div>
        </div>
        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_price" class="form-label">Product Price</label>
            <input type="text" id="product_price" name="product_price" class="form-control"value="<?php echo $product_price?>" required>
        </div><br>
        <div class="w-50 m-auto">
            <input type="submit" name="edit_product" id="edit_product" value="Update Product" class="btn btn-info mb-3 px-3">
        </div>
    </form>
</div>
<?php
if(isset($_POST['edit_product'])){
    $product_brand=$_POST['product_brand'];
    $product_title=$_POST['product_title'];
    $product_imag=$_FILES['product_img']['name'];
    $temp_image=$_FILES['product_img']['tmp_name'];
    $product_price=$_POST['product_price'];
    if($product_brand==''or $product_title==''or $product_imag=='' or $product_price==''){
        echo "<script>alert('Please fill all the fields and continue the process')</script>";
    }
    else{
        move_uploaded_file($temp_image,"img/$product_imag");
        $update_products="update `feature_product` set product_brand='$product_brand',
        product_title='$product_title',product_image='$product_imag',product_price='$product_price',date=NOW() where product_id=$edit_id";
        $result_update=mysqli_query($con,$update_products);
        if($result_update){
            echo "<script>alert('Product Updated Successfully')</script>";
            echo "<script>window.open('insert_fproduct','_self')</script>";
        }
    }
}
?>