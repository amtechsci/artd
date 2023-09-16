<?php include 'head.php';
if(!isset($_GET['id'])){
    print_r("<script>window.location.replace('/shop.php');</script>");
}
$id = towreal($_GET['id']);
$spro = towquery("SELECT product.*,product_attributes.mrp,product_attributes.price,product_attributes.size_id,categories.categories as cat_name,categories.id as cat_id FROM `product` INNER JOIN product_attributes ON product_attributes.product_id=product.id INNER JOIN categories ON categories.id=product.categories_id WHERE product.id=$id");
$sprof = towfetch($spro);
?>
<style>
    .owl-carousel {display:block;}
</style>
<div class="breadcrumb-container" style="background#e9e8eb;">
    <nav class="breadcrumbs page-width breadcrumbs-empty">
       <a href="/" title="Back to the frontpage">Home</a>
        <span class="divider">&dash;</span> 
            <a href="#" title=""><?=$sprof['cat_name']?></a>
    </nav>
</div>
<div class="page-container" id="PageContainer">
    <main class="main-content" id="MainContent" role="main">
        <div class="page-width collection_templete">
            <div class="row">
            <div class="normal_main_content page-width">
<div id="shopify-section-product-template" class="shopify-section">
    <div class="product-template__container" itemscope itemtype="http://schema.org/Product" id="ProductSection-product-template" data-section-id="product-template" data-section-type="product" data-enable-history-state="true">
  <meta itemprop="name" content="Artdarshan">
  <meta itemprop="url" content="product.php?id=<?=$sprof['id']?>">
  <meta itemprop="image" content="/upload/<?=$sprof['image']?>">

<div class="row product-single">

    <div class="col-sm-6 product-single__photos product-single-left">
    <div class="single-left">
        <section class="content">
      <article class="demo-area">
      <img class="demo-trigger" src="/upload/<?=$sprof['image']?>" data-zoom="/upload/<?=$sprof['image']?>">
      
      </article>
    </section>
</div>
    <div class="single-left" style="padding-left: 20px;">
        <img src="/upload/<?=$sprof['image']?>" style="width:100px;margin:5px;border:solid #000 1px;" onclick="var m = document.getElementsByClassName('demo-trigger')[0]; m.setAttribute('src','/upload/<?=$sprof['image']?>');m.setAttribute('data-zoom','/upload/<?=$sprof['image']?>')">
        <?php $if = 1; $allimg = towquery("SELECT * FROM `product_images` WHERE product_id='{$sprof['id']}'");
        while($ab = towfetch($allimg)){ ?>
      <img src="/upload/<?=$ab['product_images']?>" style="width:100px;margin:5px;border:solid #000 1px;" onclick="var m = document.getElementsByClassName('demo-trigger')[0]; m.setAttribute('src','/upload/<?=$ab['product_images']?>');m.setAttribute('data-zoom','/upload/<?=$ab['product_images']?>')">
      <?php if($if > 1){break;} $if++;} ?>
</div>
</div>

    <div class="col-sm-6 product-single-right">
        <div class="detail">
       <section>
           
      <div class="product-single__meta">

        <h1 itemprop="name" class="product-single__title hidden-sm-down"><?=$sprof['name']?></h1>

          <div class="review">
            <span class="shopify-product-reviews-badge" data-id="3585912602708"></span>
            
            <a href="javascript:void(0);" class="write_comment">Write Review<i class="material-icons comments" aria-hidden="true"></i></a>
          </div>

          <div class="price-product">
            <div class="product-single__price product-single__price-product-template">
              
                  <span class="product-price__price product-price__sale">
                    <s class="product-price__price is-bold" id="ProductPrice-product-template">₹ <?=$sprof['price']?></s> 
                  </span>
                  <span class="product-price__price product-price__price-product-template product-price__sale product-price__sale--single">
                    <s id="ComparePrice-product-template"
                      itemprop="price" class="regular-price">
                      ₹ <?=$sprof['mrp']?>
                    </s>
                  </span>
            </div>
            <br>
              <?php $sc = towquery("SELECT * FROM `sub_categories` WHERE id='{$sprof['sub_categories_id']}'");
              if(townum($sc) > 0){
                echo towfetch($sc)['sub_categories'];
                }?>
          </div>
            <p itemprop="brand" class="product-single__vendor">Product Type : <span>Painting</span></p>
            <p itemprop="brand" class="product-single__vendor">dimension : <span class="btn" style="background: #000;color: #fff;"><?=$sprof['size_id']?></span></p>
            <br>
        <div itemprop="offers" itemscope itemtype="http://schema.org/Offer" class="product-selection-bottom">
          <div class="product-selection">
                  <a onclick="add_to_cart(this,'<?=$sprof['id']?>')" class="qv-addToCart addToCart enable btn" >
                    <span class="add_to_cart">
                      Add To Cart
                    </span>
                    <span class="adding">
                     adding...
                   </span>
                  </a>
                  <a href="buynow.php?id=<?=$sprof['id']?>" class="btn">
                    <span>
                      Buy Now
                    </span>
                  </a>
          </div>
        </div>
          </div>
        </section>
      </div>
        

        
      </div>
    </div>
  </div>
</div>


<div class="page-width product-tab">
  <ul class="tabs nav-tabs tab-id" role="tablist">
    
      <li class="tab-item"><a class="nav-link" data-toggle="tab" role="tab" href="#desc"><span>Description</span></a></li>
    
    
      <li class="tab-item"><a class="nav-link" data-toggle="tab" role="tab" href="#product-review"><span>Reviews</span></a></li>
    
    
      <li class="tab-item"> <a class="nav-link" data-toggle="tab" role="tab" href="#shipping"><span>Shipping &amp; Returns</span></a> </li>
    
  </ul>
  <div class="tab-content" id="tab-content">
    
      <div id="desc" class="tab-pane fade in active" role="tabpanel">
         <p>
             <?=$sprof['description']?>
         </p>
      </div>
    
    
      <div id="product-review" class="tab-pane fade in" role="tabpanel">
        <div id="shopify-product-reviews" data-id="3585912602708"><style scoped>.spr-container {
    padding: 24px;
    border-color: #ECECEC;}
  .spr-review, .spr-form {
    border-color: #ECECEC;
  }
</style>

<div class="spr-container">
  <div class="spr-header">
    <h2 class="spr-header-title">Customer Reviews</h2><div class="spr-summary">
        <span class="spr-summary-caption">No reviews yet</span><span class="spr-summary-actions">
        <a href='#' class='spr-summary-actions-newreview' onclick='SPR.toggleForm(3585912602708);return false'>Write a review</a>
      </span>
    </div>
  </div>

  <div class="spr-content">
    <div class='spr-form' id='form_3585912602708' style='display: none'></div>
    <div class='spr-reviews' id='reviews_3585912602708' style='display: none'></div>
  </div>

</div>
</div>
      </div>
    
    
      <div id="shipping" class="tab-pane fade in" role="tabpanel">
        <div class="policy">
            <div class="refund">
              <p class="title">Refund Policy</p>
                <div class="inner-content"><h4>Returns Policy</h4>
<p>You may return most new, unopened items within 30 days of delivery for a full refund. We'll also pay the return shipping costs if the return is a result of our error (you received an incorrect or defective item, etc.).</p>
<p>You should expect to receive your refund within four weeks of giving your package to the return shipper, however, in many cases you will receive a refund more quickly. This time period includes the transit time for us to receive your return from the shipper (5 to 10 business days), the time it takes us to process your return once we receive it (3 to 5 business days), and the time it takes your bank to process our refund request (5 to 10 business days).</p>
<p>If you need to return an item, simply login to your account, view the order using the 'Complete Orders' link under the My Account menu and click the Return Item(s) button. We'll notify you via e-mail of your refund once we've received and processed the returned item.</p>
<h4>Shipping</h4>
<p>We can ship to virtually any address in the world. Note that there are restrictions on some products, and some products cannot be shipped to international destinations.</p>
<p>When you place an order, we will estimate shipping and delivery dates for you based on the availability of your items and the shipping options you choose. Depending on the shipping provider you choose, shipping date estimates may appear on the shipping quotes page.</p>
<p>Please also note that the shipping rates for many items we sell are weight-based. The weight of any such item can be found on its detail page. To reflect the policies of the shipping companies we use, all weights will be rounded up to the next full pound.</p></div>
            </div>
            <div class="privacy">
              <p class="title">Privacy Policy</p>
                <div class="inner-content"></div>
            </div>
            <div class="termsofservice">
              <p class="title">Terms Of Service</p>
                <div class="inner-content"></div>
            </div>
        </div>
      </div>
    
  </div>
</div>


  <div class="text-center return-link-wrapper page-width">
    <a href="index.php" class="btn btn--secondary btn--has-icon-before return-link">
      <svg aria-hidden="true" focusable="false" role="presentation" class="icon icon--wide icon-arrow-left" viewBox="0 0 20 8"><path d="M4.814 7.555C3.95 6.61 3.2 5.893 2.568 5.4 1.937 4.91 1.341 4.544.781 4.303v-.44a9.933 9.933 0 0 0 1.875-1.196c.606-.485 1.328-1.196 2.168-2.134h.752c-.612 1.309-1.253 2.315-1.924 3.018H19.23v.986H3.652c.495.632.84 1.1 1.036 1.406.195.306.485.843.869 1.612h-.743z" fill-rule="evenodd"/></svg>
      Back to Home
    </a>
  </div>

<script>
  jQuery(document).ready(function() {
    $(".write_comment").click(function(e) { 
        $('.product-tab .nav-tabs a[href="#product-review"]').trigger('click');
        $('html, body').animate({scrollTop: $("#product-review").offset().top}, 2000);
    });
  });
</script>
</div>
<div id="shopify-section-Ishi_relatedproductsblock" class="shopify-section">
<div class="product-template__container" itemscope itemtype="http://schema.org/Product" id="ProductSection-Ishi_relatedproductsblock" data-section-id="Ishi_relatedproductsblock" data-section-type="product" data-enable-history-state="true">
  <aside class="grid row">
    <div class="related">
      
      <header class="section-header">
        <h2 class="section-header__title home-title">related products</h2>
      </header>
      
      
   
<?php
$pro = towquery("SELECT product.*,product_attributes.mrp,product_attributes.price,product_attributes.size_id FROM `product` INNER JOIN product_attributes ON product_attributes.product_id=product.id WHERE categories_id={$sprof['cat_id']} ORDER BY id DESC");
$i=1;
        while($prof = towfetch($pro)){
?>
<div class="col-12 col-md-3">
    <div class="grid-view-item__image-wrapper js">
        <a href="product.php?id=<?=$prof['id']?>">
          <div class="image-inner">
            <div class="reveal">
              <img 
               class="grid-view-item__image lazyload  main-img "
               src="/upload/<?=$prof['image']?>"
               alt="Artdarshan">
               <?php $eximg = towquery("SELECT * FROM `product_images` WHERE product_id='{$prof['id']}'");
               if(townum($eximg) > 0){
                     $eximgf = towfetch($eximg)['product_images'];
               }else{
                   $eximgf = $prof['image'];
               }
               ?>
               <img class="extra-img" src="/upload/<?=$eximgf?>" alt="Artdarshan" />
            </div>
          </div>
        </a>
      </div>
      <div class="product-description">
        <a href="product.php?id=<?=$prof['id']?>">
          <div class="product-detail">
            <div class="h4 grid-view-item__title"><?php $out = strlen($prof['name']) > 20 ? substr($prof['name'],0,20)."..." : $prof['name']; echo $out;?></div> <?=$prof['size_id'];?>           
          </div> 
        </a>

        <div class="product-block">
          <div class="nm-cartmain add_to_cart_main grid-cart">
              <div class="product-form__item product-form__item--submit">
                <b onclick="add_to_cart(this,'<?=$prof['id']?>')" class="addToCart enable btn">
                    <span class="value instock add_to_cart add_to_cart_<?=$prof['id']?>">
                  <span class="value">
                       ADD TO CART
                  </span>
                  </span>
                  <span class="adding adding<?=$prof['id']?>">
                     adding...
                   </span>
                </b>
              </div>
          </div>
        </div>
      </div>
  </div>
<?php  if($i == 6){break;} $i++;} ?>
<?php
// $pro = towquery("SELECT product.*,product_attributes.mrp,product_attributes.price,product_attributes.size_id FROM `product` INNER JOIN product_attributes ON product_attributes.product_id=product.id WHERE categories_id={$sprof['cat_id']} ORDER BY id DESC");
        while($prof = towfetch($pro)){
?>
<div class="col-12 col-md-3">
    <div class="grid-view-item__image-wrapper js">
        <a href="product.php?id=<?=$prof['id']?>">
          <div class="image-inner">
            <div class="reveal">
              <img 
               class="grid-view-item__image lazyload  main-img "
               src="/upload/<?=$prof['image']?>"
               alt="Artdarshan">
               <?php $eximg = towquery("SELECT * FROM `product_images` WHERE product_id='{$prof['id']}'");
               if(townum($eximg) > 0){
                     $eximgf = towfetch($eximg)['product_images'];
               }else{
                   $eximgf = $prof['image'];
               }
               ?>
               <img class="extra-img" src="/upload/<?=$eximgf?>" alt="Artdarshan" />
            </div>
          </div>
        </a>
      </div>
      <div class="product-description">
        <a href="product.php?id=<?=$prof['id']?>">
          <div class="product-detail">
            <div class="h4 grid-view-item__title"><?php $out = strlen($prof['name']) > 20 ? substr($prof['name'],0,20)."..." : $prof['name']; echo $out;?></div> <?=$prof['size_id'];?>           
          </div> 
        </a>

        <div class="product-block">
          <div class="nm-cartmain add_to_cart_main grid-cart">
              <div class="product-form__item product-form__item--submit">
                <b onclick="add_to_cart(this,'<?=$prof['id']?>')" class="addToCart enable btn">
                    <span class="value instock add_to_cart add_to_cart_<?=$prof['id']?>">
                  <span class="value">
                       ADD TO CART
                  </span>
                  </span>
                  <span class="adding adding<?=$prof['id']?>">
                     adding...
                   </span>
                </b>
              </div>
          </div>
        </div>
      </div>
  </div>
<?php } ?>
    </div>
  </aside>
</div>
<script>
  jQuery(document).ready(function() {
      jQuery(".related .owl-carousel").owlCarousel({
        nav: true, // Show next and prev buttons
        navText: ["<i class='material-icons'></i>","<i class='material-icons'></i>"],
        dots: false,
        autoplay:true,
        rewind:true,
        loop: true,
        responsive: {
              0: {
                items: 2
              },
              544: {
                items: 2
              },
              768: {
                items: 2
              },
              992: {
                items: 3
              },
              1200: {
                items: 4
              }
            }
      });
  });
</script>
</div>
</div>
</div>
</div>
</main>
<?php  include 'foot.php' ?>
<script src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/164071/Drift.min.js"></script>
  <script>
    var demoTrigger = document.querySelector('.demo-trigger');
var paneContainer = document.querySelector('.detail');

new Drift(demoTrigger, {
  paneContainer: paneContainer,
  inlinePane: false,
});
  </script>