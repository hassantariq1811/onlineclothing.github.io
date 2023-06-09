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
    <h3 class="text-center" style="color:#088178">All Users</h3>
    <table class="table table-bordered-mt-5">
        <thead class="bg-info text-center">
            <tr>
                <th>User ID</th>
                <th>Username</th>
                <th>Email</th>
                <th>Password</th>
                <th>Address</th>
                <th>Contact</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody class="bg-secondary text-light">

        <?php
        $get_product="Select * from `user_table`";
        $result=mysqli_query($con,$get_product);
        $number=0;
        while($row=mysqli_fetch_assoc($result)){
            $id=$row['user_id'];
            $username=$row['username'];
            $email=$row['user_email'];
            $pass=$row['user_password'];
            $address=$row['user_address'];
            $contact=$row['user_contact'];
            $number++;
            echo "<tr class='text-center '>
            <td>$number</td>
            <td>$username</td>
            <td>$email</td>
            <td>$pass</td>
            <td>$address</td>
            <td>$contact</td>
            <td><a href='admin.php?delete_user=$id' class='text-light'><i class='fas fa-trash'></i></a></td>
        </tr>";
        }
        ?>
           
        </tbody>
    </table>
</body>
</html>