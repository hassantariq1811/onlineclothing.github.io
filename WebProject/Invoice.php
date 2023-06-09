<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<?php
include('connection.php');
include('common_function.php');
?>
<div class="container">
    <div class="row">
        <div class="col-xs-12">
    		<div class="invoice-title">
    			<h2>Invoice</h2>
    		</div>
    		<hr>
    
    <div class="row">
    	<div class="col-md-12">
    		<div class="panel panel-default">
    			<div class="panel-heading">
    				<h3 class="panel-title"><strong>Order summary</strong></h3>
    			</div>
    			<div class="panel-body">
    				<div class="table-responsive">
    					<table class="table table-condensed">
    					<?php
    global $con;
    $get_ip_add =getIPAddress();
    $total_price=0;
    $cart_query="Select * from `carts_detail` where  ip_address ='$get_ip_add'";
    $result=mysqli_query($con, $cart_query); 
    $result_count=mysqli_num_rows($result);
    if($result_count>0){
        echo "<thead>
        <tr>
            <th>Product Image</th>
            <th>Product Title</th>
            <th>Product Brand</th>
            <th>Product Prices</th>
        </tr>
        </thead>
        <tbody>";
        while($row = mysqli_fetch_array($result)) {
            $product_id =$row['product_id']; 
            $select_products="Select * from `feature_product` where 
            product_id ='$product_id'";
            $result_products =mysqli_query($con, $select_products);
        
            while($row_product_price=mysqli_fetch_array($result_products)){
            
            $product_price=array($row_product_price['product_price']); 
            $price_table = $row_product_price['product_price'];
            $product_title = $row_product_price['product_title'];
            $product_image = $row_product_price['product_image'];
            $product_brand = $row_product_price['product_brand'];
            $product_values=array_sum($product_price);
            $total_price+=$product_values;

    ?>
    <tr >
    <td width="100px"> <img src="img/<?php echo $product_image?>" alt="" width="150px" height="80px"></td>
    <td><?php echo $product_title ?> </td>
    <td><?php echo $product_brand ?> </td>
    <td> $<?php echo $price_table ?></td></tr>
    <?php }}}?>
    							<tr>
    								<td class="thick-line"></td>
    								<td class="thick-line"></td>
    								<td class="thick-line text-center"><strong>Subtotal</strong></td>
    								<td class="thick-line text-right">$<?php echo $total_price?></td>
    							</tr>
    							<tr>
    								<td class="no-line"></td>
    								<td class="no-line"></td>
    								<td class="no-line text-center"><strong>Shipping</strong></td>
    								<td class="no-line text-right">free</td>
    							</tr>
    							<tr>
    								<td class="no-line"></td>
    								<td class="no-line"></td>
    								<td class="no-line text-center"><strong>Total</strong></td>
    								<td class="no-line text-right">$<?php echo $total_price?></td>
    							</tr>
    						</tbody>
    					</table>
    				</div>
    			</div>
    		</div>
    	</div>
    </div>
</div>