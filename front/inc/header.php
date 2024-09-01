<?php
ob_start();
session_start();
require(ROOT_DIRECTORY . '\controllers\vendor\autoload.php');
$site_identity = new SiteIdentity();
$menu = new Menu();
$mega_menu = new MegaMenu();

?>
<!DOCTYPE html>
<!--
Template: Metronic Frontend Freebie - Responsive HTML Template Based On Twitter Bootstrap 3.3.4
Version: 1.0.0
Author: KeenThemes
Website: http://www.keenthemes.com/
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Like: www.facebook.com/keenthemes
Purchase Premium Metronic Admin Theme: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
-->
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->

<!-- Head BEGIN -->

<head>
  <meta charset="utf-8">
  <title><?php echo $site_identity->site_title; ?></title>

  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

  <meta content="Metronic Shop UI description" name="description">
  <meta content="Metronic Shop UI keywords" name="keywords">
  <meta content="keenthemes" name="author">

  <meta property="og:site_name" content="-CUSTOMER VALUE-">
  <meta property="og:title" content="-CUSTOMER VALUE-">
  <meta property="og:description" content="-CUSTOMER VALUE-">
  <meta property="og:type" content="website">
  <meta property="og:image" content="-CUSTOMER VALUE-"><!-- link to image for socio -->
  <meta property="og:url" content="-CUSTOMER VALUE-">

  <link rel="shortcut icon" href="favicon.ico">

  <!-- Fonts START -->
  <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700|PT+Sans+Narrow|Source+Sans+Pro:200,300,400,600,700,900&amp;subset=all" rel="stylesheet" type="text/css">
  <link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900&amp;subset=all" rel="stylesheet" type="text/css"><!--- fonts for slider on the index page -->
  <!-- Fonts END -->

  <!-- Global styles START -->
  <link href="<?php echo SITE_URL ?>/front/assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="<?php echo SITE_URL ?>/front/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Global styles END -->

  <!-- Page level plugin styles START -->
  <link href="<?php echo SITE_URL ?>/front/assets/pages/css/animate.css" rel="stylesheet">
  <link href="<?php echo SITE_URL ?>/front/assets/plugins/fancybox/source/jquery.fancybox.css" rel="stylesheet">
  <link href="<?php echo SITE_URL ?>/front/assets/plugins/owl.carousel/assets/owl.carousel.css" rel="stylesheet">
  <!-- Page level plugin styles END -->

  <!-- Theme styles START -->
  <link href="<?php echo SITE_URL ?>/front/assets/pages/css/components.css" rel="stylesheet">
  <link href="<?php echo SITE_URL ?>/front/assets/pages/css/slider.css" rel="stylesheet">
  <link href="<?php echo SITE_URL ?>/front/assets/pages/css/style-shop.css" rel="stylesheet" type="text/css">
  <link href="<?php echo SITE_URL ?>/front/assets/corporate/css/style.css" rel="stylesheet">
  <link href="<?php echo SITE_URL ?>/front/assets/corporate/css/style-responsive.css" rel="stylesheet">
  <link href="<?php echo SITE_URL ?>/front/assets/corporate/css/themes/red.css" rel="stylesheet" id="style-color">
  <link href="<?php echo SITE_URL ?>/front/assets/corporate/css/custom.css" rel="stylesheet">
  <link href="<?php echo SITE_URL ?>/front/assets/plugins/rateit/src/rateit.css" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="http://localhost/easyshop/front/style.css">
  <!-- Theme styles END -->
</head>
<!-- Head END -->

<!-- Body BEGIN -->

<body class="ecommerce">
  <!-- BEGIN STYLE CUSTOMIZER -->
  <div class="color-panel hidden-sm">
    <div class="color-mode-icons icon-color"></div>
    <div class="color-mode-icons icon-color-close"></div>
    <div class="color-mode">
      <p>THEME COLOR</p>
      <ul class="inline">
        <li class="color-red current color-default" data-style="red"></li>
        <li class="color-blue" data-style="blue"></li>
        <li class="color-green" data-style="green"></li>
        <li class="color-orange" data-style="orange"></li>
        <li class="color-gray" data-style="gray"></li>
        <li class="color-turquoise" data-style="turquoise"></li>
      </ul>
    </div>
  </div>
  <!-- END BEGIN STYLE CUSTOMIZER -->

  <!-- BEGIN TOP BAR -->
  <div class="pre-header">
    <div class="container">
      <div class="row">
        <!-- BEGIN TOP BAR LEFT PART -->
        <div class="col-md-6 col-sm-6 additional-shop-info">
          <ul class="list-unstyled list-inline">
            <li><i class="fa fa-phone"></i><span><?php echo $site_identity->contact_number; ?></span></li>
            <!-- BEGIN CURRENCIES -->
            <li class="shop-currencies">
              <?php foreach ($menu->currency as $curency) { ?>
                <a href="javascript:void(0);"><?php echo $curency['symbol'] ?></a>
              <?php } ?>
            </li>
            <!-- END CURRENCIES -->
            <!-- BEGIN LANGS -->
            <li class="langs-block">

              <a href="javascript:void(0);" class="current"><?php echo $menu->get_active_language(); ?> </a>
              <div class="langs-block-others-wrapper">
                <div class="langs-block-others">
                  <?php foreach ($menu->get_inactive_languages() as $lang) { ?>
                    <a href="javascript:void(0);"><?php echo $lang['name'] ?></a>
                  <?php } ?>
                </div>
              </div>
            </li>
            <!-- END LANGS -->
          </ul>
        </div>
        <!-- END TOP BAR LEFT PART -->
        <!-- BEGIN TOP BAR MENU -->
        <div class="col-md-6 col-sm-6 additional-nav top-menu">
          <ul class="list-unstyled list-inline pull-right">

            <?php
            $nav_info = new Menu();
            foreach ($nav_info->nav as $value) { ?>
              <li>
                <a href="<?php
                            echo SITE_URL . '/front/' . $value['url'];
                          
                          ?>"><?php echo $value['name'] ?></a>
              </li>
            <?php  } ?>

          </ul>
        </div>
        <!-- END TOP BAR MENU -->
      </div>
    </div>
  </div>
  <!-- END TOP BAR -->

  <!-- BEGIN HEADER -->
  <div class="header">
    <div class="container">
      <a class="site-logo" href="<?php echo $site_identity->homepage; ?>"><img src="<?php echo $site_identity->logo; ?>" alt="Metronic Shop UI"></a>

      <a href="javascript:void(0);" class="mobi-toggler"><i class="fa fa-bars"></i></a>

      <!-- BEGIN CART -->
      <div class="top-cart-block">
        <div class="top-cart-info">
          <a href="" class="top-cart-info-count top-cart-product-count"></a>
          <a href=";" class="top-cart-info-value top-cart-total-price"></a>
        </div>
        <i class="fa fa-shopping-cart"></i>

        <div class="top-cart-content-wrapper">
          <div class="top-cart-content">
            <ul id="topCartContainer" class="scroller top-cart" style="height: 250px;">

              <!-- data will be insert by js -->

            </ul>
            <div class="text-right">
                <a href="<?php echo SITE_URL ?>/front/shop-shopping-cart.php" class="btn btn-default">View Cart</a>
                <a href="<?php echo SITE_URL ?>/front/shop-checkout.php" class="btn btn-primary">Checkout</a>
            </div>
          </div>
        </div>
      </div>
      <!--END CART -->

      <!-- BEGIN NAVIGATION -->
      <div class="header-navigation">
        <ul>
          <?php foreach ($mega_menu->mega_menu as $menu) { ?>
            <li class="<?php echo $menu['class'] ?>">
              <a class="dropdown-toggle" data-toggle="dropdown" data-target="#" href="<?php echo $menu['link'] ?> ?>">
                <?php echo $menu['name'] ?>
              </a>

              <?php
              $class_name = $menu['style'];
              if ($class_name) {
                (new $class_name())->render();
              }

              ?>
            </li>
          <?php } ?>
          <!-- BEGIN TOP SEARCH -->
          <li class="menu-search">
            <span class="sep"></span>
            <i class="fa fa-search search-btn"></i>
            <div class="search-box">
              <form action="#">
                <div class="input-group">
                  <input type="text" placeholder="Search" class="form-control">
                  <span class="input-group-btn">
                    <button class="btn btn-primary" type="submit">Search</button>
                  </span>
                </div>
              </form>
            </div>
          </li>
          <!-- END TOP SEARCH -->
        </ul>
      </div>
      <!-- END NAVIGATION -->
    </div>
  </div>