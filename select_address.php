<?php
include_once 'head.php';
if(!isset($user)){
    print_r("<script>window.location.replace('login.php');</script>");
}
if(isset($_POST['add_new_add'])){
    $addext = towrealarray($_POST);
    towquery("INSERT INTO `address` (`uid`, `name`, `mobile`, `address_line1`, `address_line2`, `pin_code`, `state`) VALUES ('{$user['id']}', '{$addext['name']}', '{$addext['mobile']}', '{$addext['address_line1']}', '{$addext['address_line2']}', '{$addext['pin_code']}', '{$addext['state']}')");
    print_r("<script>window.location.replace('select_address.php');</script>");
}
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
.selectadd{
    width:45%; float:left; margin-left: 2%;
}
.addaddress{
    width:45%; float:right; margin-right: 2%;
}
@media only screen and (max-width: 600px) {
  .selectadd{
    width:100%; float:left;
}
.addaddress{
    width:100%; float:right;
}
}
</style>
</div>
</div>
<div class="page-container" id="PageContainer"><br><br>
    <main class="main-content" id="MainContent" role="main">
        <div class="shopify-section selectadd">
            <div class="section-header text-center">
      <h3>Select a delivery address</h3>
    </div>
    <?php
    $a = towquery("SELECT * FROM `address` WHERE uid='{$user['id']}'");
    if(townum($a) > 0){ ?>
    <form action="checkout.php" method="post">
    <div style="background: rgba( 255, 255, 255, 0.25 );
        box-shadow: 0 8px 32px 0 rgba( 31, 38, 135, 0.37 );
        backdrop-filter: blur( 4px );
        -webkit-backdrop-filter: blur( 4px );
        border-radius: 10px;
        border: 1px solid rgba( 255, 255, 255, 0.18 );">
    <?php while($add = towfetch($a)){ ?>
        <div style="background: rgba( 255, 255, 255, 0.25 );
        box-shadow: 0 0px 30px 0 rgba( 31, 38, 135, 0.37 );
        backdrop-filter: blur( 4px );
        -webkit-backdrop-filter: blur( 4px );
        border-radius: 10px;
        border: 1px solid rgba( 255, 255, 255, 0.18 );margin-top: 35px; margin:15px;">
                <div class="row" style="padding: 20px;">
                    <div class="col-4">
                        <div class="a-row address-row list-address-selected">
                            <span class="a-declarative" data-action="select-address-in-list" data-select-address-in-list="{}">
                              <div class="a-radio">
                                  <label><input type="radio" name="address" value="<?=$add['id']?>" checked>
                                      <i class="a-icon a-icon-radio"></i>
                                      <span class="a-label a-radio-label">
                                          <span class="a-text-bold"><span class="break-word"><?=$add['name']?></span></span>
                                          <span class="break-word"><?=$add['address_line1']?> <?=$add['address_line2']?> <?=$add['pin_code']?> <?=$add['state']?><br> Phone number: <?=$add['mobile']?></span>
                                      </span>
                                  </label>
                              </div>
                            </span>
                        </div>
                    </div>
                </div>
        </div>
    <?php } ?>
    </div>
        <div style="margin-top:10px; margin-bottom:10px;  padding:15px; background: rgba( 255, 255, 255, 0.25 );
            box-shadow: 0 8px 32px 0 rgba( 31, 38, 135, 0.37 );
            backdrop-filter: blur( 4px );
            -webkit-backdrop-filter: blur( 4px );
            border-radius: 10px;
            border: 1px solid rgba( 255, 255, 255, 0.18 );">
                <h2>Choose Payment Method:</h2>
                <h4><input type="radio" name="payment_method" value="COD"> Cash on delivery</h4>
                <h4><input type="radio" name="payment_method" value="ONLINE"> Pay by card/UPI</h4>
                
                <input type="submit" name="state" class="btn" style="width:100%;" value="Continue">
            </div>
    </form>
    <?php }else{ ?>
        <!--<div style="background: rgba( 255, 255, 255, 0.25 );box-shadow: 0 8px 32px 0 rgba( 31, 38, 135, 0.37 );backdrop-filter: blur( 4px );-webkit-backdrop-filter: blur( 4px );border-radius: 10px;border: 1px solid -->
        <!--rgba( 255, 255, 255, 0.18 );">-->
            <div style="background: rgba( 255, 255, 255, 0.25 );box-shadow: 0 0px 30px 0 rgba( 31, 38, 135, 0.37 );backdrop-filter: blur( 4px );-webkit-backdrop-filter: blur( 4px );border-radius: 10px;
            border: 1px solid rgba( 255, 255, 255, 0.18 );margin-top: 35px; margin:15px;">
                <div class="row" style="padding: 20px;">
                    <h5 style="margin:0px;">You don't have any previous saved address. Please add new</h5>
                </div>
            </div>
        <!--</div>-->
    <?php } ?>
    
        </div>
        <div class="shopify-section addaddress">
            <div class="section-header text-center">
      <h3>Add new a delivery address</h3>
    </div>
        <div style="background: rgba( 255, 255, 255, 0.25 );
        box-shadow: 0 8px 32px 0 rgba( 31, 38, 135, 0.37 );
        backdrop-filter: blur( 4px );
        -webkit-backdrop-filter: blur( 4px );
        border-radius: 10px;
        border: 1px solid rgba( 255, 255, 255, 0.18 );margin-top: 35px; margin:15px;">
                <div class="row" style="padding: 20px;">
                    <form method="post">
                        <div class="form-group">
                        <input type="text" name="name" class="form-control" placeholder="Name">
                        </div>
                        <div class="form-group">
                        <input type="text" name="mobile" class="form-control" placeholder="Mobile">
                        </div>
                        <div class="form-group">
                        <input type="text" name="address_line1" class="form-control" placeholder="Address line 1">
                        </div>
                        <div class="form-group">
                        <input type="text" name="address_line2" class="form-control" placeholder="Address line 2">
                        </div>
                        <div class="form-group">
                        <input type="text" name="pin_code" class="form-control" placeholder="Pincode">
                        </div>
                        <div class="form-group">
                        <input type="text" name="state" class="form-control" placeholder="State">
                        </div>
                        <div class="form-group">
                        <input type="submit" name="add_new_add" class="form-control" value="Add new address">
                        </div>
                    </form>
                </div>
        </div>
        </div>
    </main>
   <?php
   include_once 'foot.php';
   ?>