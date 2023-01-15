<?php include 'head.php' ?>    
<div class="page-container" id="PageContainer">
<main class="main-content" id="MainContent" role="main">
          		<div class="page-width collection_templete">
                  <div class="row">
<div class="col-md-3 col-sm-12 col-xs-12 normal-sidebar sidebar_content">
<div id="shopify-section-Ishi_sidebar" class="shopify-section"><div data-section-id="Ishi_sidebar" data-section-type="sidebar-section">
      <div class="left-column collection-left">
        <div class="left-title clearfix hidden-lg-up" data-target="#left-colletion1-container" data-toggle="collapse">
            <span class="h3 block-heading">Featured collection</span>
            <span class="navbar-toggler collapse-icons">
              <i class="material-icons add">&#xE313;</i>
              <i class="material-icons remove">&#xE316;</i>
            </span>
        </div>
        <div id="left-colletion1-container" class="left-inner collapse in left-dropdown">
            <div class="sidebar-collection">
                <div class="section-header  hidden-lg-down">
                  <h2 class="sidebar-title">Featured collection</h2>
                </div>
<div class="grid grid--uniform grid--view-items products-display">
<?php $pro = towquery("SELECT product.*,product_attributes.mrp,product_attributes.price,product_attributes.size_id FROM `product` INNER JOIN product_attributes ON product_attributes.product_id=product.id WHERE best_seller=3");
        while($prof = towfetch($pro)){
            ?>
<div class="grid__item grid__item--Ishi_sidebar">
        <div class="grid-view-item">
  <div class="grid-view-item__link grid-view-item__image-container" style="display: flex;flex-direction: row;">
<div class="grid-view-item__image-wrapper js">
        <a href="product.php?id=<?=$prof['id']?>">
          <div class="image-inner">
            <div>
              <img 
               class="grid-view-item__image lazyload  main-img "
               src="/upload/<?=$prof['image']?>"
               alt="The pendant set simple" style="width: 85px;">
            </div>
          </div>
        </a>
      </div>
      <div class="product-description">
        <a href="product.php?id=<?=$prof['id']?>">
          <div class="product-detail">
            <div class="h4 grid-view-item__title"><?php $out = strlen($prof['name']) > 20 ? substr($prof['name'],0,20)."..." : $prof['name']; echo $out;?></div>
          </div> 
        </a>
        <div class="grid-view-item__meta">
    <span class="visually-hidden">Regular Price</span>
    <span class="qv-discountprice regular"  style="text-decoration: line-through;"><?=$prof['mrp']?></span>
    <span class="product-price__price product-price__sale">
       <span class="qv-regularprice is-bold"><?=$prof['price']?></span>
    </span>
  </div>
        <span class="shopify-product-reviews-badge" data-id="3585914142804"></span>
      </div>
  </div>
</div>
    </div>
<?php } ?>
</div>
<!--<div class="view-all">-->
<!--                  <a href="index.php" class="view-all-btn btn">-->
<!--                    View all products <i class="material-icons">navigate_next</i>-->
<!--                  </a>-->
<!--                </div>-->
            </div>
        </div>
      </div>    
    
      <div class="left-column collection-left">
        <div class="left-title clearfix hidden-lg-up" data-target="#left-collection2-container" data-toggle="collapse">
            <span class="h3 block-heading">Special collection</span>
            <span class="navbar-toggler collapse-icons">
              <i class="material-icons add">&#xE313;</i>
              <i class="material-icons remove">&#xE316;</i>
            </span>
        </div>
        <div id="left-collection2-container" class="left-inner collapse in left-dropdown">
          <div class="sidebar-collection">
          
            <div class="section-header hidden-lg-down">
              <h2 class="sidebar-title">Special collection</h2>
            </div>
          

<div class="grid grid--uniform grid--view-items products-display">
    <?php $pro = towquery("SELECT product.*,product_attributes.mrp,product_attributes.price,product_attributes.size_id FROM `product` INNER JOIN product_attributes ON product_attributes.product_id=product.id WHERE best_seller=1");
        while($prof = towfetch($pro)){
            ?>
    <div class="grid__item grid__item--Ishi_sidebar">
        <div class="grid-view-item">
  <div class="grid-view-item__link grid-view-item__image-container"  style="display: flex;flex-direction: row;">
<div class="grid-view-item__image-wrapper js">
        <a href="product.php?id=<?=$prof['id']?>">
          <div class="image-inner">
            <div>
              <img 
               class="grid-view-item__image lazyload  main-img "
               src="/upload/<?=$prof['image']?>"
               alt="The pendant set simple" style="width: 85px;">
            </div>
          </div>
        </a>
      </div>
      <div class="product-description">
        <a href="product.php?id=<?=$prof['id']?>">
          <div class="product-detail">
            <div class="h4 grid-view-item__title"><?php $out = strlen($prof['name']) > 20 ? substr($prof['name'],0,20)."..." : $prof['name']; echo $out;?></div>
          </div> 
        </a>
        <div class="grid-view-item__meta">
    <span class="visually-hidden">Regular Price</span>
    <span class="qv-discountprice regular"  style="text-decoration: line-through;"><?=$prof['mrp']?></span>
    <span class="product-price__price product-price__sale">
       <span class="qv-regularprice is-bold"><?=$prof['price']?></span>
    </span>
  </div>
        <span class="shopify-product-reviews-badge" data-id="3585914142804"></span>
      </div>
  </div>
</div>
    </div>
    <?php } ?>
      </div>
        <!--<div class="view-all">-->
        <!--  <a href="index.php" class="view-all-btn btn">-->
        <!--    View all products <i class="material-icons">navigate_next</i>-->
        <!--  </a>-->
        <!--</div>-->
    </div>
    </div>
    </div>
</div>


</div>
</div>
	
<div class="normal_main_content col-md-9">
<div id="shopify-section-collection-template" class="shopify-section">
<div data-section-id="collection-template" data-section-type="collection-template" class="collection__main">
<?php if(isset($_GET['q'])){}else{ ?>
  <header class="collection-header">
      <div class="collection-hero">
        <img class="collection-hero__image ratio-container lazyload js"
             src="art/5.png"
             data-widths="[870]"
             alt="">
        <noscript>
          <img class="collection-hero__image"
             src="art/5.png"
             data-widths="[870]"
             alt="">
        </noscript>
      </div>
    
    
 <div class="category_only_name">
    <div class="section-header collection-name">
       <div class="rte collection-description">
          <p>Artdarshan  is a community of Handicraft Artisans where we sell Cultural & Traditional art items, our all handmade product is based on their own tradition
. here you buy Art item direct from Artists Therefore you will get the actual price here of every product. Support our Artists.</p>
       </div>
    </div>
  </div>
  </header>
<?php } ?>
  <div class="row" id="Collection">
<?php
        if(isset($_GET['q'])){
            $qu = towreal($_GET['q']);
            $pro = towquery("SELECT product.*,product_attributes.mrp,product_attributes.price,product_attributes.size_id FROM `product` INNER JOIN product_attributes ON product_attributes.product_id=product.id WHERE name LIKE '%$qu%'");   
        }else{
            $pro = towquery("SELECT product.*,product_attributes.mrp,product_attributes.price,product_attributes.size_id FROM `product` INNER JOIN product_attributes ON product_attributes.product_id=product.id WHERE best_seller=2");
        } 
        if(townum($pro) > 0){ ?>
      <div class="products-display products-display-collection grid grid--uniform grid--view-items">
        <?php
        while($prof = towfetch($pro)){
        ?>
          <div class="grid__item grid__item--collection-template col-xs-6 col-sm-4 col-md-4 col-lg-4">
            
<div class="grid-view-item">
  <div class="grid-view-item__link grid-view-item__image-container">
    
    
<div class="grid-view-item__image-wrapper js">
        <a href="product.php?id=<?=$prof['id']?>">
          <div class="image-inner" style="
    display: flex;
    flex-direction: row;
    justify-content: center;
">
            <div class="reveal revealat">
              <img 
               class="grid-view-item__image lazyload  main-img "
               src="/upload/<?=$prof['image']?>" alt="<?=$prof['name']?>">
               <?php $eximg = towquery("SELECT * FROM `product_images` WHERE product_id='{$prof['id']}'");
               if(townum($eximg) > 0){
                     $eximgf = towfetch($eximg)['product_images'];
               }else{
                   $eximgf = $prof['image'];
               }
               ?>
                  <img class="extra-img" src="/upload/<?=$eximgf?>" alt="<?=$prof['name']?>" />
            </div>
            <div class="hide imgurl-for-quickview">
                <span>/upload/<?=$prof['image']?></span>
            </div>
            <div class="hide socialurl-for-quickview">
              <span>
              </span>
            </div>
          </div>
        </a>
        
          <div class="product-flags">
            <span class="flag sale">SALE</span>
          </div>
        
        <div class="button-rewiew">
          <span class="shopify-product-reviews-badge" data-id="3585912504404"></span>
        </div>
      </div>
    
      <div class="product-description">
        <a href="product.php?id=<?=$prof['id']?>">
          <div class="product-detail prodetat">
            <div class="h4 grid-view-item__title"><?php $out = strlen($prof['name']) > 50 ? substr($prof['name'],0,50)."..." : $prof['name']; echo $out;?></div><?=$prof['size_id'];?>      
          </div> 
        </a>

        <div class="product-desc">  </div>
        
        <div>

    <span class="visually-hidden">Regular Price</span>
    <span class="qv-discountprice regular"  style="text-decoration: line-through;">₹ <?=$prof['mrp']?></span>

    <span class="product-price__price product-price__sale">
       <span class="qv-regularprice is-bold">₹ <?=$prof['price']?></span>
    </span><br>
    <a onclick="add_to_cart(this,'<?=$prof['id']?>')" class="qv-addToCart addToCart enable btn" >
                    <span class="value instock add_to_cart">
                      Add To Cart
                    </span>
                    <span class="adding">
                     adding...
                   </span>
                  </a>
  </div>
      </div>
      
      <noscript>
        
        <img class="grid-view-item__image" src="art/art1.jpg" alt="Artdarshan" style="max-width: 0.0px;">
      </noscript>
    
    
  </div>
</div>
          </div>
        <?php }
        ?>
      </div>
      <?php
        }else{ ?><h2>No result found</h2>
      <?php }?>

    

    
  </div>
</div>
</div>
</div>


<div class="responsive-sidebar sidebar_content"></div>





                  </div>
          		</div>
            
        </main>
<?php include 'foot.php' ?>