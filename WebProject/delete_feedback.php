<?php
if(isset($_GET['delete_feedback'])){
    $delete_id=$_GET['delete_feedback'];
    $delete_query="Delete from `feedback` where id=$delete_id";
    $result_query=mysqli_query($con,$delete_query);
    if($result_query){
        echo "<script>alert('Feedback Deleted Successfully')</script>";
            echo "<script>window.open('admin.php','_self')</script>";
    }
}
?>