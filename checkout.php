<?php
include_once 'head.php';
require('razorpay/Razorpay.php');
use Razorpay\Api\Api;
if(isset($_POST['address'])){
if(!isset($user)){
    print_r("<script>window.location.replace('login.php');</script>");
}else{
$ext = towrealarray2($_POST);
$cart = towquery("SELECT * FROM carts WHERE customer_id={$user['id']}");
$cartv = [];
                while($cartf = towfetch($cart)){
                    $cartv[] = ['pro_id'=>$cartf['pro_id'],'qty'=>$cartf['qty']];
                }
$total = 0;
$proaa = [];
foreach($cartv as $cada){
                $pro = towquery("SELECT product.*,product_attributes.mrp,product_attributes.price,product_attributes.size_id,categories.categories as cat_name FROM `product` INNER JOIN product_attributes ON product_attributes.product_id=product.id INNER JOIN categories ON categories.id=product.categories_id WHERE product.id={$cada['pro_id']}");
                if(townum($pro) == 0){
                    continue;
                }
                $prof = towfetch($pro);
                $total += $prof['price'] * $cada['qty'];
                $prof['qty'] = $cada['qty'];
                $proaa[] = $prof;
}
$order_id = towquery2("INSERT INTO `orders`(`user_id`, `address_id`,`payment_type`,`total_price`,`payment_status`,`order_status`) VALUES ('{$user['id']}','{$ext['address']}','{$ext['payment_method']}','{$total}','pending','pending')");
foreach($proaa as $proa){
towquery("INSERT INTO `order_detail`(`order_id`, `product_id`, `pro_atr_id`, `qty`, `price`) VALUES ('$order_id','{$proa['id']}','{$proa['id']}','{$proa['qty']}','{$proa['price']}')");
towquery("DELETE FROM `carts` WHERE customer_id='{$user['id']}' AND pro_id='{$proa['id']}'");
}
$ext = towrealarray($_POST); extract($ext);
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
$headers .= 'From: <artdarshan info@artdarshan.com>' . "\r\n";
$to="artdarshancomp@gmail.com";
$message="you have an order";
mail($to,"you have an order",$message,$headers);       

if($_POST['payment_method'] == 'ONLINE'){
print_r("<script>window.location.replace('checkout.php?order_id=$order_id');</script>");
}else{
print_r("<script>window.location.replace('thankyou.php');</script>");
}
}
}elseif($_GET['order_id']){
    $order_id = towreal($_GET['order_id']);
    // echo "SELECT * FROM orders WHERE id='$order_id'";
    $order = towquery("SELECT * FROM orders WHERE id='$order_id'");
    if(townum($order) > 0){
        $order = towfetch($order);
    // print_r($order);exit;
?>
<style>
.cart .cart__footer {
    color: #3a3838;
    font-size: 18px;
    line-height: 24px;
    font-family: 'Source Sans Pro',sans-serif;
    font-weight: 400;
}
.grid {
    list-style: none;
    margin: 0;
    padding: 0;
}
.cart .cart__footer .cart_top {
    padding: 30px 30px;
    border-bottom: 1px solid #f2f2f2;
}
.cart .cart__footer .cart_top .cart-note, .template-cart .cart .cart__footer .cart_top .update_cart {
    display: inline-block;
    vertical-align: middle;
}
.cart .cart__footer .cart_top .update_cart {
    float: right;
}
.cart .cart__footer .cart-bottm {
    padding: 30px 30px;
    padding-right: 0;
    margin-top: 30px;
    display: block;
    overflow: hidden;
}
    .cart .cart__footer .cart-bottm {
    padding: 30px 30px;
    padding-right: 0;
    margin-top: 30px;
    display: block;
    overflow: hidden;
}
.cart .cart__footer .cart-bottm .continue_shopping {
    display: inline-block;
    vertical-align: middle;
}
.btn {
    -moz-user-select: none;
    -ms-user-select: none;
    -webkit-user-select: none;
    user-select: none;
    -webkit-appearance: none;
    -moz-appearance: none;
    appearance: none;
    display: inline-block;
    width: auto;
    text-decoration: none;
    text-align: center;
    vertical-align: middle;
    cursor: pointer;
    padding: 8px 15px;
    background-color: #f2e6e5;
    color: #000;
    border: 1px solid #f2e6e5;
    font-family: Poppins;
    border-radius: 0;
    text-transform: uppercase;
    white-space: normal;
    font-size: 14px;
    letter-spacing: .5px;
    font-weight: 400;
    -webkit-transition: all .5s;
    -moz-transition: all .5s;
    -o-transition: all .5s;
    transition: all .5s;
    outline: 0;
}

.cart .cart__footer .cart-bottm .cart_calculator {
    padding: 40px 48px 40px 48px;
}
.cart .cart__footer .cart-bottm .cart_calculator {
    float: right;
    padding: 30px;
    background: #f8f8f8;
}
.cart .cart__footer .cart-bottm .cart_calculator .cart_content_inner {
    background: #fff;
    padding: 20px 0;
    width: 400px;
}.cart .cart__footer .cart-bottm .cart_calculator .cart_content_inner .cart_total_title span {
    padding: 10px 20px;
    color: #3a3838;
    font-size: 20px;
    text-transform: uppercase;
    font-weight: 600;
    letter-spacing: .5px;
}
.cart .cart__footer .cart-bottm .cart_calculator .cart_content_inner .cart_total_title .cart__subtotal {
    color: #000;
}.cart .cart__footer .cart-bottm .cart_calculator .cart_content_inner .cart__shipping {
    padding: 10px 20px 30px;
    border-top: 1px solid #f2f2f2;
    font-size: 16px;
}
.cart .cart__footer .cart-bottm .cart_calculator .cart_content_inner .checkout_btn {
    margin: 0 auto;
    display: block;
    text-align: center;
    background: #151515;
    color: #fff;
    border-color: #151515;
}
</style>
</div>
</div>
<div class="page-container" id="PageContainer"><br><br>
    <main class="main-content" id="MainContent" role="main">
        <?php
$keyId = 'rzp_live_hDnWumYApjuAAn';
$keySecret = 'dXEpzzZcbaaAfQSlknpK1U7W';
$api = new Api($keyId, $keySecret);
$orderData = [
    'receipt'         => 3456,
    'amount'          => $order['total_price'] * 100,
    'currency'        => 'INR',
    'payment_capture' => 1
];
$razorpayOrder = $api->order->create($orderData);
$razorpayOrderId = $razorpayOrder['id'];
$_SESSION['razorpay_order_id'] = $razorpayOrderId;
$displayAmount = $amount = $orderData['amount'];
?>
<button id="rzp-button1" style="opacity: 0;">Pay</button>
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script>
var options = {
    "key": "<?=$keyId?>", // Enter the Key ID generated from the Dashboard
    "amount": "1", // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise
    "currency": "INR",
    "name": "ArtDarshan",
    "description": "Test Transaction",
    "image": "https://artdarshan.com/art/logo.png",
    "order_id": "<?=$razorpayOrderId?>", //This is a sample Order ID. Pass the `id` obtained in the response of Step 1
    "handler": function (response){
    window.location.replace('https://artdarshan.com/confirmpayment.php?orderid=<?=$order_id;?>&razorpay_order_id='+response.razorpay_order_id+'&razorpay_payment_id='+response.razorpay_payment_id);
    },
    "prefill": {
        "name": "<?=$user['first_name']?>",
        "email": "<?=$user['email']?>",
        "contact": "<?=$user['mobile']?>"
    },
    "notes": {
        "address": "Razorpay Corporate Office"
    },
    "theme": {
        "color": "#3399cc"
    }
};
var rzp1 = new Razorpay(options);
rzp1.on('payment.failed', function (response){
    window.location.replace('https://artdarshan.com/thankyou.php');
});
document.getElementById('rzp-button1').onclick = function(e){
    rzp1.open();
    e.preventDefault();
}
</script>
    </main>
   <?php
}}else{
     print_r("<script>window.location.replace('index.php');</script>");   
    }
   include_once 'foot.php';
   ?>
<script>
    document.getElementById('rzp-button1').click();
</script>