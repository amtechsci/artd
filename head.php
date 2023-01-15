<?php
include 'config.php';
if (isset($_SESSION['user'])) {
        $user = $_SESSION['user'];
        $uf = towquery("SELECT * FROM users WHERE md5(`mobile`)='$user'");
        $user = towfetch($uf);
}elseif (isset($_COOKIE['user'])) {
        $user = $_COOKIE['user'];
        $uf = towquery("SELECT * FROM users WHERE md5(`mobile`)='$user'");
        $user = towfetch($uf);
}
?><!doctype html>
  <html lang="en"> 
<head>
    <meta http-equiv="content-type" content="text/html;charset=utf-8" />
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="theme-color" content="#7796a8">
    <meta name="format-detection" content="telephone=no">
    <link rel="canonical" href="/index.php">
    <script src="js/vendor56af.js"></script>
    <link rel="shortcut icon" href="https://artdarshan.com/art/logo.png" type="image/png">
    <title>ArtDarshan</title>
    <meta name="description" content="Artdarshan is a platform where you can find the best collection of Madhubani paintings, Gond paintings and etc. We at artdarshan, provide you a large variety of handmade paintings"/>
    <meta property="og:site_name" content="Artdarshan">
    <meta property="og:url" content="https://artdarshan.com/">
    <meta property="og:title" content="Artdarshan">
    <meta property="og:type" content="website">
    <meta property="og:description" content="Artdarshan is a platform where you can find the best collection of Madhubani paintings, Gond paintings and etc. We at artdarshan, provide you a large variety of handmade paintings">
    <meta name="twitter:site" content="@/">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Artdarshan">
    <meta name="twitter:description" content="Artdarshan is a platform where you can find the best collection of Madhubani paintings, Gond paintings and etc. We at artdarshan, provide you a large variety of handmade paintings">
    <link href="css/includes2bd4.css?v=4603401007422047134" rel="stylesheet" type="text/css" media="all" />
    <link href="css/theme.scss4da7.css?v=5614212549319848099" rel="stylesheet" type="text/css" media="all" />
    <link href="css/custom.scss839e.css?v=11142550467191599276" rel="stylesheet" type="text/css" media="all" />
    <link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
    <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css" media="all" />
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800" rel="stylesheet" type="text/css" media="all">
    <link href="https://fonts.googleapis.com/css?family=Dancing%20Script:300,400,500,600,700,800" rel="stylesheet" type="text/css" media="all">
    <link href="drift-basic.css" rel="stylesheet" type="text/css" media="all">
    <script>
        function toggleNav() {
        var list = document.querySelector(".nav-bar-list");
        list.classList.toggle("active");
        }
        $(document).ready(function() {
          $('img').each(function(){
              var attr = $(this).attr('alt');
            if (typeof attr == typeof undefined || attr == false) {
            var $img = $(this);
            var filename = $img.attr('src')
            $img.attr('alt', filename.substring(0, filename.lastIndexOf('.')));
            }
          });
          $('a').each(function(){
              var attr = $(this).attr('aria-label');
            if (typeof attr == typeof undefined || attr == false) {
            var $imga = $(this);
            $imga.attr('aria-label', 'Artdarshan');
            }
          });
        });
    </script>
</head>
<body class="template-index ">
    
  <div class="whole-content">
      <div id="spin-wrapper"></div>
      <div id="siteloader">
        <div class="loader ishi-round-flip"></div>
      </div>
      <div class="header-nav">
        <div id="shopify-section-header-top" class="shopify-section">
    <div id="header" data-section-id="header-top" data-section-type="header-section">
      <header class="site-header" role="banner">
          <div class="nav-header" id="nav-head">
            <div class="page-width">
              <div class="row">
                <div id="ishiheaderemailblock" class="col-xs-12 col-sm-4 col-md-4 hide-sm">
                    <div class="email">
                      <i class="fa fa-envelope" aria-hidden="true"></i>
                      <div class="email-text">
                        <a href="mailto:Info@artdarshan.com">
                          info@artdarshan.com
                        </a>
                      </div>
                    </div>
                </div>
                <div class="header-block col-xs-12 col-sm-4 col-md-4">
                    <div class="header-text">Festival Sale upto <span>50%</span> Off</div>
                </div>
                <div class="desktop-user-info col-xs-12 col-sm-4 col-md-4 hide-sm">
                  <div class="desktop-checkout"> 
                    <ul>
                        <li><a class="checkout" href="cart.php">Checkout</a></li>
                        <li><a class="contact" href="contact.php">Contact</a></li>
                    </ul>
                  </div>
                </div>
              </div>
              <span style="position: absolute; top: 5px; right: 30px; font-size: 20px; cursor:pointer;"  onclick="document.getElementById('nav-head').style.display = 'none';">x</span>
            </div>
          </div>
          <div class="header-top site-header-inner">
            <div class="page-width">
              <div class="row">
                <div class="nav-menu" style="padding: 0px;">
                  <div class="page-width">
                    <div class="header-logo-section col-md-2 hide-sm">
                      <h1 class="h2 header__logo" itemscope itemtype="">
                          <a href="index.php" itemprop="url" class="header__logo-image">
                            <img src="art/logo.png" alt="Artdarshan" itemprop="logo" style="max-width: 100%;width: 163px;">
                          </a>
                        </h1>
                     </div>
                    <div class="megamenu-header col-md-8 hidden-lg-down">
                      <div id="_desktop_top_menu" class="menu js-top-menu hidden-sm-down" role="navigation">
                        <ul class="top-menu" id="top-menu">
                          <li class="category">
                            
                            <a href="index.php" class="dropdown-item">
                              <h3 class="title">Home</h3>   
                            </a>
                          </li>
                          <li class="category">
                            
                            <a href="about-us.php" class="dropdown-item">
                              <h3 class="title">About</h3>
                            </a>
                          </li>
                          <li class="category">
                            
                            <a href="shop.php" class="dropdown-item">
                              <h3 class="title">Shop</h3>
                            </a>
                          </li>
                          <li class="category">
                            <span class="float-xs-right hidden-lg-up"></span>
                            <a href="contact.php" class="dropdown-item">
                              <h3 class="title">Contact Us</h3>
                            </a>
                          </li>
                        </ul>
                      </div>
                    </div>
                    <div class="header-user-selection col-md-2 hidden-lg-down">
                      <a href="/cart.php"><div id= "_desktop_cart" class="hidden-lg-down">
                        <div class="cart-display">
                          <div class="cart-title clearfix collapsed" data-target="#cart-container" data-toggle="collapse">
                            <div class="site-header__cart expand-more">
                                <span class="cart-logo hidden-lg-down">
    	                            <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">          
    		                            <symbol id="shopping-cart" viewBox="0 0 700 700">
                                      <title>shopping-cart</title>
                                      <path d="m150.355469 322.332031c-30.046875 0-54.402344 24.355469-54.402344 54.402344 0 30.042969 24.355469 54.398437 54.402344 54.398437 30.042969 0 54.398437-24.355468 54.398437-54.398437-.03125-30.03125-24.367187-54.371094-54.398437-54.402344zm0 88.800781c-19 0-34.402344-15.402343-34.402344-34.398437 0-19 15.402344-34.402344 34.402344-34.402344 18.996093 0 34.398437 15.402344 34.398437 34.402344 0 18.996094-15.402344 34.398437-34.398437 34.398437zm0 0"></path>
                                      <path d="m446.855469 94.035156h-353.101563l-7.199218-40.300781c-4.4375-24.808594-23.882813-44.214844-48.699219-48.601563l-26.101563-4.597656c-5.441406-.96875-10.632812 2.660156-11.601562 8.097656-.964844 5.441407 2.660156 10.632813 8.101562 11.601563l26.199219 4.597656c16.53125 2.929688 29.472656 15.871094 32.402344 32.402344l35.398437 199.699219c4.179688 23.894531 24.941406 41.324218 49.199219 41.300781h210c22.0625.066406 41.546875-14.375 47.902344-35.5l47-155.800781c.871093-3.039063.320312-6.3125-1.5-8.898438-1.902344-2.503906-4.859375-3.980468-8-4zm-56.601563 162.796875c-3.773437 12.6875-15.464844 21.367188-28.699218 21.300781h-210c-14.566407.039063-27.035157-10.441406-29.5-24.800781l-24.699219-139.398437h336.097656zm0 0"></path>
                                      <path d="m360.355469 322.332031c-30.046875 0-54.402344 24.355469-54.402344 54.402344 0 30.042969 24.355469 54.398437 54.402344 54.398437 30.042969 0 54.398437-24.355468 54.398437-54.398437-.03125-30.03125-24.367187-54.371094-54.398437-54.402344zm0 88.800781c-19 0-34.402344-15.402343-34.402344-34.398437 0-19 15.402344-34.402344 34.402344-34.402344 18.996093 0 34.398437 15.402344 34.398437 34.402344 0 18.996094-15.402344 34.398437-34.398437 34.398437zm0 0"></path>
                                    </symbol> 
    		                          </svg>
    		                          <svg class="icon" viewBox="0 0 40 40">
                                    <use xlink:href="#shopping-cart" x="12%" y="16%"></use>
                                  </svg>
                                </span>
                          		  <span class="cart-logo hidden-lg-up">
    	                            <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">          
    		                            <symbol id="cart" viewBox="0 0 510 510">
                                      <title>cart</title>
                                      <path d="M306.4,313.2l-24-223.6c-0.4-3.6-3.6-6.4-7.2-6.4h-44.4V69.6c0-38.4-31.2-69.6-69.6-69.6c-38.4,0-69.6,31.2-69.6,69.6v13.6H46c-3.6,0-6.8,2.8-7.2,6.4l-24,223.6c-0.4,2,0.4,4,1.6,5.6c1.2,1.6,3.2,2.4,5.2,2.4h278c2,0,4-0.8,5.2-2.4
    				                          C306,317.2,306.8,315.2,306.4,313.2z M223.6,123.6c3.6,0,6.4,2.8,6.4,6.4c0,3.6-2.8,6.4-6.4,6.4c-3.6,0-6.4-2.8-6.4-6.4
    				                          C217.2,126.4,220,123.6,223.6,123.6z M106,69.6c0-30.4,24.8-55.2,55.2-55.2c30.4,0,55.2,24.8,55.2,55.2v13.6H106V69.6z
    				                          M98.8,123.6c3.6,0,6.4,2.8,6.4,6.4c0,3.6-2.8,6.4-6.4,6.4c-3.6,0-6.4-2.8-6.4-6.4C92.4,126.4,95.2,123.6,98.8,123.6z M30,306.4
    				                          L52.4,97.2h39.2v13.2c-8,2.8-13.6,10.4-13.6,19.2c0,11.2,9.2,20.4,20.4,20.4c11.2,0,20.4-9.2,20.4-20.4c0-8.8-5.6-16.4-13.6-19.2
    				                          V97.2h110.4v13.2c-8,2.8-13.6,10.4-13.6,19.2c0,11.2,9.2,20.4,20.4,20.4c11.2,0,20.4-9.2,20.4-20.4c0-8.8-5.6-16.4-13.6-19.2V97.2
    				                          H270l22.4,209.2H30z"></path>
                                    </symbol> 
    		                          </svg>
    		                          <svg class="icon" viewBox="0 0 40 40">
                                    <use xlink:href="#cart" x="13%" y="15%"></use>
                                  </svg>
                                </span>
                                <span class="cart-qty">0</span>
                              </span>
                            </div>
                          </div>
                        </div>
                      </div></a>
                      
                      <div id= "_desktop_user_info" class="user_info full-width hidden-lg-down ">
                        <a href="/login.php" class="userinfo-title">
                          <span class="userinfo-toggle hidden-lg-down">
    	                      <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">           
      		                    <symbol id="user-desktop" viewBox="0 0 480 480">
                                <title>user-desktop</title>
                                <path d="M187.497,152.427H73.974c-38.111,0-69.117,31.006-69.117,69.117v39.928h251.758v-39.928
                                C256.614,183.433,225.608,152.427,187.497,152.427z M241.614,246.473H19.856v-24.928c0-29.84,24.277-54.117,54.117-54.117h113.523
                                c29.84,0,54.117,24.277,54.117,54.117L241.614,246.473L241.614,246.473z"></path>
                                <path d="M130.735,145.326c40.066,0,72.663-32.597,72.663-72.663S170.802,0,130.735,0S58.072,32.596,58.072,72.663
                                S90.669,145.326,130.735,145.326z M130.735,15c31.796,0,57.663,25.867,57.663,57.663s-25.867,57.663-57.663,57.663
                                s-57.663-25.868-57.663-57.663S98.939,15,130.735,15z"></path>
                              </symbol> 
    		                    </svg>
                            <svg class="icon" viewBox="0 0 40 40">
                              <use xlink:href="#user-desktop" x="19%" y="19%"></use>
                            </svg>
                          </span>
                          <span class="userinfo-toggle hidden-lg-up">
      	                  <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">          
                    		    <symbol id="user-mobile" viewBox="0 0 480 480"><title>user-mobile</title>
                                   <path d="M187.497,152.427H73.974c-38.111,0-69.117,31.006-69.117,69.117v39.928h251.758v-39.928
                                     C256.614,183.433,225.608,152.427,187.497,152.427z M241.614,246.473H19.856v-24.928c0-29.84,24.277-54.117,54.117-54.117h113.523
                                     c29.84,0,54.117,24.277,54.117,54.117L241.614,246.473L241.614,246.473z"></path>
                                  <path d="M130.735,145.326c40.066,0,72.663-32.597,72.663-72.663S170.802,0,130.735,0S58.072,32.596,58.072,72.663
                                     S90.669,145.326,130.735,145.326z M130.735,15c31.796,0,57.663,25.867,57.663,57.663s-25.867,57.663-57.663,57.663
                                     s-57.663-25.868-57.663-57.663S98.939,15,130.735,15z"></path>
                            </symbol> 
      		                </svg>
                          <svg class="icon" viewBox="0 0 40 40">
                            <use xlink:href="#user-mobile" x="19%" y="22%"></use>
                          </svg>
                        </span>
                      </a>
                    </div>
                    <div id="_desktop_search" class="site-header__search  ">
                      <div class="search-title clearfix collapsed" data-target="#search-container-full" data-toggle="collapse">
                        <span class="search-toggle hidden-lg-down">
                            <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">   
                              <symbol id="magnifying-desktop" viewBox="0 0 1200 1200"><title>magnifying-desktop</title>
                                <path d="M606.209,578.714L448.198,423.228C489.576,378.272,515,318.817,515,253.393C514.98,113.439,399.704,0,257.493,0
                                     C115.282,0,0.006,113.439,0.006,253.393s115.276,253.393,257.487,253.393c61.445,0,117.801-21.253,162.068-56.586
                                     l158.624,156.099c7.729,7.614,20.277,7.614,28.006,0C613.938,598.686,613.938,586.328,606.209,578.714z M257.493,467.8
                                     c-120.326,0-217.869-95.993-217.869-214.407S137.167,38.986,257.493,38.986c120.327,0,217.869,95.993,217.869,214.407
                                     S377.82,467.8,257.493,467.8z"></path>
                               </symbol>
                            </svg>
                            <svg class="icon" viewBox="0 0 40 40"><use xlink:href="#magnifying-desktop" x="20%" y="22%"></use></svg>

                        </span>
                        <span class="search-toggle hidden-lg-up">
                            <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">   
                              <symbol id="magnifying-mobile" viewBox="0 0 1200 1200"><title>magnifying-mobile</title>
                                <path d="M606.209,578.714L448.198,423.228C489.576,378.272,515,318.817,515,253.393C514.98,113.439,399.704,0,257.493,0
                                     C115.282,0,0.006,113.439,0.006,253.393s115.276,253.393,257.487,253.393c61.445,0,117.801-21.253,162.068-56.586
                                     l158.624,156.099c7.729,7.614,20.277,7.614,28.006,0C613.938,598.686,613.938,586.328,606.209,578.714z M257.493,467.8
                                     c-120.326,0-217.869-95.993-217.869-214.407S137.167,38.986,257.493,38.986c120.327,0,217.869,95.993,217.869,214.407
                                     S377.82,467.8,257.493,467.8z"></path>
                               </symbol>
                            </svg>
                            <svg class="icon" viewBox="0 0 40 40"><use xlink:href="#magnifying-mobile" x="20%" y="24%"></use></svg>
                        </span>
                      </div>
                      <div  id="search-container-full" class="search-info collapse">
                          <form action="/shop.php" method="get" class="search-header search search--focus" role="search">
                            <input class="search-header__input search__input" type="search" name="q" placeholder="Search Our Catalog" aria-label="Search Our Catalog">
                            <button class="search-header__submit search__submit btn--link" type="submit">
                              <span class="search-logo"> <i class="material-icons">search</i> </span>
                              <span class="icon__fallback-text">Search</span>
                            </button>
                          </form>
                      </div>
                      </div>
                    </div>
                    
                    <div id="mobile_top_menu_wrapper" class="hidden-lg-up" style="display:none;">
                      <div id="top_menu_closer" class="hidden-lg-up">
                        <i class="material-icons"></i>
                      </div>
                      <div  id="_mobile_top_menu" class="js-top-menu mobile"></div>
                    </div>
                    <div class="mobile-menu-overlay hidden-lg-up"></div>
                  </div>
                </div>
            </div>
          </div>
          </div>
          <div class="mobile-width site-header-mobile hidden-lg-up">
            <div class="page-width">
              <div class="row">
                <div class="mobile-width-left">
                    <div id="menu-icon" class="menu-icon hidden-lg-up" onclick="toggleNav()">
                    	<svg xmlns="http://www.w3.org/2000/svg" style="display: none;">   
                    			<symbol id="setup" viewBox="0 0 750 750">
                            <title>setup</title><g> <rect y="46.06" width="344.339" height="29.52"/> </g><g> <rect y="156.506" width="344.339" height="29.52"/> </g><g> <rect y="268.748" width="344.339" height="29.531"/> </g>
                          </symbol>
                    	</svg>
                  		<svg class="icon" viewBox="0 0 40 40">
                        <use xlink:href="#setup" x="25%" y="27%"></use>
                      </svg>
                    </div>
                </div>
                <div class="header-logo-section" style="display:inline;">
                    <h1 class="h2 header__logo" style="display:inline;">
                        <a href="index.php" class="header__logo-image" style="display:inline;">
                            <img src="art/logo1.png" style="width:25%;padding:10px 0;">
                        </a>
                    </h1>
                </div>
                <div class="mobile-width-right">
                  <div id= "_mobile_cart"></div>
                  <div id= "_mobile_user_info"></div>              
                  <div id= "_mobile_search"></div>
                  <div id= "_mobile_link_menu"></div>
                </div>
              </div>
            </div>
          </div>
          <div class="nav-bar">
                          <ul class="nav-bar-list">
                            <li><a href="/">Home</a></li>
                            <li><a href="about-us.php">About</a></li>
                            <li><a href="shop.php">Shop</a></li>
                            <li><a href="contact.php">Contact</a></li>
                            <li style="position: absolute;bottom: 100px;">
                                <div style="width:100%;overflow:hidden;">
                                    <div style="width:50%;float:left;">Cart</div>
                                    <div style="width:50%;float:right;">Account</div>
                                </div>
                            </li>
                          </ul>
                        </div>
      </header>
    </div>
    </div>
  </div>