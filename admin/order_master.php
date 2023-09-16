<?php
require('top.inc.php');
isAdmin();
?>
<div class="content pb-0">
	<div class="orders">
	   <div class="row">
		  <div class="col-xl-12">
			 <div class="card">
				<div class="card-body">
				   <h4 class="box-title">Order Master </h4>
				</div>
				<div class="card-body--">
				   <div class="table-stats order-table ov-h">
					  <table class="table">
							<thead>
								<tr>
									<th class="product-thumbnail">Order ID</th>
									<th class="product-name"><span class="nobr">Order Date</span></th>
									<th class="product-price"><span class="nobr"> Address </span></th>
									<th class="product-stock-stauts"><span class="nobr"> Payment Type </span></th>
									<th class="product-stock-stauts"><span class="nobr"> Payment Status </span></th>
									<th class="product-stock-stauts"><span class="nobr"> Order Status </span></th>
								</tr>
							</thead>
							<tbody>
								<?php
								// $res=mysqli_query($con,"select `order`.*,order_status.name as order_status_str from `order`,order_status where order_status.id=`order`.order_status order by `order`.id desc");
								$res=mysqli_query($con,"select * from `orders`order by id desc");
								while($row=mysqli_fetch_assoc($res)){
								?>
								<tr>
									<td class="product-add-to-cart"><a href="order_detail.php?oid=<?php echo $row['id']?>"> <?php echo $row['id']?> &nbsp; Detail</a></td>
									<td class="product-name"><?php echo $row['added_on']?></td>
									<td class="product-name">
									<?php echo $row['address']?><br/>
									<?php echo $row['pincode']?>
									</td>
									<td class="product-name"><?php echo $row['payment_type']?></td>

							 <td class="product-name"><?php if($row['payment_status'] == 'paid'){ ?><span class="btn btn-success">Success </span><?php }else{ ?>
                              <input type="checkbox" value="Success" class="paybtn" data-id="<?php echo $row['id'];  ?>"  >  Pending <?php } ?></td>

									<td class="product-name"><?php if($row['order_status'] == 'Delivered'){ ?> <span class="btn btn-success">Delivered </span><?php }else{ ?>
                        <input type="checkbox" value="Delivered" class="orderbtn" data-id="<?php echo $row['id'];  ?>"  > Pending <?php } ?></td>
								</tr>
								<?php } ?>
							</tbody>
							
						</table>
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
 <script >
   $(document).ready(function(){
// for ordered
 $(document).on('click',".paybtn",function(){
 var payst = $(this).data("id");
 var addval = $(this).val();
 $.ajax({
    url:"status_change.php",
    method:"POST",
    data:{payst:payst,addval:addval},
    success:function(data){
       if(data == 1){
        window.setTimeout(function(){window.location.reload()},1000);   
            }else{
            	console.log(data);
            }
            }
        });
   });

// for payment
        $(document).on('click',".orderbtn",function(){
var ordst= $(this).data("id");
var addval = $(this).val();
 $.ajax({
    url:"status_change.php",
    method:"POST",
    data:{ordst:ordst,addval:addval},
    success:function(data){
       if(data == 1){
        window.setTimeout(function(){window.location.reload()},1000)  
            }else{
            	console.log(data);
            }
            }
        });

   });



    });

 </script>