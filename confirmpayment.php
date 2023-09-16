<?php
include_once 'config.php';
$ext = towrealarray2($_GET);

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://api.razorpay.com/v1/orders/'.$_GET['razorpay_order_id'],
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'GET',
  CURLOPT_HTTPHEADER => array(
    'Authorization: Basic cnpwX2xpdmVfaERuV3VtWUFwanVBQW46ZFhFcHp6WmNiYWFBZlFTbGtucEsxVTdX'
  ),
));

$response = curl_exec($curl);

curl_close($curl);
$a = json_decode($response,true);
if($a['status'] == "paid"){
towquery("UPDATE `orders` SET `payment_status`='paid' WHERE id='{$ext['orderid']}'");
print_r("<script>window.location.replace('thankyou.php');</script>");
}
?>