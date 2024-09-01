<?php include("inc/header.php") ?>
<!-- Header END -->
<?php
$anouncement = new Anouncement();
$items = new Item();
$promo_slider = new PromoSlider();
$categoryObj = new Category();
?>
<!-- BEGIN SLIDER -->
<div class="page-slider margin-bottom-35">
  <div id="carousel-example-generic" class="carousel slide carousel-slider">
    <!-- Indicators -->
    <ol class="carousel-indicators">

      <?php if ((new SiteIdentity())->demo == true) { ?>
        <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
        <li data-target="#carousel-example-generic" data-slide-to="1"></li>
        <li data-target="#carousel-example-generic" data-slide-to="2"></li>
        <li data-target="#carousel-example-generic" data-slide-to="3"></li>

        <?php } else {
        $indicators = (new Slider())->get_sliders_item_all();
        foreach ($indicators as $index => $value) { ?>
          <li data-target="#carousel-example-generic" data-slide-to="<?php echo $index ?>" class="<?php if ($index == 0) {
                                                                                                    echo 'active';
                                                                                                  } ?>"></li>
      <?php }
      } ?>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
      <!-- First slide -->
      <?php foreach ($anouncement->items_four as $index => $value) { ?>
        <div style="background-image: url(<?php echo $value['background_img'] ?> );" class="item carousel-item-four <?php if ($index == 0) {
                                                                                                                      echo 'active';
                                                                                                                    } ?>">
          <div class="container">
            <div class="carousel-position-four text-center">
              <h2 class="margin-bottom-20 animate-delay carousel-title-v3 border-bottom-title text-uppercase" data-animation="animated fadeInDown">
                <span style="color: <?php echo $value['1st_line']['color'] ?>;"> <?php echo $value['1st_line']['text'] ?> </span> <br /> <span style="color: <?php echo $value['2nd_line']['color'] ?>" class="color-red-v2"><?php echo $value['2nd_line']['text'] ?></span><br /> <span style="color: <?php echo $value['3rd_line']['color']  ?>;"> <?php echo $value['3rd_line']['text'] ?> </span>
              </h2>
              <p class="carousel-subtitle-v2" data-animation="animated fadeInUp"><?php echo $value['subtitle_1'] ?></p>
            </div>
          </div>
        </div>
      <?php }
      ?>

      <!-- Second slide -->
      <?php foreach ($anouncement->items_five as $index => $value) { ?>
        <div style="background-image: url( <?php echo $value['background_img'] ?>)" class="item carousel-item-five <?php if ($anouncement->items_four == false && $index == 0) {
                                                                                                                      echo 'active';
                                                                                                                    } ?>">
          <div class="container">
            <div class="carousel-position-four text-center">
              <h2 style="color: <?php echo $value['1st_line']['color'] ?>;" class="animate-delay carousel-title-v4" data-animation="animated fadeInDown">
                <?php echo $value['1st_line']['text'] ?>
              </h2>
              <p class="carousel-subtitle-v2" data-animation="animated fadeInDown">
                <?php echo $value['subtitle_1'] ?>
              </p>
              <p class="carousel-subtitle-v3 margin-bottom-30" data-animation="animated fadeInUp">
                <?php echo $value['subtitle_2'] ?>
              </p>
              <a class="carousel-btn" href="<?php echo $value['url'] ?>" data-animation="animated fadeInUp"> <?php echo $value['button_text'] ?></a>
            </div>
            <img class="carousel-position-five animate-delay hidden-sm hidden-xs" src="<?php echo $value['center_img'] ?>" alt="Price" data-animation="animated zoomIn">
          </div>
        </div>
      <?php } ?>

      <!-- Third slide -->
      <?php
      foreach ($anouncement->items_six as $index => $value) { ?>
        <div style="background-image: url(<?php echo $value['background_img'] ?> );" class="item carousel-item-six <?php if ($anouncement->items_four == false && $anouncement->items_five == false && $index == 0) {
                                                                                                                      echo 'active';
                                                                                                                    } ?>">
          <div class="container">
            <div class="carousel-position-four text-center">
              <span style="color: <?php echo $value['1st_line']['color'] ?>;" class="carousel-subtitle-v3 margin-bottom-15" data-animation="animated fadeInDown">
                <?php echo $value['1st_line']['text'] ?>
              </span>
              <p style="color: <?php echo $value['2nd_line']['color'] ?>;" class="carousel-subtitle-v4" data-animation="animated fadeInDown">
                <?php echo $value['2nd_line']['text'] ?>
              </p>
              <p style="color: <?php echo $value['3rd_line']['color'] ?>;" class="carousel-subtitle-v3" data-animation="animated fadeInDown">
                <?php echo $value['3rd_line']['text'] ?>
              </p>
            </div>
          </div>
        </div>
      <?php } ?>

      <!-- Fourth slide -->
      <?php foreach ($anouncement->items_seven as $index => $value) { ?>
        <div style="background-image: url(<?php echo $value['background_img'] ?> );" class="item carousel-item-seven <?php if ($anouncement->items_four == false && $anouncement->items_five == false && $anouncement->items_six == false && $index == 0) {
                                                                                                                        echo 'active';
                                                                                                                      } ?>">
          <div class="center-block">
            <div class="center-block-wrap">
              <div class="center-block-body">
                <h2 class="carousel-title-v1 margin-bottom-20" data-animation="animated fadeInDown">
                  <span style="color: <?php echo $value['1st_line']['color'] ?>;"><?php echo $value['1st_line']['text'] ?></span> <br />
                  <span style="color: <?php echo $value['2nd_line']['color'] ?>"><?php echo $value['2nd_line']['text'] ?></span>
                </h2>
                <a class="carousel-btn" href="<?php echo $value['url'] ?>" data-animation="animated fadeInUp"><?php echo $value['button_text'] ?></a>
              </div>
            </div>
          </div>
        </div>
      <?php } ?>
    </div>

    <!-- Controls -->
    <a class="left carousel-control carousel-control-shop" href="#carousel-example-generic" role="button" data-slide="prev">
      <i class="fa fa-angle-left" aria-hidden="true"></i>
    </a>
    <a class="right carousel-control carousel-control-shop" href="#carousel-example-generic" role="button" data-slide="next">
      <i class="fa fa-angle-right" aria-hidden="true"></i>
    </a>
  </div>
</div>

<div class="main">
  <div class="container">
    <!-- BEGIN SALE PRODUCT & NEW ARRIVALS -->
    <div class="row margin-bottom-40">
      <!-- BEGIN SALE PRODUCT -->
      <div class="col-md-12 sale-product">
        <h2>New Arrivals</h2>
        <div class="owl-carousel owl-carousel5">
          <?php foreach ($items->arrivals as $index => $value) { ?>
            <div>
              <div class="product-item">
                <div class="pi-img-wrapper">
                  <img src="<?php echo $value["items_img"] ?>" class="img-responsive" alt="Berry Lace Dress">
                  <div>
                    <a href="<?php echo $value["items_img"]; ?>" class="btn btn-default fancybox-button">Zoom</a>
                    <a href="#product-pop-up-<?php echo $index; ?>" class="btn btn-default fancybox-fast-view">View</a>
                  </div>
                </div>
                <h3><a href="<?php echo SITE_URL ?>/front/shop-item.php?id=<?php echo $value['id'] ?>"><?php echo $value["items_name"]; ?></a></h3>
                <div class="pi-price"><?php echo "$" . $value["price"] ?></div>
                <a href="<?php echo SITE_URL ?>/front/shop-item.php?id=<?php echo $value['id'] ?>" class="btn btn-default add2cart">Add to cart</a>
                <div class="sticker <?php if ($value["sticker"] == 1) {
                                      echo "sticker-new ";
                                    } elseif ($value["sticker"] == 2) {
                                      echo "sticker-sale";
                                    } ?> "></div>

                <!-- BEGIN fast view of a product -->
                <div id="product-pop-up-<?php echo $index; ?>" style="display: none; width: 700px;">
                  <div class="product-page product-pop-up">
                    <div class="row">
                      <div class="col-md-6 col-sm-6 col-xs-3">
                        <div class="product-main-image">
                          <img src="<?php echo $value["items_img"] ?>" alt="Cool green dress with red bell" class="img-responsive">
                        </div>
                        <div class="product-other-images">
                          <a href="javascript:;" class="active"><img alt="Berry Lace Dress" src="<?php echo $value['gallery_img_1'] ?>"></a>
                          <a href="javascript:;"><img alt="Berry Lace Dress" src="<?php echo $value['gallery_img_2'] ?>"></a>
                          <a href="javascript:;"><img alt="Berry Lace Dress" src="<?php echo $value['gallery_img_3'] ?>"></a>
                        </div>
                      </div>
                      <div class="col-md-6 col-sm-6 col-xs-9">
                        <form class="add-to-cart-form">
                          <h2><?php echo $value['items_name'] ?></h2>
                          <div class="price-availability-block clearfix">
                            <div class="price">
                              <strong><span>$</span><?php echo $value['price'] ?></strong>
                              <em>$<span><?php echo $value['regular_price'] ?></span></em>
                            </div>
                            <div class="availability">
                              Availability: <strong><?php echo $value['availability'] ?></strong>
                            </div>
                          </div>
                          <div class="description">
                            <p><?php echo $value['details'] ?></p>
                          </div>
                          <div class="product-page-options">
                            <div class="pull-left">
                              <label class="control-label">Size:</label>
                              <select name="size" class="form-control input-sm">
                                <option value="">Select</option>
                                <?php
                                $size_info = (new Sizes())->get_sizes($value['id']);
                                print_r($size_info);

                                foreach ($size_info as $size) { ?>
                                  <option value="<?php echo $size['sizes'] ?>"><?php echo $size['sizes'] ?></option>
                                <?php  } ?>
                              </select>
                            </div>
                            <div class="pull-left">
                              <label class="control-label">Color:</label>
                              <select name="color" class="form-control input-sm">
                                <option value="">select</option>

                                <?php
                                $color_info = (new Colors())->get_colors($value['id']);
                                foreach ($color_info as $color) {
                                ?>
                                  <option value="<?php echo $color['colors'] ?>"><?php echo $color['colors'] ?></option>
                                <?php  } ?>
                              </select>
                            </div>
                          </div>
                          <div class="product-page-cart">
                            <div class="product-quantity">
                              <input id="product-quantity" name="quantity" type="text" value="1" readonly class="form-control input-sm">
                            </div>
                            <input type="hidden" name="product_id" value="<?php echo $value['id'] ?>">
                            <input type="hidden" name="items_img" value="<?php echo $value['items_img'] ?>">
                            <input type="hidden" name="items_name" value="<?php echo $value['items_name'] ?>">
                            <input type="hidden" name="price" value="<?php echo $value['price'] ?>">
                            <button class="btn btn-primary add-to-cart-btn" type="submit">Add to cart</button>
                            <a href="<?php echo SITE_URL ?>/front/shop-item.php?id=<?php echo $value['id'] ?>" class="btn btn-default">More details</a>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- END fast view of a product -->

              </div>
            </div>



          <?php  } ?>
        </div>
      </div>
      <!-- END SALE PRODUCT -->
    </div>
    <!-- END SALE PRODUCT & NEW ARRIVALS -->

    <!-- BEGIN SIDEBAR & CONTENT -->
    <div class="row margin-bottom-40 ">
      <!-- BEGIN SIDEBAR -->
      <div class="sidebar col-md-3 col-sm-4">
        <ul class="list-group margin-bottom-25 sidebar-menu">
          <?php
          foreach ($categoryObj->ul as $category) {
            $categoryObj->view_childs($category);
          }
          ?>
        </ul>
      </div>
      <!-- END SIDEBAR -->
      <!-- BEGIN CONTENT -->

      <div class="col-md-9 col-sm-8">
        <h2 id='tree'>Three items</h2>
        <div class="owl-carousel owl-carousel3">
          <?php foreach ($items->three_items as $index => $value) { ?>
            <div>
              <div class="product-item">
                <div class="pi-img-wrapper">
                  <img src="<?php echo $value["items_img"] ?>" class="img-responsive" alt="Berry Lace Dress">
                  <div>
                    <a href="<?php echo $value["items_img"] ?>" class="btn btn-default fancybox-button">Zoom</a>
                    <a href="#product-pop-up-item-three-<?php echo $index ?>" class="btn btn-default fancybox-fast-view">View</a>
                  </div>
                </div>
                <h3><a href="<?php echo SITE_URL ?>/front/shop-item.php?id=<?php echo $value['id'] ?>"><?php echo $value["items_name"] ?></a></h3>
                <div class="pi-price"><?php echo "$" . $value["price"] ?></div>
                <a href="<?php echo SITE_URL ?>/front/shop-item.php?id=<?php echo $value['id'] ?>" class="btn btn-default add2cart">Add to cart</a>
                <div class="sticker <?php if ($value["sticker"] == 1) {
                                      echo "sticker-new ";
                                    } elseif ($value["sticker"] == 2) {
                                      echo "sticker-sale";
                                    } ?>"></div>

                <!-- BEGIN fast view of a product -->
                <div id="product-pop-up-item-three-<?php echo $index; ?>" style="display: none; width: 700px;">
                  <div class="product-page product-pop-up">
                    <div class="row">
                      <div class="col-md-6 col-sm-6 col-xs-3">

                        <div class="product-main-image">
                          <img src="<?php echo $value["items_img"] ?>" alt="Cool green dress with red bell" class="img-responsive">
                        </div>
                        <div class="product-other-images">
                          <a href="javascript:;" class="active"><img alt="Berry Lace Dress" src="<?php echo $value['gallery_img_1'] ?>"></a>
                          <a href="javascript:;"><img alt="Berry Lace Dress" src="<?php echo $value['gallery_img_2'] ?>"></a>
                          <a href="javascript:;"><img alt="Berry Lace Dress" src="<?php echo $value['gallery_img_3'] ?>"></a>
                        </div>
                      </div>
                      <div class="col-md-6 col-sm-6 col-xs-9">
                        <form class="add-to-cart-form">
                          <h2><?php echo $value['items_name']   ?></h2>
                          <div class="price-availability-block clearfix">
                            <div class="price">
                              <strong><span>$</span><?php echo $value['price'] ?></strong>
                              <em>$<span><?php echo $value['regular_price'] ?></span></em>
                            </div>
                            <div class="availability">
                              Availability: <strong>In Stock</strong>
                            </div>
                          </div>
                          <div class="description">
                            <p><?php echo $value['details'] ?></p>
                          </div>
                          <div class="product-page-options">
                            <div class="pull-left">
                              <label class="control-label">Size:</label>
                              <select name="size" class="form-control input-sm">
                                <option value="">Select</option>
                                <?php
                                $size_info = (new Sizes())->get_sizes($value['id']);
                                print_r($size_info);

                                foreach ($size_info as $size) { ?>
                                  <option value="<?php echo $size['sizes'] ?>"><?php echo $size['sizes'] ?></option>
                                <?php  } ?>
                              </select>
                            </div>
                            <div class="pull-left">
                              <label class="control-label">Color:</label>
                              <select name="color" class="form-control input-sm">
                                <option value="">select</option>

                                <?php
                                $color_info = (new Colors())->get_colors($value['id']);
                                foreach ($color_info as $color) {
                                ?>
                                  <option value="<?php echo $color['colors'] ?>"><?php echo $color['colors'] ?></option>
                                <?php  } ?>
                              </select>
                            </div>
                          </div>
                          <div class="product-page-cart">
                            <div class="product-quantity">
                              <input type="text" name="quantity" value="1" class="quantiyy form-control input-sm">
                            </div>
                            <input type="hidden" name="product_id" value="<?php echo $value['id'] ?>">
                            <input type="hidden" name="items_img" value="<?php echo $value['items_img'] ?>">
                            <input type="hidden" name="items_name" value="<?php echo $value['items_name'] ?>">
                            <input type="hidden" name="price" value="<?php echo $value['price'] ?>">
                            <button class="btn btn-primary add-to-cart-btn" type="submit">Add to cart</button>
                            <a href="<?php echo SITE_URL ?>/front/shop-item.php?id=<?php echo $value['id'] ?>" class="btn btn-default">More details</a>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>

              </div>
            </div>
          <?php } ?>
        </div>
      </div>
      <!-- END CONTENT -->
    </div>
    <!-- END SIDEBAR & CONTENT -->

    <!-- BEGIN TWO PRODUCTS & PROMO -->
    <div class="row margin-bottom-35 ">
      <!-- BEGIN TWO PRODUCTS -->
      <div class="col-md-6 two-items-bottom-items">
        <h2>Two items</h2>
        <div class="owl-carousel owl-carousel2">

          <?php foreach ($items->two_items as $index => $value) { ?>
            <div>
              <div class="product-item">
                <div class="pi-img-wrapper">
                  <img src="<?php echo $value["items_img"] ?>" class="img-responsive" alt="Berry Lace Dress">
                  <div>
                    <a href="<?php echo $value["items_img"] ?>" class="btn btn-default fancybox-button">Zoom</a>
                    <a href="#product-pop-up-items-two-<?php echo $index ?>" class="btn btn-default fancybox-fast-view">View</a>
                  </div>
                </div>
                <h3><a href="<?php echo SITE_URL ?>/front/shop-item.php?id=<?php echo $value['id'] ?>"><?php echo $value["items_name"] ?></a></h3>
                <div class="pi-price"><?php echo "$" . $value["price"] ?></div>
                <a href="<?php echo SITE_URL ?>/front/shop-item.php?id=<?php echo $value['id'] ?>" class="btn btn-default add2cart">Add to cart</a>
                <div class="sticker <?php if ($value["sticker"] == 1) {
                                      echo "sticker-new ";
                                    } elseif ($value["sticker"] == 2) {
                                      echo "sticker-sale";
                                    } ?>"></div>

                <!-- BEGIN fast view of a product -->
                <div id="product-pop-up-items-two-<?php echo $index ?>" style="display: none; width: 700px;">
                  <div class="product-page product-pop-up">
                    <div class="row">
                      <div class="col-md-6 col-sm-6 col-xs-3">
                        <div class="product-main-image">
                          <img src="<?php echo $value["items_img"] ?>" alt="Cool green dress with red bell" class="img-responsive">
                        </div>
                        <div class="product-other-images">
                          <a href="javascript:;" class="active"><img alt="Berry Lace Dress" src="<?php echo $value['gallery_img_1'] ?>"></a>
                          <a href="javascript:;"><img alt="Berry Lace Dress" src="<?php echo $value['gallery_img_2'] ?>"></a>
                          <a href="javascript:;"><img alt="Berry Lace Dress" src="<?php echo $value['gallery_img_3'] ?>"></a>
                        </div>
                      </div>
                      <div class="col-md-6 col-sm-6 col-xs-9">
                        <form class="add-to-cart-form">
                          <h2><?php echo $value['items_name'] ?></h2>
                          <div class="price-availability-block clearfix">
                            <div class="price">
                              <strong><span>$</span><?php echo $value['price'] ?></strong>
                              <em>$<span><?php echo $value['regular_price'] ?></span></em>
                            </div>
                            <div class="availability">
                              Availability: <strong>In Stock</strong>
                            </div>
                          </div>
                          <div class="description">
                            <p><?php echo $value['details'] ?></p>
                          </div>
                          <div class="product-page-options">
                            <div class="pull-left">
                              <label class="control-label">Size:</label>
                              <select name="size" class="form-control input-sm">
                                <option value="">Select</option>
                                <?php
                                $size_info = (new Sizes())->get_sizes($value['id']);
                                print_r($size_info);

                                foreach ($size_info as $size) { ?>
                                  <option value="<?php echo $size['sizes'] ?>"><?php echo $size['sizes'] ?></option>
                                <?php  } ?>
                              </select>
                            </div>
                            <div class="pull-left">
                              <label class="control-label">Color:</label>
                              <select name="color" class="form-control input-sm">
                                <option value="">select</option>

                                <?php
                                $color_info = (new Colors())->get_colors($value['id']);
                                foreach ($color_info as $color) {
                                ?>
                                  <option value="<?php echo $color['colors'] ?>"><?php echo $color['colors'] ?></option>
                                <?php  } ?>
                              </select>
                            </div>
                          </div>
                          <div class="product-page-cart">
                            <div class="product-quantity">
                              <input id="product-quantity" type="text" value="1" readonly name="quantity" class="form-control input-sm">
                            </div>
                            <input type="hidden" name="product_id" value="<?php echo $value['id'] ?>">
                            <input type="hidden" name="items_img" value="<?php echo $value['items_img'] ?>">
                            <input type="hidden" name="items_name" value="<?php echo $value['items_name'] ?>">
                            <input type="hidden" name="price" value="<?php echo $value['price'] ?>">
                            <button class="btn btn-primary add-to-cart-btn" type="submit">Add to cart</button>
                            <a href="<?php echo SITE_URL ?>/front/shop-item.php?id=<?php echo $value['id'] ?>" class="btn btn-default">More details</a>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          <?php } ?>
        </div>
      </div>
      <!-- END TWO PRODUCTS -->
      <!-- BEGIN PROMO -->
      <div class="col-md-6 shop-index-carousel">
        <div class="content-slider">
          <div id="myCarousel" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
              <?php foreach ($promo_slider->promo_slider as $index => $value) { ?>
                <li data-target="#myCarousel" data-slide-to="<?php echo $index; ?>" class="<?php if ($index == 0) {
                                                                                              echo "active";
                                                                                            } ?>"></li>
              <?php } ?>
            </ol>
            <div class="carousel-inner">
              <?php foreach ($promo_slider->promo_slider as $index => $value) { ?>
                <div class="item <?php if ($index == 0) {
                                    echo "active";
                                  } ?>">
                  <img src="<?php echo $value["promo_img"] ?>" class="img-responsive" alt="Berry Lace Dress">
                </div>
              <?php } ?>
            </div>
          </div>
        </div>
      </div>
      <!-- END PROMO -->
    </div>
    <!-- END TWO PRODUCTS & PROMO -->
  </div>
</div>

<!-- BEGIN BRANDS -->
<?php include("inc/brands.php"); ?>
<!-- END BRANDS -->

<!-- BEGIN STEPS -->
<?php include("inc/footer.php") ?>
<!-- END FOOTER -->



<!-- Load javascripts at bottom, this will reduce page load time -->
<!-- BEGIN CORE PLUGINS (REQUIRED FOR ALL PAGES) -->
<!--[if lt IE 9]>
    <script src="assets/plugins/respond.min.js"></script>  
    <![endif]-->
<script src="http://localhost/easyshop/front/assets/plugins/jquery.min.js" type="text/javascript"></script>
<script src="http://localhost/easyshop/front/scriptForJs.js" type="text/javascript"></script>
<script src="http://localhost/easyshop/front/assets/plugins/jquery-migrate.min.js" type="text/javascript"></script>
<script src="http://localhost/easyshop/front/assets/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="http://localhost/easyshop/front/assets/corporate/scripts/back-to-top.js" type="text/javascript"></script>
<script src="http://localhost/easyshop/front/assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<!-- END CORE PLUGINS -->

<!-- BEGIN PAGE LEVEL JAVASCRIPTS (REQUIRED ONLY FOR CURRENT PAGE) -->
<script src="http://localhost/easyshop/front/assets/plugins/fancybox/source/jquery.fancybox.pack.js" type="text/javascript"></script><!-- pop up -->
<script src="http://localhost/easyshop/front/assets/plugins/owl.carousel/owl.carousel.min.js" type="text/javascript"></script><!-- slider for products -->
<script src='http://localhost/easyshop/front/assets/plugins/zoom/jquery.zoom.min.js' type="text/javascript"></script><!-- product zoom -->
<script src="http://localhost/easyshop/front/assets/plugins/bootstrap-touchspin/bootstrap.touchspin.js" type="text/javascript"></script><!-- Quantity -->

<script src="http://localhost/easyshop/front/assets/corporate/scripts/layout.js" type="text/javascript"></script>
<script src="http://localhost/easyshop/front/assets/pages/scripts/bs-carousel.js" type="text/javascript"></script>

<script type="text/javascript">
  jQuery(document).ready(function() {
    Layout.init();
    Layout.initOWL();
    Layout.initImageZoom();
    Layout.initTouchspin();
    Layout.initTwitter();
  })

</script>

<!-- END PAGE LEVEL JAVASCRIPTS -->
</body>
<!-- END BODY -->

</html>