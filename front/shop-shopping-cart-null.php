<?php
  require '../define.php';
  require ROOT_DIRECTORY.'/controllers/vendor/autoload.php';
  $cart_info = new DemoCart();
  include("inc/header.php");
?>          
    <!-- Header END -->

    <div class="main">
      <div class="container">
        <!-- BEGIN SIDEBAR & CONTENT -->
        <div class="row margin-bottom-40">
          <!-- BEGIN CONTENT -->
          <div class="col-md-12 col-sm-12">
            <h1>Shopping cart</h1>
            <div class="shopping-cart-page">
              <div class="shopping-cart-data clearfix">
                <p>Your shopping cart is empty!</p>
              </div>
            </div>
          </div>
          <!-- END CONTENT -->
        </div>
        <!-- END SIDEBAR & CONTENT -->

        <!-- BEGIN SIMILAR PRODUCTS -->
    <div class="row margin-bottom-40">
      <div class="col-md-12 col-sm-12">
        <h2>Most popular products</h2>
        <div class="owl-carousel owl-carousel4">
          <?php foreach ($cart_info->similar_items as $index => $value) { ?>
            <div>
              <div class="product-item">
                <div class="pi-img-wrapper">
                  <img src="<?php if ((new SiteIdentity())->demo == false) {
                              echo SITE_URL . '/';
                            }
                            echo $value['items_img'] ?>" class="img-responsive" alt="Berry Lace Dress">
                  <div>
                    <a href="<?php echo $value['items_img'] ?>" class="btn btn-default fancybox-button">Zoom</a>
                    <a href="#product-pop-up-<?php echo $index; ?>" class="btn btn-default fancybox-fast-view">View</a>
                  </div>
                </div>
                <h3><a href="shop-item.html"><?php echo $value['items_name'] ?></a></h3>
                <div class="pi-price"><?php echo "$" . $value['price'] ?></div>
                <a href="<?php echo SITE_URL ?>/front/shop-item.php?id=<?php echo $value['id'] ?>" class="btn btn-default add2cart">Add to cart</a>
                <div class="sticker <?php if ($value['sticker'] == 1) {
                                      echo "sticker-new";
                                    } elseif ($value['sticker'] == 1) {
                                      echo "sticker-sale";
                                    } ?>"></div>
                <!-- BEGIN fast view of a product -->
                <div id="product-pop-up-<?php echo $index; ?>" style="display: none; width: 700px;">
                  <div class="product-page product-pop-up">
                    <div class="row">
                      <div class="col-md-6 col-sm-6 col-xs-3">
                        <div class="product-main-image">
                          <img src="<?php if ((new SiteIdentity())->demo == false) {
                              echo SITE_URL . '/';
                            }
                            echo $value['items_img'] ?>" class="img-responsive" alt="Berry Lace Dress" alt="Cool green dress with red bell" class="img-responsive">
                        </div>
                        <div class="product-other-images">
                          <a href="javascript:;" class="active"><img alt="Berry Lace Dress" src="<?php echo SITE_URL.'/'. $value['gallery_img_1'] ?>"></a>
                          <a href="javascript:;"><img alt="Berry Lace Dress" src="<?php echo SITE_URL.'/'. $value['gallery_img_2'] ?>"></a>
                          <a href="javascript:;"><img alt="Berry Lace Dress" src="<?php echo SITE_URL.'/'. $value['gallery_img_3'] ?>"></a>
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
                            <input type="hidden" name="user_id" value="<?php echo $_SESSION['session_id'] ?>">
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
          <?php } ?>
        </div>
      </div>
    </div>
    <!-- END SIMILAR PRODUCTS -->
      </div>
    </div>

    
    <?php include("inc/footer.php") ?>
    <!-- END FOOTER -->

    <!-- BEGIN fast view of a product -->
    <div id="product-pop-up" style="display: none; width: 700px;">
            <div class="product-page product-pop-up">
              <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-3">
                  <div class="product-main-image">
                    <img src="assets/pages/img/products/model7.jpg" alt="Cool green dress with red bell" class="img-responsive">
                  </div>
                  <div class="product-other-images">
                    <a href="javascript:;" class="active"><img alt="Berry Lace Dress" src="assets/pages/img/products/model3.jpg"></a>
                    <a href="javascript:;"><img alt="Berry Lace Dress" src="assets/pages/img/products/model4.jpg"></a>
                    <a href="javascript:;"><img alt="Berry Lace Dress" src="assets/pages/img/products/model5.jpg"></a>
                  </div>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-9">
                  <h1>Cool green dress with red bell</h1>
                  <div class="price-availability-block clearfix">
                    <div class="price">
                      <strong><span>$</span>47.00</strong>
                      <em>$<span>62.00</span></em>
                    </div>
                    <div class="availability">
                      Availability: <strong>In Stock</strong>
                    </div>
                  </div>
                  <div class="description">
                    <p>Lorem ipsum dolor ut sit ame dolore  adipiscing elit, sed nonumy nibh sed euismod laoreet dolore magna aliquarm erat volutpat 
Nostrud duis molestie at dolore.</p>
                  </div>
                  <div class="product-page-options">
                    <div class="pull-left">
                      <label class="control-label">Size:</label>
                      <select class="form-control input-sm">
                        <option>L</option>
                        <option>M</option>
                        <option>XL</option>
                      </select>
                    </div>
                    <div class="pull-left">
                      <label class="control-label">Color:</label>
                      <select class="form-control input-sm">
                        <option>Red</option>
                        <option>Blue</option>
                        <option>Black</option>
                      </select>
                    </div>
                  </div>
                  <div class="product-page-cart">
                    <div class="product-quantity">
                        <input id="product-quantity" type="text" value="1" readonly name="product-quantity" class="form-control input-sm">
                    </div>
                    <button class="btn btn-primary" type="submit">Add to cart</button>
                    <a href="shop-item.html" class="btn btn-default">More details</a>
                  </div>
                </div>

                <div class="sticker sticker-sale"></div>
              </div>
            </div>
    </div>
    <!-- END fast view of a product -->

    <!-- Load javascripts at bottom, this will reduce page load time -->
    <!-- BEGIN CORE PLUGINS (REQUIRED FOR ALL PAGES) -->
    <!--[if lt IE 9]>
    <script src="assets/plugins/respond.min.js"></script>  
    <![endif]-->  
    <script src="<?php echo SITE_URL ?>/front/assets/plugins/jquery.min.js" type="text/javascript"></script>
    
    <script src="<?php echo SITE_URL ?>/front/assets/plugins/jquery-migrate.min.js" type="text/javascript"></script>
    <script src="<?php echo SITE_URL ?>/front/assets/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>      
    <script src="<?php echo SITE_URL ?>/front/assets/corporate/scripts/back-to-top.js" type="text/javascript"></script>
    <script src="<?php echo SITE_URL ?>/front/assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
    <!-- END CORE PLUGINS -->

    <!-- BEGIN PAGE LEVEL JAVASCRIPTS (REQUIRED ONLY FOR CURRENT PAGE) -->
    <script src="<?php echo SITE_URL ?>/front/assets/plugins/fancybox/source/jquery.fancybox.pack.js" type="text/javascript"></script><!-- pop up -->
    <script src="<?php echo SITE_URL ?>/front/assets/plugins/owl.carousel/owl.carousel.min.js" type="text/javascript"></script><!-- slider for products -->
    <script src='<?php echo SITE_URL ?>/front/assets/plugins/zoom/jquery.zoom.min.js' type="text/javascript"></script><!-- product zoom -->
    <script src="<?php echo SITE_URL ?>/front/assets/plugins/bootstrap-touchspin/bootstrap.touchspin.js" type="text/javascript"></script><!-- Quantity -->
    <script src="http://localhost/easyshop/front/scriptForJs.js" type="text/javascript"></script>
    <script src="<?php echo SITE_URL ?>/front/assets/corporate/scripts/layout.js" type="text/javascript"></script>
    <script type="text/javascript">
        jQuery(document).ready(function() {
            Layout.init();    
            Layout.initOWL();
            Layout.initTwitter();
            Layout.initImageZoom();
            Layout.initTouchspin();
        });
    </script>
    <!-- END PAGE LEVEL JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>