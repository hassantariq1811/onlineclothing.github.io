<?php
if(isset($_GET['delete_fproducts'])){
    $delete_id=$_GET['delete_fproducts'];
    $delete_query="Delete from `feature_product` where product_id=$delete_id";
    $result_query=mysqli_query($con,$delete_query);
    if($result_query){
        echo "<script>alert('Product Deleted Successfully')</script>";
            echo "<script>window.open('insert_fproduct','_self')</script>";
    }
}
?>