<?php
include_once 'head.php';
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
      <div class="page-container" id="PageContainer">
        <main class="main-content" id="MainContent" role="main">
<div id="shopify-section-cart-template" class="shopify-section">
    <div class="page-width" data-section-id="cart-template" data-section-type="cart-template">
    <div class="section-header text-center">
      <h1>Your Cart</h1>
    </div>
    <form action="/cart" method="post" novalidate class="cart">
      <div style="height: 305px;overflow: auto;"><table>
        <thead class="cart__row cart__header">
          <tr>
          <th class="product-info" style="width:200px">Product</th>
          <th class="product-info" style="width:200px">Img</th>
          <th class="product-price">Price</th>
          <th class="product-quantity" style="width: 200px;">Quantity</th>
          <th class="total-product">Total</th>
          <th class="product-remove">Remove</th>
        </tr></thead>
        <tbody>
            <?php
            if(isset($user)){
                $cart = towquery("SELECT * FROM carts WHERE customer_id={$user['id']}");
                $cartv = [];
                while($cartf = towfetch($cart)){
                    $cartv[] = ['pro_id'=>$cartf['pro_id'],'qty'=>$cartf['qty']];
                }
                if(isset($cartv) and !empty($cartv)){
                    $cartdata = json_encode($cartv);
                }else{
                    $cartdata = '';
                }
            }elseif(isset($_COOKIE['cart'])){
                $cartdata = $_COOKIE['cart'];
            }
            if(isset($cartdata) and !empty($cartdata)){
            $cartdata = json_decode($cartdata,true);
            // print_r($cartdata);exit;
            $sub=0;
            if(is_array($cartdata)){
            foreach($cartdata as $cada){
                $pro = towquery("SELECT product.*,product_attributes.mrp,product_attributes.price,product_attributes.size_id,categories.categories as cat_name FROM `product` INNER JOIN product_attributes ON product_attributes.product_id=product.id INNER JOIN categories ON categories.id=product.categories_id WHERE product.id={$cada['pro_id']}");
                if(townum($pro) == 0){
                    continue;
                }
                $prof = towfetch($pro);
            ?>
            <tr class="cart__row border-bottom line1 cart-flex border-top">
              <td class="cart__meta  cart-flex-item">
                <div class="list-view-item__title">
                  <a href="/product.php?id=<?=$prof['id']?>">
                    <?=$prof['name']?>
                  </a>
                </div>
              </td>
              <td class="cart__meta  cart-flex-item">
                <div class="list-view-item__title">
                    <img src="/upload/<?=$prof['image']?>">
                </div>
              </td>
              <td class="cart__price-wrapper cart-flex-item product-price">
                ₹<?=$prof['price']?>
                <div class="cart__edit medium-up--hide">
                  <button type="button" class="btn btn--secondary btn--small js-edit-toggle cart__edit--active" data-target="line1">
                    <span class="cart__edit-text--edit"><i class="fa fa-pencil" aria-hidden="true"></i></span>
                    <span class="cart__edit-text--cancel"><i class="fa fa-times" aria-hidden="true"></i></span>
                  </button>
                </div>
              </td>
              <td class="cart__update-wrapper cart-flex-item product-quantity">                
                <div class="cart__qty cart-qty-btns">
                  <label for="updates_32674185576532:2d28a6382b9fac92e4792029d065476c" class="cart__qty-label">Quantity</label>
                  <div class="dec button qtyminus" onclick="sub(<?=$cada['pro_id']?>)">-</div>
                    <input class="cart__qty-input quantity update-cart" name="qty" value="<?=$cada['qty']?>" min="0" id="card-<?=$cada['pro_id']?>">
                  <div onclick="add(<?=$cada['pro_id']?>)">+</div> 
                </div>
              </td>
              <td class=" small--hide total-product">
                <div>
                  ₹<?php echo $prof['price'] * $cada['qty']; $sub += $prof['price'] * $cada['qty'];?>
                </div>
              </td>
              <td class="product_remove">
                <a href="deletecart.php?id=<?=$prof['id']?>" class="cart__remove" aria-label="Remove this item"><!-- Remove --><i class="fa fa-trash-o" aria-hidden="true"></i></a>
              </td>
            </tr>
            <?php }}}else{
                
            } ?>
        </tbody>
      </table></div>
      <footer class="cart__footer">
        <div class="grid">
          <div class="cart-bottm">
            <div class="continue_shopping">
               <a href="/collections" class="btn btn--secondary cart__continue cart__continue--large">Continue Shopping</a>
            </div>
            <div class=" cart_calculator">
              <div class="cart_content_inner">
                <div class="cart_total_title">
                  <span class="cart__subtotal-title">Subtotal</span>
                  <span class="cart__subtotal">₹<?php if(isset($sub)){echo $sub;}?></span>
                </div>
                
                <div class="cart__shipping">Shipping &amp; taxes calculated at checkout</div>
                <a href="select_address.php"><input type="button" name="checkout" class="btn btn--small-wide checkout_btn" value="Continue"></a>
                
              </div>
            </div>
        </div>

        </div>
      </footer>
    </form>
  
</div>
</div>
</main>
   <?php
   include_once 'foot.php';
   ?>
<script>
    function add(id){
        let card = $("#card-"+id);
        let add = card.val();
        card.val(parseInt(add)+1);
        var xhr = new XMLHttpRequest();
xhr.withCredentials = true;
xhr.addEventListener("readystatechange", function() {
  if(this.readyState === 4) {
      let re = JSON.parse(this.responseText);
      console.log(re);
    if(re.status == 1){
        $('.adding').html('Added');
        $('.cart-qty').html(re.total);
    };
  }
});
let qty = parseInt(add)+1;
xhr.open("GET", "https://artdarshan.com/add_to_cart.php?qty="+qty+"&id="+id);
xhr.send();
    }
    function sub(id){
        let card = $("#card-"+id);
        let add = card.val();
        card.val(parseInt(add)-1);
        var xhr = new XMLHttpRequest();
xhr.withCredentials = true;
xhr.addEventListener("readystatechange", function() {
  if(this.readyState === 4) {
      let re = JSON.parse(this.responseText);
      console.log(re);
    if(re.status == 1){
        $('.adding').html('Added');
        $('.cart-qty').html(re.total);
    };
  }
});
let qty = parseInt(add)-1;
xhr.open("GET", "https://artdarshan.com/add_to_cart.php?qty="+qty+"&id="+id);
xhr.send();
    }
</script>