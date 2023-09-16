<?php
require('top.inc.php');
isAdmin();
$heading1='';
$heading2='';
$btn_txt='';
$btn_link='';
$image='';
$show_in='';
$msg='';
$order_no='';
$image_required='required';
if(isset($_GET['id']) && $_GET['id']!=''){
	$id=towrealarray2($_GET['id']);
	$image_required='';
	$res=mysqli_query($con,"select * from banner where id='$id'");
	$check=mysqli_num_rows($res);
	if($check>0){
		$row=mysqli_fetch_assoc($res);
		$heading1=$row['heading1'];
		$heading2=$row['heading2'];
		$btn_txt=$row['btn_txt'];
		$btn_link=$row['btn_link'];
		$image=$row['image'];
		$show_in=$row['show_in'];
		$order_no=$row['order_no'];
	}else{
		header('location:banner.php');
		die();
	}
}

if(isset($_POST['submit'])){
	$heading1=towrealarray2($_POST['heading1']);
	$heading2=towrealarray2($_POST['heading2']);
	$btn_txt=towrealarray2($_POST['btn_txt']);
	$btn_link=towrealarray2($_POST['btn_link']);
	$show_in=towrealarray2($_POST['show_in']);
	$order_no=towrealarray2($_POST['order_no']);
	
	if(isset($_GET['id']) && $_GET['id']==0){
		if($_FILES['image']['type']!='image/png' && $_FILES['image']['type']!='image/jpg' && $_FILES['image']['type']!='image/webp' && $_FILES['image']['type']!='image/jpeg'){
			$msg="Please select only png, jpg, webp and jpeg image formate";
		}
	}else{
		if($_FILES['image']['type']!=''){
				if($_FILES['image']['type']!='image/png' && $_FILES['image']['type']!='image/jpg' && $_FILES['image']['type']!='image/webp' && $_FILES['image']['type']!='image/jpeg'){
				$msg="Please select only png,jpg, webp and jpeg image formate";
			}
		}
	}
	$msg="";
	if($msg==''){
		if(isset($_GET['id']) && $_GET['id']!=''){
			if($_FILES['image']['name']!=''){
			    $check = explode('.',$_FILES['image']['name']);
                $check = strtolower(end($check));
                if($check == 'jpg' or $check == 'png' or $check == 'jpeg' or $check == 'webp'){
				$image=rand(111111111,999999999).'_'.$_FILES['image']['name'];
				move_uploaded_file($_FILES['image']['tmp_name'],BANNER_SERVER_PATH.$image);
				mysqli_query($con,"update banner set heading1='$heading1',heading2='$heading2',btn_txt='$btn_txt',btn_link='$btn_link',image='$image',show_in='$show_in',order_no='$order_no' where id='$id'");
                }else{
				mysqli_query($con,"update banner set heading1='$heading1',heading2='$heading2',btn_txt='$btn_txt',btn_link='$btn_link',show_in='$show_in',order_no='$order_no'  where id='$id'");
			}
			}else{
				mysqli_query($con,"update banner set heading1='$heading1',heading2='$heading2',btn_txt='$btn_txt',btn_link='$btn_link',show_in='$show_in',order_no='$order_no'  where id='$id'");
			}
		}else{
		    $check = explode('.',$_FILES['image']['name']);
            $check = strtolower(end($check));
            if($check == 'jpg' or $check == 'png' or $check == 'jpeg' or $check == 'webp'){
			$image=rand(111111111,999999999).'_'.$_FILES['image']['name'];
			move_uploaded_file($_FILES['image']['tmp_name'],BANNER_SERVER_PATH.$image);
			mysqli_query($con,"insert into banner(btn_link,image,show_in,status,order_no) values('$btn_link','$image','$show_in','1','$order_no')");
            }
		}
		header('location:banner.php');
		die();
	}
}
?>
<div class="content pb-0">
            <div class="animated fadeIn">
               <div class="row">
                  <div class="col-lg-12">
                     <div class="card">
                        <div class="card-header"><strong>Banner</strong><small> Form</small></div>
                        <form method="post" enctype="multipart/form-data">
							<div class="card-body card-block">
							   <!--<div class="form-group">-->
									<!--<label for="heading1" class=" form-control-label">Heading1</label>-->
									<input type="hidden" name="heading1" placeholder="Enter heading1" class="form-control" value="<?php echo $heading1?>">
								<!--</div>-->
								<!--<div class="form-group">-->
									<!--<label for="heading1" class=" form-control-label">Heading2</label>-->
									<input type="hidden" name="heading2" placeholder="Enter heading2" class="form-control"  value="<?php echo $heading2?>">
								<!--</div>-->
								<!--<div class="form-group">-->
									<!--<label for="heading1" class=" form-control-label">Btn Txt</label>-->
									<input type="hidden" name="btn_txt" placeholder="Enter btn txt" class="form-control" value="<?php echo $btn_txt?>">
								<!--</div>-->
								<div class="form-group">
									<label for="heading1" class=" form-control-label">Btn Link</label>
									<input type="text" name="btn_link" placeholder="Enter btn link" class="form-control" value="<?php echo $btn_link?>">
								</div>
								<div class="form-group">
									<label for="heading1" class=" form-control-label">Image</label>
									<input type="file" name="image" class="form-control" <?php echo  $image_required?> value="<?php echo $image?>">
									<?php
										if($image!=''){
                                        echo "<a target='_blank' href='".BANNER_SITE_PATH.$image."'><img width='150px' src='".BANNER_SITE_PATH.$image."'/></a>";
										}
										?>
								</div>
								<div class="form-group">
									<label for="categories" class=" form-control-label">View In</label>
										<select class="form-control" name="show_in" required>
												<option value=''>Select</option>
												<?php
												if($show_in=='home_top'){
													echo '<option value="home_top" selected>Home Top</option>
														<option value="home_section">Home Section</option>
														<option value="about_section">About Section</option>';
												}elseif($show_in=='home_section'){
													echo '<option value="home_top">Home Top</option>
														<option value="home_section" selected>Home Section</option>
														<option value="about_section" >About Section</option>';
												}elseif($show_in=='about_section'){
													echo '<option value="home_top">Home Top</option>
														<option value="home_section" >Home Section</option>
														<option value="about_section" selected>About Section</option>';
												}else{
													echo '<option value="home_top">Home Top</option>
													<option value="home_section">Home Section</option>
													<option value="about_section">About Section</option>';
												}
												?>
										</select>
								</div>
								<div class="form-group">
									<label for="heading1" class=" form-control-label">Order No</label>
									<input type="text" name="order_no" required placeholder="Enter order no" class="form-control" value="<?php echo $order_no?>">
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