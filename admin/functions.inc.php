<?php
function pr($arr){
	echo '<pre>';
	print_r($arr);
}

function prx($arr){
	echo '<pre>';
	print_r($arr);
	die();
}

function get_safe_value($con,$str){
	if($str!=''){
		$str=trim($str);
		return mysqli_real_escape_string($con,$str);
	}
}

function redirect($url){
	?>
	<script>
	window.location.href="<?php echo $url?>";
	</script>
	<?php
}
function isAdmin(){
	if(!isset($_SESSION['ADMIN_LOGIN'])){
	?>
		<script>
		window.location.href='login.php';
		</script>
		<?php
	}
	if($_SESSION['ADMIN_ROLE']==1){
		?>
		<script>
		window.location.href='product.php';
		</script>
		<?php
	}
}

function imageCompress($source,$path,$quality=60){
    $checkp = explode('.',$path);
    $check = end($checkp);
    $check = strtolower($check);
    if($check == 'jpg' or $check == 'png' or $check == 'jpeg'){
	$arr=getimagesize($source);
	if($arr['mime']=="image/png"){
		$i=imagecreatefrompng($source);
	}elseif($arr['mime']=="image/jpeg"){
		$i=imagecreatefromjpeg($source);
	}
	$checkp = str_replace($check,'webp',$path);
	imagewebp($i,$checkp,$quality);
    }
}
?>