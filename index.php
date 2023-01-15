<?php include 'head.php'; $in=1; ?>
<style>
    .p-50{
        padding:50px 0;
    }
    .list-Aboutus-info{
        
        margin-bottom:25px;
    }
    .btn .icon-arrow-left, .btn .icon-arrow-right{
        transform:rotateY(180deg);
    }
    .Aboutus-information .about-btn{
        margin-bottom:20px;
    }
   .list-Aboutus-info.showContent p{
       height:auto;
   }
   .list-Aboutus-info.showContent p.readmore-btn{
       background:#000;
   }
   .moreText{
       display:none;
   }
   .text.show-more .moreText{
       display:inline;
   }
   .text.show-more .dots{
       display:none;
   }
   .read-more-btn{
       float:right;
       text-decoration:underline;
   }
   .titleP{
       font-family: Bookman Old Style; 
       font-size:26px;
   }
   .read-more-btn {
    float: unset;
    text-decoration: underline;
    }
    .pc-hide{
        display:none;
    }
    .mv-hide{
        display:block;
    }
    @media only screen and (max-width: 600px){
    .mv-hide{
        display:none;
    }
    .pc-hide{
        display:block;
    }
    .home-title{
        font-size:14px!important;
    }
    .titledesktop{display:none;}
    }
    #sideoffer{display:none;}
</style>
<div class="page-container" id="PageContainer">
  <main class="main-content" id="MainContent" role="main">
<div class="shopify-section ishi-slider-section index-section">
    <div class="ishislider">
        <div class="slideshow-block">
            <div id="ishislideshow-carousel" class="ishislideshow-carousel-1523944992312 owl-carousel owl-theme logo-bar">
                <?php $ban = towquery("SELECT * FROM `banner` WHERE show_in='home_top' ORDER BY order_no ASC");
                while($banf = towfetch($ban)){ ?>
                <div class="slideshow__item" >
        			<a href="<?=$banf['btn_link']?>" class="slideshow__link">
                        <img src="upload/<?=$banf['image']?>" alt="" class="logo-bar__image" />
                    </a>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>
    <script>
  jQuery(document).ready(function() {
     $('.ishislideshow-carousel-1523944992312').owlCarousel({
        nav: true,
        loop: true,
        autoplay:true,
        animateOut: 'fadeOut',
        autoplayTimeout:4000,
        navText: [
          '<i class=\'material-icons\'></i>',
          '<i class=\'material-icons\'></i>'
        ],
        items: 1,
        itemsDesktop: false,
        itemsDesktopSmall: false,
        itemsTablet: false,
        itemsMobile: false
    });
  });
</script>
</div>
<div class="container section-header text-center" style="margin-bottom:20px;">
    <p class="home-title">“Explore the love of Indian handicraft”</p>
    <p style="border-bottom:1px solid #000;padding-bottom:15px;">
        give your space a touch of Indian handicraft, Artdarshan brings to you the best of India's Artwork from every corner of India that will enhance the beauty of your space and will keep you connected with your tradition.
    </p>
</div>
<div class="shopify-section index-section ishi-banner-section">
    <div id="ishibannerblock" class="clearfix">
        <div class="ishiproduct-block page-width">
<div class="tab-content">
            <div class="row tab_content tab-pane active">
              <div class="owl-carousel owl-theme grid grid--uniform grid--view-items products-display productblock1-at">
<?php
$cat = towquery("SELECT * FROM categories");
while($catf = towfetch($cat)){
?>
<div class="item grid__item grid__item--1577101384762 ">
<div class="row p-50">
            <div class="Aboutus-information">
                <div class="Aboutus-banner col-lg-6 col-md-12">
                    <p class="titleP titlemobile"><?=$catf['categories']?></p>
                    <img src="/upload/<?=$catf['cat_img']?>" data-sizes="auto">
                </div>
                <div class="information-container col-lg-6 col-md-12">
                    <div class="title-container text-left text-center" style="margin-bottom:0;">
                        <p class="titleP titledesktop"><?=$catf['categories']?></p>
                    </div>
                    <div class="list-Aboutus-info ">
                        <p class="text"><?=$catf['cat_desc']?>
                        </p>
                    </div>
                    <div class="row">
<?php
$pro = towquery("SELECT product.*,product_attributes.mrp,product_attributes.price,product_attributes.size_id FROM `product` INNER JOIN product_attributes ON product_attributes.product_id=product.id WHERE best_seller=1 AND categories_id={$catf['id']} ORDER BY id DESC LIMIT 2");
        while($prof = towfetch($pro)){
?>
                        <div class="col-md-6">
                            <div class="grid-view-item">
  <div class="grid-view-item__link grid-view-item__image-container">
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
        <a href="product.php">
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
</div>
                        </div>
<?php } ?>
                    </div>
                    <br><br>
                    <div class="about-btn">
                        <a href="category.php?id=<?=$catf['id']?>" class="btn">
                            Explore collection
                            <svg aria-hidden="true" focusable="false" role="presentation" class="icon icon--wide icon-arrow-right" viewBox="0 0 20 8"><path d="M4.814 7.555C3.95 6.61 3.2 5.893 2.568 5.4 1.937 4.91 1.341 4.544.781 4.303v-.44a9.933 9.933 0 0 0 1.875-1.196c.606-.485 1.328-1.196 2.168-2.134h.752c-.612 1.309-1.253 2.315-1.924 3.018H19.23v.986H3.652c.495.632.84 1.1 1.036 1.406.195.306.485.843.869 1.612h-.743z" fill-rule="evenodd" style="fill:#fff;"></path></svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
                  </div>
<?php } ?>
              </div>
            </div>
</div>
</div>
</div>
</div>
<script>
  jQuery(document).ready(function() {
      $(".productblock1-at").owlCarousel({
            nav: true, // Show next and prev buttons
            navText: [
              '<i class=\'material-icons\'></i>',
              '<i class=\'material-icons\'></i>'
            ],
            dots: false,
            rewind: true,
            loop: false,
            responsive: {
              0: {
                items: 1
              },
              544: {
                items: 1
              },
              768: {
                items: 1
              },
              992: {
                items: 1
              },
              1200: {
                items: 1
              }
            }
          });
  });
</script>




<div class="shopify-section index-section ishi-banner-section">
  <div id="ishibannerblock" class="clearfix">
    <div class="ishiproduct-block page-width">
        <div class="row p-50">
            <div class="Aboutus-information">
                <div class="Aboutus-banner col-lg-12 col-md-12">
                    <?php $ban = towquery("SELECT * FROM `banner` WHERE show_in='home_section' AND order_no=1");
                while($banf = towfetch($ban)){ ?>
                <!--<div class="slideshow__item" >-->
        			<a href="<?=$banf['btn_link']?>" class="slideshow__link">
                        <img src="upload/<?=$banf['image']?>" alt="" class="logo-bar__image" />
                    </a>
                <!--</div>-->
                <?php } ?>
                    <!--<img src="art/5.png" data-sizes="auto">-->
                </div>
            </div>
        </div>
    </div>
  </div>
</div>










<div class="shopify-section index-section product-block">
    <div class="ishiproduct-block page-width">
    
      <div class="section-header text-center" >
        <p class="" style="border-bottom:1px solid #000;font-size:20px;">EXCLUSIVE COLLECTION</p>
      </div>
      <div class="section-header text-center">
        <p style="margin-top:5px;">"Explore Exquisite Works By Master Craftpersons"</p>
      </div>
      <div id="ishiproduct-block-carousel" class="logo-bar">
        <div class="logo-bar__item" >
          <ul id="products-tab" class="nav nav-tabs products-tab clearfix">
            
          </ul>
        </div>
        
        <div class="tab-content">
            <div class="row tab_content tab-pane active">
              <div class="owl-carousel owl-theme grid grid--uniform grid--view-items products-display productblock1-1577101364349">
<?php
$pro = towquery("SELECT product.*,product_attributes.mrp,product_attributes.price,product_attributes.size_id FROM `product` INNER JOIN product_attributes ON product_attributes.product_id=product.id WHERE best_seller=2");
        while($prof = towfetch($pro)){ ?>
<div class="item grid__item grid__item--1577101384762 ">
<div class="grid-view-item">
  <div class="grid-view-item__link grid-view-item__image-container">
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
        <a href="product.php">
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
</div>
                  </div>
<?php } ?>
              </div>
            </div>
        </div>
      </div>
</div>
<script>
  jQuery(document).ready(function() {
      $(".productblock1-1577101364349").owlCarousel({
            nav: true, // Show next and prev buttons
            navText: [
              '<i class=\'material-icons\'></i>',
              '<i class=\'material-icons\'></i>'
            ],
            dots: false,
            rewind: true,
            loop: false,
            responsive: {
              0: {
                items: 1
              },
              544: {
                items: 1
              },
              768: {
                items: 1
              },
              992: {
                items: 2
              },
              1200: {
                items: 4
              }
            }
          });
  });
</script>
</div>

<div class="shopify-section index-section ishi-banner-section">
    <div id="ishibannerblock" class="clearfix">
        <div class="ishiproduct-block page-width">
            <div style="display: flex;">
                <div class="col-6"><div class="shopify-section index-section ishi-banner-section">
              <div id="ishibannerblock" class="clearfix">
                <div class="ishiproduct-block page-width">
                    <div class="row p-50">
                        <div class="Aboutus-information">
                            <div class="Aboutus-banner col-lg-12 col-md-12">
                                <?php $ban = towquery("SELECT * FROM `banner` WHERE show_in='home_section' AND order_no=2");
                            while($banf = towfetch($ban)){ ?>
                            <!--<div class="slideshow__item" >-->
                    			<a href="<?=$banf['btn_link']?>" class="slideshow__link">
                                    <img src="upload/<?=$banf['image']?>" alt="" class="logo-bar__image" />
                                </a>
                            <!--</div>-->
                            <?php } ?>
                                <!--<img src="art/5.png" data-sizes="auto">-->
                            </div>
                        </div>
                    </div>
                </div>
              </div>
            </div></div>
                <div class="col-6"><div class="shopify-section index-section ishi-banner-section">
              <div id="ishibannerblock" class="clearfix">
                <div class="ishiproduct-block page-width">
                    <div class="row p-50">
                        <div class="Aboutus-information">
                            <div class="Aboutus-banner col-lg-12 col-md-12">
                                <?php $ban = towquery("SELECT * FROM `banner` WHERE show_in='home_section' AND order_no=3");
                            while($banf = towfetch($ban)){ ?>
                            <!--<div class="slideshow__item" >-->
                    			<a href="<?=$banf['btn_link']?>" class="slideshow__link">
                                    <img src="upload/<?=$banf['image']?>" alt="" class="logo-bar__image" />
                                </a>
                            <!--</div>-->
                            <?php } ?>
                                <!--<img src="art/5.png" data-sizes="auto">-->
                            </div>
                        </div>
                    </div>
                </div>
              </div>
            </div></div>
            </div>
        </div>
    </div>
</div>






<div class="shopify-section ishi_instafeed"><div class="ishiinstagram " style="margin-right: -0px; margin-left: -0px;">
    
      <div class="home-title text-center">
      <a href="https://www.instagram.com/instagram" target="_blank" rel="nofollow">
          FOLLOW US
          <span>@instagram</span>
      </a>
    </div>
    <div id="instafeed" class="instafeed owl-carousel"></div>
</div>
<!--<script src="js/instafeed.min.js"></script>-->
</main>
<?php include 'foot.php' ?>