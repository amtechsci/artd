<?php
require('top.inc.php');

$condition='';
$condition1='';
if($_SESSION['ADMIN_ROLE']==1){
	$condition=" and product.added_by='".$_SESSION['ADMIN_ID']."'";
	$condition1=" and added_by='".$_SESSION['ADMIN_ID']."'";
}
$categories_id='';
$name='';
/*$mrp='';
$price='';
$qty='';*/
$image='';
$short_desc	='';
$description	='';
$meta_title	='';
$meta_desc	='';
$meta_keyword='';
$best_seller='';
$sub_categories_id='';
$multipleImageArr=[];
$msg='';
$image_required='required';

$attrProduct[0]['product_id']='';
$attrProduct[0]['size_id']='';
// $attrProduct[0]['color_id']='';
$attrProduct[0]['mrp']='';
$attrProduct[0]['price']='';
// $attrProduct[0]['qty']='';
$attrProduct[0]['atr_id']='';


if(isset($_GET['pi']) && $_GET['pi']>0){
	$pi=towrealarray2($_GET['pi']);
	$delete_sql="delete from product_images where id='$pi'";
	mysqli_query($con,$delete_sql);
}

if(isset($_GET['id']) && $_GET['id']!=''){
	$image_required='';
	$id=towrealarray2($_GET['id']);
	$res=mysqli_query($con,"select * from product where id='$id' $condition1");
	$check=mysqli_num_rows($res);
	if($check>0){
		$row=mysqli_fetch_assoc($res);
		$categories_id=$row['categories_id'];
		$sub_categories_id=$row['sub_categories_id'];
		$name=$row['name'];
		/*$mrp=$row['mrp'];
		$price=$row['price'];
		$qty=$row['qty'];*/
		$short_desc=$row['short_desc'];
		$description=$row['description'];
		$meta_title=$row['meta_title'];
		$meta_desc=$row['meta_desc'];
		$meta_keyword=$row['meta_keyword'];
		$best_seller=$row['best_seller'];
		$image=$row['image'];
		
		$resMultipleImage=mysqli_query($con,"select id,product_images from product_images where product_id='$id'");
		if(mysqli_num_rows($resMultipleImage)>0){
			$jj=0;
			while($rowMultipleImage=mysqli_fetch_assoc($resMultipleImage)){
				$multipleImageArr[$jj]['product_images']=$rowMultipleImage['product_images'];
				$multipleImageArr[$jj]['id']=$rowMultipleImage['id'];
				$jj++;
			}
		}
		
		$resProductAttr=mysqli_query($con,"select * from product_attributes where product_id='$id'");
		$jj=0;
		while($rowProductAttr=mysqli_fetch_assoc($resProductAttr)){
			$attrProduct[$jj]['product_id']=$rowProductAttr['product_id'];
			$attrProduct[$jj]['size_id']=$rowProductAttr['size_id'];
			// $attrProduct[$jj]['color_id']=$rowProductAttr['color_id'];
			$attrProduct[$jj]['mrp']=$rowProductAttr['mrp'];
			$attrProduct[$jj]['price']=$rowProductAttr['price'];
			// $attrProduct[$jj]['qty']=$rowProductAttr['qty'];
			$attrProduct[$jj]['atr_id']=$rowProductAttr['atr_id'];
			$jj++;
		}		
		
	}else{
		header('location:product.php');
		die();
	}
}

if(isset($_POST['submit'])){
	// prx($_POST);
	$categories_id=towrealarray2($_POST['categories_id']);
	$sub_categories_id=towrealarray2($_POST['sub_categories_id']);
	$name=towrealarray2($_POST['name']);
	/*$mrp=towrealarray2($_POST['mrp']);
	$price=towrealarray2($_POST['price']);
	$qty=towrealarray2($_POST['qty']);*/
	$short_desc=towrealarray2($_POST['short_desc']);
	$description=towrealarray2($_POST['description']);
	$meta_title=towrealarray2($_POST['meta_title']);
	$meta_desc=towrealarray2($_POST['meta_desc']);
	$meta_keyword=towrealarray2($_POST['meta_keyword']);
	$best_seller=towrealarray2($_POST['best_seller']);
	
	$res=mysqli_query($con,"select product.* from product where product.name='$name' $condition1");
	$check=mysqli_num_rows($res);
	if($check>0){
		if(isset($_GET['id']) && $_GET['id']!=''){
			$getData=mysqli_fetch_assoc($res);
			if($id==$getData['id']){
			
			}else{
				$msg="Product already exist";
			}
		}else{
			$msg="Product already exist";
		}
	}
	
	if(isset($_GET['id']) && $_GET['id']==0){
		if($_FILES['image']['type']!='image/png' && $_FILES['image']['type']!='image/jpg' && $_FILES['image']['type']!='image/jpeg'){
			$msg="Please select only png,jpg and jpeg image formate";
		}
	}else{
		if($_FILES['image']['type']!=''){
				if($_FILES['image']['type']!='image/png' && $_FILES['image']['type']!='image/jpg' && $_FILES['image']['type']!='image/jpeg'){
				$msg="Please select only png,jpg and jpeg image formate";
			}
		}
	}
	
	if(isset($_FILES['product_images'])){
		foreach($_FILES['product_images']['type'] as $key=>$val){
			if($_FILES['product_images']['type'][$key]!=''){
				if($_FILES['product_images']['type'][$key]!='image/png' && $_FILES['product_images']['type'][$key]!='image/jpg' && $_FILES['product_images']['type'][$key]!='image/jpeg'){
					$msg="Please select only png,jpg and jpeg image formate in multipel product images";
				}
			}
		}
	}
	
	if($msg==''){
		if(isset($_GET['id']) && $_GET['id']!=''){
			if($_FILES['image']['name']!=''){
				$image=time().rand(111111111,999999999).'_'.$_FILES['image']['name'];
				imageCompress($_FILES['image']['tmp_name'],PRODUCT_IMAGE_SERVER_PATH.$image);
				$checkp = explode('.',$image);
                $check = end($checkp);
                $check = strtolower($check);
				$image = str_replace($check,'webp',$image);
				$update_sql="update product set categories_id='$categories_id',name='$name',short_desc='$short_desc',description='$description',meta_title='$meta_title',meta_desc='$meta_desc',meta_keyword='$meta_keyword',image='$image',best_seller='$best_seller',sub_categories_id='$sub_categories_id' where id='$id'";
			}else{
				$update_sql="update product set categories_id='$categories_id',name='$name',short_desc='$short_desc',description='$description',meta_title='$meta_title',meta_desc='$meta_desc',meta_keyword='$meta_keyword',best_seller='$best_seller',sub_categories_id='$sub_categories_id' where id='$id'";
			}
			mysqli_query($con,$update_sql);
		}else{
			$image=time().rand(111111111,999999999).'_'.$_FILES['image']['name'];
			imageCompress($_FILES['image']['tmp_name'],PRODUCT_IMAGE_SERVER_PATH.$image);
				$checkp = explode('.',$image);
                $check = end($checkp);
                $check = strtolower($check);
				$image = str_replace($check,'webp',$image);
		
			mysqli_query($con,"insert into product(categories_id,name,short_desc,description,meta_title,meta_desc,meta_keyword,status,image,best_seller,sub_categories_id,added_by) values('$categories_id','$name','$short_desc','$description','$meta_title','$meta_desc','$meta_keyword',1,'$image','$best_seller','$sub_categories_id','".$_SESSION['ADMIN_ID']."')");
			$id=mysqli_insert_id($con);
		}
		
		
		/*Product Multiple Images Start*/
		if(isset($_GET['id']) && $_GET['id']!=''){
			if(isset($_FILES['product_images']['name'])){
				foreach($_FILES['product_images']['name'] as $key=>$val){
				if($_FILES['product_images']['name'][$key]!=''){
					if(isset($_POST['product_images_id'][$key])){
						$image=time().rand(111111111,999999999).'_'.$_FILES['product_images']['name'][$key];
						imageCompress($_FILES['product_images']['tmp_name'][$key],PRODUCT_MULTIPLE_IMAGE_SERVER_PATH.$image);
				$checkp = explode('.',$image);
                $check = end($checkp);
                $check = strtolower($check);
				$image = str_replace($check,'webp',$image);
						mysqli_query($con,"update product_images set product_images='$image' where id='".$_POST['product_images_id'][$key]."'");
					}else{
						$image=time().rand(111111111,999999999).'_'.$_FILES['product_images']['name'][$key];
						imageCompress($_FILES['product_images']['tmp_name'][$key],PRODUCT_MULTIPLE_IMAGE_SERVER_PATH.$image);
				$checkp = explode('.',$image);
                $check = end($checkp);
                $check = strtolower($check);
				$image = str_replace($check,'webp',$image);
						mysqli_query($con,"insert into product_images(product_id,product_images) values('$id','$image')");
					}
				}
			}
			
			}
		}else{
			if(isset($_FILES['product_images']['name'])){
				foreach($_FILES['product_images']['name'] as $key=>$val){
					if($_FILES['product_images']['name'][$key]!=''){
						$image=time().rand(111111111,999999999).'_'.$_FILES['product_images']['name'][$key];
						imageCompress($_FILES['product_images']['tmp_name'][$key],PRODUCT_MULTIPLE_IMAGE_SERVER_PATH.$image);
				$checkp = explode('.',$image);
                $check = end($checkp);
                $check = strtolower($check);
				$image = str_replace($check,'webp',$image);
						mysqli_query($con,"insert into product_images(product_id,product_images) values('$id','$image')");
					}
				}
			}
		}
		/*Product Multiple Images End*/
		
		
		/*Product Attributes Start*/
		
		if(isset($_POST['mrp'])){
			foreach($_POST['mrp'] as $key=>$val){
				$mrp=towrealarray2($_POST['mrp'][$key]);
				$price=towrealarray2($_POST['price'][$key]);
				// $qty=towrealarray2($_POST['qty'][$key]);
				$size_id=towrealarray2($_POST['size_id'][$key]);
				// $color_id=towrealarray2($_POST['color_id'][$key]);
				$attr_id=towrealarray2($_POST['attr_id'][$key]);
				
				if($attr_id>0){
					mysqli_query($con,"update product_attributes set size_id='$size_id',mrp='$mrp',price='$price' where atr_id='$attr_id'");
				}else{
					mysqli_query($con,"insert into product_attributes(product_id,size_id,mrp,price) values('$id','$size_id','$mrp','$price')");
				}
			}
		}
			
		/*Product Attributes End*/
		
		redirect('product.php');
	}
}
?>
<script src="https://cdn.ckeditor.com/4.18.0/standard/ckeditor.js"></script>
<div class="content pb-0">
            <div class="animated fadeIn">
               <div class="row">
                  <div class="col-lg-12">
                     <div class="card">
                        <div class="card-header"><strong>Product</strong><small> Form</small></div>
                        <form method="post" enctype="multipart/form-data">
							<div class="card-body card-block">
							   <div class="form-group">
									<div class="row">
									  <div class="col-lg-6">
										<label for="categories" class=" form-control-label">Categories</label>
										<select class="form-control" name="categories_id" id="categories_id" onchange="get_sub_cat('')" required>
											<option value="">Select Category</option>
											<?php
											$res=mysqli_query($con,"select id,categories from categories order by categories asc");
											while($row=mysqli_fetch_assoc($res)){
												if($row['id']==$categories_id){
													echo "<option selected value=".$row['id'].">".$row['categories']."</option>";
												}else{
													echo "<option value=".$row['id'].">".$row['categories']."</option>";
												}
												
											}
											?>
										</select>
									  </div>
									   <div class="col-lg-6">
										<label for="categories" class=" form-control-label">Sub Categories</label>
										<select class="form-control" name="sub_categories_id" id="sub_categories_id">
											<option value="">Select Sub Category</option>
										</select>
									  </div>
									</div>
								</div>	
								<div class="form-group">
									<div class='row'>
										<div class="col-lg-9">
											<label for="categories" class=" form-control-label">Product Name</label>
											<input type="text" name="name" placeholder="Enter product name" class="form-control" required value="<?php echo $name?>">
										</div>
										<div class="col-lg-3">
											<label for="categories" class=" form-control-label">View In</label>
											<select class="form-control" name="best_seller" required>
												<option value=''>Select</option>
												<option value="1" <?php if($best_seller == 1){echo 'selected';} ?>>Home page m jo category h usmay</option>
														<option value="2" <?php if($best_seller == 2){echo 'selected';} ?>>EXCIVSIVE COLLECTION</option>
    														<option value="3" <?php if($best_seller == 3){echo 'selected';} ?>>FEATURED COLLECTION</option>
														<option value="4" <?php if($best_seller == 4){echo 'selected';} ?>>CORPORATE GIFTING</option>
														<option value="5" <?php if($best_seller == 5){echo 'selected';} ?>>SPECIAL COLLECTION</option>
														<option value="6" <?php if($best_seller == 6){echo 'selected';} ?>>LATEST COLLECTION</option>
											</select>
										  </div>
									</div>
								</div>
								<div class="form-group"  id="product_attr_box">
									<?php 
									$attrProductLoop=1;
									foreach($attrProduct as $list){?>
									<div class="row"id="attr_<?php echo $attrProductLoop?>">
									  <div class="col-lg-2">
										<label for="categories" class=" form-control-label">MRP</label>
										<input type="text" name="mrp[]" placeholder="MRP" class="form-control" required value="<?php echo $list['mrp']?>">
									  </div>
									  <div class="col-lg-2">
										<label for="categories" class=" form-control-label">Price</label>
										<input type="text" name="price[]" placeholder="Price" class="form-control" required value="<?php echo $list['price']?>">
									  </div>
									  <div class="col-lg-2">
										<label for="categories" class=" form-control-label">Size</label>
										<input type="text" name="size_id[]" placeholder="Size" class="form-control" required value="<?php echo $list['size_id']?>">
										
										
									  </div>
									 
									  <div class="col-lg-2">
										<label for="categories" class=" form-control-label"></label>
										<?php
										if($attrProductLoop==1){
											?>
											<button id="" type="button" class="btn btn-lg btn-info btn-block" onclick="add_more_attr()">
												<span id="payment-button-amount">Add More</span>
											</button>
											<?php
										}else{
											?>
											<button id="" type="button" class="btn btn-lg btn-danger btn-block" onclick="remove_attr('<?php echo $attrProductLoop?>','<?php echo $list['atr_id']?>')">
												<span id="payment-button-amount">Remove</span>
											</button>
											<?php
										}
										
										?>
										<input type="hidden" name="attr_id[]" value='<?php echo $list['atr_id']?>'/>
									  </div>
									</div>
									<?php 
									$attrProductLoop++;
									} ?>
								</div>
								
								
								
								<div class="form-group">
									<div class="row"  id="image_box">
									  <div class="col-lg-10">
									   <label for="categories" class=" form-control-label">Image</label>
										<input type="file" name="image" class="form-control" <?php echo  $image_required?>>
										<?php
										if($image!=''){
echo "<a target='_blank' href='".PRODUCT_IMAGE_SITE_PATH.$image."'><img width='150px' src='".PRODUCT_IMAGE_SITE_PATH.$image."'/></a>";
										}
										?>
									  </div>
									  <div class="col-lg-2">
										<label for="categories" class=" form-control-label"></label>
										<button id="" type="button" class="btn btn-lg btn-info btn-block" onclick="add_more_images()">
											<span id="payment-button-amount">Add Image</span>
										</button>
									 </div>
									  <div class="col-lg-2">
										<label for="categories" class=" form-control-label"></label>
										<button id="" type="button" class="btn btn-lg btn-info btn-block" onclick="add_more_images()">
											<span id="payment-button-amount">Add Image</span>
										</button>
									 </div>
									 <?php
									 if(isset($multipleImageArr[0])){
foreach($multipleImageArr as $list){
	echo '<div class="col-lg-6" style="margin-top:20px;" id="add_image_box_'.$list['id'].'"><label for="categories" class=" form-control-label">Image</label><input type="file" name="product_images[]" class="form-control" ><a href="manage_product.php?id='.$id.'&pi='.$list['id'].'" style="color:white;"><button type="button" class="btn btn-lg btn-danger btn-block"><span id="payment-button-amount"><a href="manage_product.php?id='.$id.'&pi='.$list['id'].'" style="color:white;">Remove</span></button></a>';
	echo "<a target='_blank' href='".PRODUCT_MULTIPLE_IMAGE_SITE_PATH.$list['product_images']."'><img width='150px' src='".PRODUCT_MULTIPLE_IMAGE_SITE_PATH.$list['product_images']."'/></a>";
	echo '<input type="hidden" name="product_images_id[]" value="'.$list['id'].'"/></div>';
	
}										 
									 }
									 ?>
									 
								  </div>
									 
								</div>
								
								<div class="form-group">
									<label for="categories" class=" form-control-label">Short Description</label>
									<textarea name="short_desc" placeholder="Enter product short description" class="form-control" required><?php echo $short_desc?></textarea>
								</div>
								
								<div class="form-group">
									<label for="categories" class=" form-control-label">Description</label>

									<textarea name="description" placeholder="Enter product description" class="form-control" required><?php echo $description?></textarea>
									<script>
                        CKEDITOR.replace( 'description' );
                </script>
								</div>
								
								<div class="form-group">
									<label for="categories" class=" form-control-label">Meta Title</label>
									<textarea name="meta_title" placeholder="Enter product meta title" class="form-control"><?php echo $meta_title?></textarea>
								</div>
								
								<div class="form-group">
									<label for="categories" class=" form-control-label">Meta Description</label>
									<textarea name="meta_desc" placeholder="Enter product meta description" class="form-control"><?php echo $meta_desc?></textarea>
								</div>
								
								<div class="form-group">
									<label for="categories" class=" form-control-label">Meta Keyword</label>
									<textarea name="meta_keyword" placeholder="Enter product meta keyword" class="form-control"><?php echo $meta_keyword?></textarea>
								</div>
								
								
							   <button id="payment-button" name="submit" type="submit" class="btn btn-lg btn-info btn-block">
							   <span id="payment-button-amount">Submit</span>
							   </button>
							   <div class="field_error"><?php echo $msg?></div>
							</div>
						</form>
                     </div>
                  </div>
               </div>
            </div>
         </div>
		 
		 <script>
			function get_sub_cat(sub_cat_id){
				var categories_id=jQuery('#categories_id').val();
				jQuery.ajax({
					url:'get_sub_cat.php',
					type:'post',
					data:'categories_id='+categories_id+'&sub_cat_id='+sub_cat_id,
					success:function(result){
						jQuery('#sub_categories_id').html(result);
					}
				});
			}
			
			var total_image=1;
			function add_more_images(){
				total_image++;
				var html='<div class="col-lg-6" style="margin-top:20px;" id="add_image_box_'+total_image+'"><label for="categories" class=" form-control-label">Image</label><input type="file" name="product_images[]" class="form-control" required><button type="button" class="btn btn-lg btn-danger btn-block" onclick=remove_image("'+total_image+'")><span id="payment-button-amount">Remove</span></button></div>';
				jQuery('#image_box').append(html);
			}
			
			function remove_image(id){
				jQuery('#add_image_box_'+id).remove();
			}
			
			var attr_count=1;
			function add_more_attr(){
				attr_count++;
				
				// var size_html=jQuery('#attr_1 #size_id').html();
				// size_html=size_html.replace('selected','');
				
				
				var html='<div class="row mt20" id="attr_'+attr_count+'"> <div class="col-lg-2"><label for="categories" class=" form-control-label">MRP</label><input type="text" name="mrp[]" placeholder="MRP" class="form-control" required="" value=""> </div> <div class="col-lg-2"><label for="categories" class=" form-control-label">Price</label><input type="text" name="price[]" placeholder="Price" class="form-control" required="" value=""> </div> <div class="col-lg-2"><label for="categories" class=" form-control-label">Size</label><input type="text" name="size_id[]" placeholder="Size" class="form-control" required="" value=""></div>  <div class="col-lg-2"><label for="categories" class=" form-control-label">&nbsp;</label><button id="" type="button" class="btn btn-lg btn-danger btn-block" onclick=remove_attr("'+attr_count+'")><span id="payment-button-amount">Remove</span></button> </div><input type="hidden" name="attr_id[]" value=""/></div>';
				jQuery('#product_attr_box').append(html);
			}
			
			function remove_attr(attr_count,id){
				jQuery.ajax({
					url:'remove_product_attr.php',
					data:'id='+id,
					type:'post',
					success:function(result){
						jQuery('#attr_'+attr_count).remove();
					}
				});
			}
		 </script>
         
<?php
require('footer.inc.php');
?>
<script>
<?php
if(isset($_GET['id'])){
?>
get_sub_cat('<?php echo $sub_categories_id?>');
<?php } ?>
</script>