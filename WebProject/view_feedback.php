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
    <h3 class="text-center text-success">All Feature Products</h3>
    <table class="table table-bordered-mt-5">
        <thead class="bg-info text-center">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Subject</th>
                <th>Message</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody class="bg-secondary text-light">

        <?php
        //include('connection.php');
        $get_product="Select * from `feedback`";
        $result=mysqli_query($con,$get_product);
        $number=0;
        while($row=mysqli_fetch_assoc($result)){
            $id=$row['id'];
            $name=$row['name'];
            $email=$row['email'];
            $subject=$row['subject'];
            $Message=$row['message'];
            $number++;
            echo "<tr class='text-center '>
            <td>$number</td>
            <td>$name</td>
            <td>$email</td>
            <td>$subject</td>
            <td>$Message</td>
            <td><a href='admin.php?delete_feedback=$id' class='text-light'><i class='fas fa-trash'></i></a></td>
        </tr>";
        }
        ?>
           
        </tbody>
    </table>
</body>
</html>