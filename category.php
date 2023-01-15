<?php include 'head.php';
if(isset($_GET['id'])){
    $id = towreal($_GET['id']);
}else{
    print_r("<script>window.location.replace('/shop.php');</script>");
}
?>    
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
<?php $pro = towquery("SELECT product.*,product_attributes.mrp,product_attributes.price,product_attributes.size_id FROM `product` INNER JOIN product_attributes ON product_attributes.product_id=product.id WHERE best_seller=3 AND categories_id=$id");
        while($prof = towfetch($pro)){
            ?>
<div class="grid__item grid__item--Ishi_sidebar">
        <div class="grid-view-item">
  <div class="grid-view-item__link grid-view-item__image-container">
<div class="grid-view-item__image-wrapper js">
        <a href="product.php?id=<?=$prof['id']?>">
          <div class="image-inner">
            <div class="reveal">
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
    <?php $pro = towquery("SELECT product.*,product_attributes.mrp,product_attributes.price,product_attributes.size_id FROM `product` INNER JOIN product_attributes ON product_attributes.product_id=product.id WHERE best_seller=1 AND categories_id=$id");
        while($prof = towfetch($pro)){
            ?>
    <div class="grid__item grid__item--Ishi_sidebar">
        <div class="grid-view-item">
  <div class="grid-view-item__link grid-view-item__image-container">
<div class="grid-view-item__image-wrapper js">
        <a href="product.php?id=<?=$prof['id']?>">
          <div class="image-inner">
            <div class="reveal">
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
  <div class="row" id="Collection">
<?php
        
            $pro = towquery("SELECT product.*,product_attributes.mrp,product_attributes.price,product_attributes.size_id FROM `product` INNER JOIN product_attributes ON product_attributes.product_id=product.id WHERE best_seller=2  AND categories_id=$id");
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
        
        <div class="thumbnail-buttons">
          <div class="quick-view">
            <button class="btn" data-toggle="modal">
	<svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
      	<symbol id="quickview" viewBox="0 0 900 900"><title>quickview</title>
	      	<path d="M505.918,236.117c-26.651-43.587-62.485-78.609-107.497-105.065c-45.015-26.457-92.549-39.687-142.608-39.687
			c-50.059,0-97.595,13.225-142.61,39.687C68.187,157.508,32.355,192.53,5.708,236.117C1.903,242.778,0,249.345,0,255.818
			c0,6.473,1.903,13.04,5.708,19.699c26.647,43.589,62.479,78.614,107.495,105.064c45.015,26.46,92.551,39.68,142.61,39.68
			c50.06,0,97.594-13.176,142.608-39.536c45.012-26.361,80.852-61.432,107.497-105.208c3.806-6.659,5.708-13.223,5.708-19.699
			C511.626,249.345,509.724,242.778,505.918,236.117z M194.568,158.03c17.034-17.034,37.447-25.554,61.242-25.554
			c3.805,0,7.043,1.336,9.709,3.999c2.662,2.664,4,5.901,4,9.707c0,3.809-1.338,7.044-3.994,9.704
			c-2.662,2.667-5.902,3.999-9.708,3.999c-16.368,0-30.362,5.808-41.971,17.416c-11.613,11.615-17.416,25.603-17.416,41.971
			c0,3.811-1.336,7.044-3.999,9.71c-2.667,2.668-5.901,3.999-9.707,3.999c-3.809,0-7.044-1.334-9.71-3.999
			c-2.667-2.666-3.999-5.903-3.999-9.71C169.015,195.482,177.535,175.065,194.568,158.03z M379.867,349.04
			c-38.164,23.12-79.514,34.687-124.054,34.687c-44.539,0-85.889-11.56-124.051-34.687s-69.901-54.2-95.215-93.222
			c28.931-44.921,65.19-78.518,108.777-100.783c-11.61,19.792-17.417,41.207-17.417,64.236c0,35.216,12.517,65.329,37.544,90.362
			s55.151,37.544,90.362,37.544c35.214,0,65.329-12.518,90.362-37.544s37.545-55.146,37.545-90.362
			c0-23.029-5.808-44.447-17.419-64.236c43.585,22.265,79.846,55.865,108.776,100.783C449.767,294.84,418.031,325.913,379.867,349.04
			z"/>
		</symbol>
  	</svg>
  	<svg class="icon" viewBox="0 0 30 30"><use xlink:href="#quickview" x="20%" y="20%"></use></svg>



<span> + quick View</span></button>
          </div>
          <div class="add-to-wishlist">     
<div class="show">
  <div class="default-wishbutton-good-american-diamond-erring loading"><a class="add-in-wishlist-js btn" data-href="good-american-diamond-erring">
	<svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
      	<symbol id="wishlist-outline" viewBox="0 0 1000 1000"><title>wishlist-outline</title>
	      	<path d="M511.825,170.191c-0.14-1.786-0.298-3.155-0.44-4.095C504.22,84.955,444.691,20.73,367.434,20.73
			c-44.758,0-85.66,21.18-112.442,55.516C228.835,41.679,189.491,20.73,144.97,20.73C67.976,20.73,8.584,84.52,0.937,166.557
			c-0.147,0.956-0.295,2.12-0.43,3.489C-0.8,183.3,0.287,200.862,5.338,222.26c10.732,45.463,35.828,86.871,71.224,118.958
			l164.828,144.92c8.028,7.059,20.042,7.085,28.101,0.062l166.037-144.683c39.134-40.728,62.393-77.366,71.616-119.584
			C511.771,200.731,512.848,183.284,511.825,170.191z M465.46,212.833c-7.254,33.204-26.552,63.603-59.352,97.843L255.545,441.771
			l-150.569-132.38c-28.881-26.184-49.406-60.051-58.113-96.933c-3.953-16.747-4.747-29.585-3.895-38.225
			c0.075-0.764,0.393-3.072,0.393-3.072C48.849,109.384,91.478,63.397,144.97,63.397c39.823,0,73.704,24.287,90.17,63.294
			c7.338,17.382,31.97,17.382,39.308,0c16.136-38.225,52.419-63.294,92.986-63.294c53.494,0,96.121,45.99,101.609,107.786
			c0.147,1.242,0.187,1.586,0.245,2.333C469.993,182.541,469.174,195.811,465.46,212.833z"/>
		</symbol>
  	</svg>
  	<svg class="icon" viewBox="0 0 30 30"><use xlink:href="#wishlist-outline" x="23%" y="23%"></use></svg>



<i class="fa fa-heart-o"></i><span class="tooltip-label">Add to wishlist</span></a></div>
 <div class="loadding-wishbutton-good-american-diamond-erring loading btn loader-btn" style="display: none; pointer-events: none"><a class="add_to_wishlist" data-href="good-american-diamond-erring"><i class="fa fa-circle-o-notch fa-spin"></i></a></div>
  <div class="added-wishbutton-good-american-diamond-erring loading" style="display: none;"><a class="added-wishlist btn add_to_wishlist" href="pages/wishlist.html">
	<svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
      	<symbol id="wishlist" viewBox="0 0 1000 1000"><title>wishlist</title>
	      	<path d="M511.489,167.372c-7.573-84.992-68.16-146.667-144.107-146.667c-44.395,0-85.483,20.928-112.427,55.488
			c-26.475-34.923-66.155-55.488-110.037-55.488c-75.691,0-136.171,61.312-144.043,145.856c-0.811,5.483-2.795,25.045,4.395,55.68
			C15.98,267.532,40.62,308.663,76.759,341.41l164.608,144.704c4.011,3.541,9.067,5.312,14.08,5.312
			c4.992,0,10.005-1.749,14.016-5.248L436.865,340.13c24.704-25.771,58.859-66.048,70.251-118.251
			C514.391,188.514,511.66,168.268,511.489,167.372z"/>
		</symbol>
  	</svg>
  	<svg class="icon" viewBox="0 0 30 30"><use xlink:href="#wishlist" x="23%" y="23%"></use></svg>



<i class="fa fa-heart"></i><span class="tooltip-label">View Wishlist</span></a></div>
</div>
 </div>            
        </div>
        <div class="button-rewiew">
          <span class="shopify-product-reviews-badge" data-id="3585912504404"></span>
        </div>
      </div>
    
      <div class="product-description">
        <a href="product.php?id=<?=$prof['id']?>">
          <div class="product-detail prodetat">
            <div class="h4 grid-view-item__title"><?php $out = strlen($prof['name']) > 50 ? substr($prof['name'],0,50)."..." : $prof['name']; echo $out;?></div>            
          </div> 
        </a>

        <div class="product-desc">  </div>
        
        <div class="grid-view-item__meta">

    <span class="visually-hidden">Regular Price</span>
    <span class="qv-discountprice regular"  style="text-decoration: line-through;">₹ <?=$prof['mrp']?></span>

    <span class="product-price__price product-price__sale">
       <span class="qv-regularprice is-bold">₹ <?=$prof['price']?></span>
    </span>
  </div>
  <div class="product-block-hover grid-hover">
          <div class="qv-cartmain add_to_cart_main grid-cart hide">
            <form action="" method="post" class="add-to-cart product-form product-form-collection-template" data-section="collection-template">
              <div class="product-selector">
                <div class="ishi-quickview-swatch">
                  <div class="ishi-custom-swatch">
                    <label>Size</label>
                    <div class="option-swatch" data-selector="option1">
                      <span class="custom-swatch active" data-index="0"><?=$prof['size_id']?></span>
                    </div>
                  </div>
                </div>
              </div>
              <div class="product-form__item product-form__item--quantity">
                <div class="dec button qtyminus">-</div>
                <input name="quantity" value="1" class="quantity">
                <div class="inc button qtyplus">+</div> 
              </div>
              <div class="product-form__item product-form__item--submit">
                
                  <a href="javascript: void(0)" class="qv-addToCart addToCart enable btn">
                    <span class="value instock">
                      Add To Cart
                    </span>
                    <span class="adding">
                     adding...
                   </span>
                  </a>
              </div>
              <input type="hidden" name="return_to" value="back" />
            </form>
          </div>
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