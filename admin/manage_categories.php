<?php
require('top.inc.php');
isAdmin();
$categories='';
$msg='';
// $image_required='required';
$image='';
if(isset($_GET['id']) && $_GET['id']!=''){
	$id=get_safe_value($con,$_GET['id']);
	$image_required='';
	$res=mysqli_query($con,"select * from categories where id='$id'");
	$check=mysqli_num_rows($res);
	if($check>0){
		$row=mysqli_fetch_assoc($res);
		$categories=$row['categories'];
		$image=$row['cat_img'];
	}else{
		header('location:categories.php');
		die();
	}
}

if(isset($_POST['submit'])){
	$categories=get_safe_value($con,$_POST['categories']);
	$res=mysqli_query($con,"select * from categories where categories='$categories'");
	$check=mysqli_num_rows($res);
	if($check>0){
		if(isset($_GET['id']) && $_GET['id']!=''){
			$getData=mysqli_fetch_assoc($res);
			if($id==$getData['id']){
			
			}else{
				$msg="Categories already exist";
			}
		}else{
			$msg="Categories already exist";
		}
	}
	
	if($msg==''){
		if(isset($_GET['id']) && $_GET['id']!=''){
		    if($_FILES['image']['name']!=''){
		        $check = explode('.',$_FILES['image']['name']);
                $check = end($check);
                if($check == 'jpg' or $check == 'png' or $check == 'jpeg' or $check == 'webp'){
				$cat_img=rand(111111111,999999999).'_'.$_FILES['image']['name'];
				move_uploaded_file($_FILES['image']['tmp_name'],BANNER_SERVER_PATH.$cat_img);
				mysqli_query($con,"update categories set categories='$categories',cat_img='$cat_img' where id='$id'");
                }else{
				mysqli_query($con,"update categories set categories='$categories' where id='$id'");
			    }
			}else{
				mysqli_query($con,"update categories set categories='$categories' where id='$id'");
			}
		}else{
		    $check = explode('.',$_FILES['image']['name']);
            $check = end($check);
            if($check == 'jpg' or $check == 'png' or $check == 'jpeg' or $check == 'webp'){
		    $cat_img = rand(111111111,999999999).'_'.$_FILES['image']['name'];
			move_uploaded_file($_FILES['image']['tmp_name'],BANNER_SERVER_PATH.$cat_img);
			mysqli_query($con,"insert into categories(categories,cat_img,status) values('$categories','$cat_img','1')");
            }else{
			mysqli_query($con,"insert into categories(categories,cat_img,status) values('$categories','https://artdarshan.com/art/logo.pngs','1')");
            }
		}
		header('location:categories.php');
        exit;
	}
}
?>
<div class="content pb-0">
            <div class="animated fadeIn">
               <div class="row">
                  <div class="col-lg-12">
                     <div class="card">
                        <div class="card-header"><strong>Categories</strong><small> Form</small></div>
                        <form method="post" enctype="multipart/form-data">
							<div class="card-body card-block">
							   <div class="form-group">
									<label for="categories" class=" form-control-label">Categories</label>
									<input type="text" name="categories" placeholder="Enter categories name" class="form-control" required value="<?php echo $categories?>">
								</div>
								<div class="form-group">
									<label for="heading1" class=" form-control-label">Image</label>
									<input type="file" name="image" class="form-control" value="<?php echo $image?>">
									<?php
										if($image!=''){
                                            echo "<a target='_blank' href='".BANNER_SITE_PATH.$image."'><img width='150px' src='".BANNER_SITE_PATH.$image."'/></a>";
										}
										?>
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
         
<?php
require('footer.inc.php');
?>