<?php
require('top.inc.php');
isAdmin();

$sql="SELECT `orders`.*,users.name,users.email,users.mobile FROM `orders` LEFT JOIN `users` ON orders.user_id=users.id where orders.id='".$_GET['oid']."'";

$res=mysqli_query($con,$sql);
$orow=mysqli_fetch_assoc($res);

// for product Detail
$prsql="SELECT  order_detail.*,product.name,product.image FROM `order_detail` LEFT JOIN `product` ON product.id=order_detail.product_id   where order_id='".$_GET['oid']."'";
$prquery=mysqli_query($con, $prsql);
// $orow=mysqli_fetch_all($prquery);
// echo "<pre>";
// print_r($orow);exit;

?>


<div class="content pb-0">
	<div class="orders">
	<a href="order_master.php">Go Back</a>
	   <div class="row">
		  <div class="col-xl-12">
			 <div class="card">
				<div class="card-body">
				   <!-- <h4 class="box-title">Contact Us </h4> -->
				</div>
				<div class="card-body--">
				    <div class="offset-xl-2 col-xl-8 col-lg-12 col-md-12 col-sm-12 col-12 padding">
     <div class="card">
         <div class="card-header p-4">
             <a class="pt-2 d-inline-block" href="index.php" data-abc="true">Glamcos</a>
             <div class="float-right">
                 <h3 class="mb-0">Order ID : <?php echo$orow['id'];?></h3>
               Oreder Date:  <?=$orow['added_on']?>
             </div>
         </div>
         <div class="card-body">
             <div class="row mb-4">
                 <div class="col-sm-6">
                     <h3 class="text-dark mb-1">Order Detail</h3>
                     <div>Total Price: <?=$orow['total_price']?>&#8377;</div>
                     <div>Payment Type: <?=$orow['payment_type']?></div>
                     <div>Payment Status: <?=$orow['payment_status']?></div>
                     <div>Order Status: <?=$orow['order_status']?></div>
                     <div><?php if ($orow['txnid']!=""){
                 echo"Transaction ID: ".$orow['txnid'];
                     } ?></div>
                     <div><?php if ($orow['mihpayid']!=""){
                 echo"Payu ID: ".$orow['mihpayid'];
                     } ?></div>
                 </div>
                 <div class="col-sm-6 ">
                     <h3 class="text-dark mb-1">Customer Detail</h3>
                   
                     <div>Name: <?=$orow['name']?></div>
                     <div>Email: <?=$orow['email']?></div>
                     <div>Mobile No: <?=$orow['mobile']?>&nbsp;&nbsp; <?=$orow['op_mobile']?></div>
                     <div>Address: <?=$orow['address']?></div>
                     <div>Pincode: <?=$orow['pincode']?></div>
                 </div>
             </div>
             <div class="table-responsive-sm">
                 <table class="table table-striped">
                     <thead>
                         <tr>
                             <th class="center">#</th>
                             <th> Image </th>
                             <th>Product Name</th>
                             <th>Size</th>
                            
                             <th class="right">Price</th>
                             <th class="center">Qty</th>
                             <th class="right">Total</th>
                         </tr>
                     </thead>
                     <tbody>
                     	<?php 
                     	$total_price=0;
                          $i=1;
                     	while($prrow=mysqli_fetch_assoc($prquery)) {
                     		$total_price+=$prrow['price']*$prrow['qty'];
                          
                     	 ?>
                         <tr>
                             <td class="center"> <?php echo $i; ?> </td>
                             <td class="center"> <img height="60px" src="<?php echo PRODUCT_IMAGE_SITE_PATH.$prrow['image']?>" alt="dfh"></td>
                             <td class="left strong"><?=$prrow['name']?></td>
                             <td class="left strong"><?=$prrow['pro_atr_id']?></td>
                             <td class="right"><?=$prrow['price']?></td>
                             <td class="left"><?=$prrow['qty']?></td>
                             <td class="right"><?=$prrow['price']*$prrow['qty']?>&#8377; </td>
                         </tr>
                     <?php $i++; } ?>
                         
                         
                        
                     </tbody>
                 </table>
             </div>
             <div class="row">
                 <div class="col-lg-4 col-sm-5">
                 </div>
                 <div class="col-lg-4 col-sm-5 ml-auto">
                     <table class="table table-clear">
                         <tbody>
                             
                             <tr>
                                 <td class="left">
                                     <strong class="text-dark">Total</strong> </td>
                                 <td class="right">
                                     <strong class="text-dark"><?php echo $total_price; ?>&#8377;</strong>
                                 </td>
                             </tr>
                         </tbody>
                     </table>
                 </div>
             </div>
         </div>
         <div class="card-footer bg-white">
             <p class="text-center"><?php echo date("l jS \of F Y h:i:s A") ;?></p>
         </div>
     </div>
 </div>
				</div>
			 </div>
		  </div>
	   </div>
	</div>
</div>
<?php
require('footer.inc.php');
?>