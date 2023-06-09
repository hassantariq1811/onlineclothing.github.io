<?php
if(isset($_GET['delete_user'])){
    $delete_id=$_GET['delete_user'];
    $delete_query="Delete from `user_table` where user_id=$delete_id";
    $result_query=mysqli_query($con,$delete_query);
    if($result_query){
        echo "<script>alert('User Deleted Successfully')</script>";
            echo "<script>window.open('admin.php','_self')</script>";
    }
}
?>