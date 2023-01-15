<?php
include('connection.inc.php');
extract(towrealarray2($_POST));
if (isset($payst)) {
$sql = "UPDATE `orders` SET payment_status = '".$addval."' WHERE id = '".$payst."'";
}elseif(isset($ordst)){
$sql = "UPDATE `orders` SET order_status = '".$addval."' WHERE id = '".$ordst."'";
}
if(mysqli_query($con, $sql)){
  echo 1;
}else{
  echo 0;
}

?>