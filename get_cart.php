<?php
include 'config.php';
?>
<table>
        <thead class="cart__row cart__header">
          <tr><th class="product-info" style="width:200px">Product</th>
          <th class="product-price">Price</th>
          <th class="product-quantity" style="width: 200px;">Quantity</th>
          <th class="total-product">Total</th>
          <th class="product-remove">Remove</th>
        </tr></thead>
        <tbody>
            <?php
            if(isset($user)){
                $cart = towquery("SELECT * FROM carts WHERE customer_id={$user['id']}");
                while($cartf = towfetch($cart)){
                    $cartv[] = ['pro_id'=>$cartf['pro_id'],'qty'=>$cartf['qty']];
                }
                $cartdata = json_encode($cartv);
            }elseif(isset($_COOKIE['cart'])){
                $cartdata = $_COOKIE['cart'];
            }
            if(isset($cartdata) and !empty($cartdata)){
            $cartdata = json_decode($cartdata,true);
            $total = count($cartdata);
            foreach($cartdata as $cada){
                $pro = towquery("SELECT product.*,product_attributes.mrp,product_attributes.price,product_attributes.size_id,categories.categories as cat_name FROM `product` INNER JOIN product_attributes ON product_attributes.product_id=product.id INNER JOIN categories ON categories.id=product.categories_id WHERE product.id={$cada['pro_id']}");
                $prof =towfetch($pro);
            ?>
            <tr class="cart__row border-bottom line1 cart-flex border-top">
              <td class="cart__meta  cart-flex-item">
                <div class="list-view-item__title">
                  <a href="/products/the-few-neckless-1?variant=32674185576532">
                    <?=$prof['name']?>
                  </a>
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
                  <div class="dec button qtyminus">-</div>
                    <input class="cart__qty-input quantity update-cart" name="updates[]" id="updates_32674185576532:2d28a6382b9fac92e4792029d065476c" value="1" min="0">
                  <div class="inc button qtyplus">+</div> 
                </div>
              </td>
              <td class=" small--hide total-product">
                

                <div>
                  $24.00
                </div>

                
              </td>
              <td class="product_remove">
                <a href="/cart/change?line=1&amp;quantity=0" class="cart__remove" aria-label="Remove this item"><!-- Remove --><i class="fa fa-trash-o" aria-hidden="true"></i></a>
              </td>
            </tr>
            <?php }}else{
                
            } ?>
        </tbody>
      </table>
      <span style="display:none;" id="total_cart"><?=$total?></span>