<?php
$product_id = $_GET['id'];
require '../define.php';
require ROOT_DIRECTORY . '/controllers/vendor/autoload.php';
include("inc/header.php");
$cart_info = new DemoCart();

$categoryObj = new Category();
$items_view = (new ItemsView())->selected_item;

if ((new SiteIdentity())->demo == false) {

  if (isset($_POST['add_to_cart'])) {

    if (!isset($_SESSION['session_id'])) {
      $_SESSION['redirect_url'] = $_SERVER['REQUEST_URI'];
      header('location:' . SITE_URL . '/front/shop-login.php');
      exit();
    } else {
      $response = (new Cart())->save();
      if ($response->status == 1) {
        echo "<script> alert('successfull')</script>";
      }
    }
  }
}

if (isset($_POST['send'])) {
  $response = (new Reviews())->save();
  if ($response->status == false) {
    echo 'review failed.' . $response->get_string_errors();
  }
}
?>
<!-- Header END -->
<div class="main">
  <div class="container">
    <ul class="breadcrumb">
      <li><a href="index.html">Home</a></li>
      <li><a href="">Store</a></li>
      <li class="active">Cool green dress with red bell</li>
    </ul>
    <!-- BEGIN SIDEBAR & CONTENT -->
    <div class="row margin-bottom-40">
      <!-- BEGIN SIDEBAR -->
      <div class="sidebar col-md-3 col-sm-5">
        <ul class="list-group margin-bottom-25 sidebar-menu">
          <?php
          foreach ($categoryObj->ul as $category) {
            $categoryObj->view_childs($category);
          }
          ?>
        </ul>
        <div class="sidebar-products clearfix">
          <h2>Bestsellers</h2>
          <?php foreach ((new ItemsView())->best_seller as $item) { ?>
            <div class="item">
              <a href="<?php echo $item['link'] ?>"><img src="<?php echo $item['item_img'] ?>" alt="Some Shoes in Animal with Cut Out"></a>
              <h3><a href="<?php echo $item['link'] ?>"><?php echo $item['name'] ?></a></h3>
              <div class="price"><?php echo "$" . $item['price'] ?></div>
            </div>
          <?php } ?>
        </div>
      </div>
      <!-- END SIDEBAR -->

      <!-- BEGIN CONTENT -->
      <div class="col-md-9 col-sm-7">
        <div class="product-page">
          <div class="row">
            <div class="col-md-6 col-sm-6">
              <div class="product-main-image">
                <img src="<?php echo SITE_URL . '/' . $items_view['item_img'] ?>" alt="Cool green dress with red bell" class="img-responsive" data-BigImgsrc="<?php echo $items_view['item_img'] ?>">
              </div>
              <div class="product-other-images">
                <?php foreach ($items_view['gellery_img'] as $gellery_img) { ?>
                  <a href="<?php echo $gellery_img['img'] ?>" class="fancybox-button" rel="photos-lib"><img alt="Berry Lace Dress" src="<?php echo $gellery_img['img'] ?>"></a>
                <?php } ?>
              </div>
            </div>
            <div class="col-md-6 col-sm-6">
              <h1><?php echo $items_view['name'] ?></h1>
              <div class="price-availability-block clearfix">
                <div class="price">
                  <strong><span>$</span><?php echo $items_view['price'] ?></strong>
                  <em>$<span><?php echo $items_view['regular_price'] ?></span></em>
                </div>
                <div class="availability">
                  Availability: <strong><?php echo $items_view['availability'] ?></strong>
                </div>
              </div>
              <div class="description">
                <p><?php echo $items_view['description'] ?>.</p>
              </div>
              <form method="post">
                <div class="product-page-options">
                  <div class="pull-left">
                    <label class="control-label">Size:</label>
                    <select name="size" class="form-control input-sm">
                      <option>Select</option>
                      <?php
                      $size_info = (new Sizes())->get_sizes($_GET['id']);

                      foreach ($size_info as $size) { ?>
                        <option value="<?php echo $size['sizes'] ?>"><?php echo $size['sizes'] ?></option>
                      <?php  } ?>
                    </select>
                  </div>
                  <div class="pull-left">
                    <label class="control-label">Color:</label>
                    <select name="color" class="form-control input-sm">
                      <option>select</option>

                      <?php
                      $color_info = (new Colors())->get_colors($_GET['id']);
                      foreach ($color_info as $color) {
                      ?>
                        <option value="<?php echo $color['colors'] ?>"><?php echo $color['colors'] ?></option>
                      <?php  } ?>
                    </select>
                  </div>
                </div>

                <div class="product-page-cart">
                  <div class="product-quantity">
                    <input id="product-quantity" type="text" name="quantity" value="1" readonly class="form-control input-sm">
                  </div>
                  <?php
                  $cart_item_check = (new Cart())->get_cart_item();
                  if ($cart_item_check == true) { ?>
                    <button class="btn btn-primary" type="submit" id="CartBtn" name="add_to_cart">Add to more</button>
                  <?php } else { ?>
                    <button class="btn btn-primary" type="submit" id="CartBtn" name="add_to_cart">Add to cart</button>
                  <?php  } ?>

                </div>
                <input type="hidden" name="items_img" value="<?php echo $items_view['item_img'] ?>">
                <input type="hidden" name="items_name" value="<?php echo $items_view['name'] ?>">
                <input type="hidden" name="price" value="<?php echo $items_view['price'] ?>">
                <input type="hidden" name="product_id" value="<?php echo $_GET['id'] ?>">
              </form>
              <div class="review">
                <input type="range" value="4" step="0.25" id="backing4">
                <div class="rateit" data-rateit-backingfld="#backing4" data-rateit-resetable="false" data-rateit-ispreset="true" data-rateit-min="0" data-rateit-max="5">
                </div>
                <a href="javascript:;">7 reviews</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="#get-review">Write a review</a>
              </div>

              <ul class="social-icons">
                <?php foreach ((new ItemsView())->social_share as $value) { ?>
                  <li><a class="<?php echo $value['class'] ?>" data-original-title="facebook" href="<?php echo $value['link'] ?>"></a></li>
                <?php } ?>
              </ul>
            </div>

            <div class="product-page-content">
              <ul id="myTab" class="nav nav-tabs">
                <li><a href="#Description" data-toggle="tab">Description</a></li>
                <li><a href="#Information" data-toggle="tab">Information</a></li>
                <li class="active"><a href="#Reviews" data-toggle="tab">Reviews (2)</a></li>
              </ul>
              <div id="myTabContent" class="tab-content">
                <div class="tab-pane fade" id="Description">
                  <p><?php echo $items_view['description'] ?></p>
                </div>
                <div class="tab-pane fade" id="Information">
                  <table class="datasheet">
                    <tr>
                      <th colspan="2">Additional Features</th>
                    </tr>
                    <?php foreach ((new ItemsView())->feature_info as $feature) { ?>
                      <tr>
                        <td class="datasheet-features-type"><?php echo $feature['features'] ?></td>
                        <td><?php echo $feature['feature_values'] ?></td>
                      </tr>
                    <?php } ?>
                  </table>
                </div>
                <div class="tab-pane fade in active" id="Reviews">
                  <!--<p>There are no reviews for this product.</p>-->
                  <?php foreach ((new ItemsView())->reviews as $review) { ?>
                    <div class="review-item clearfix">
                      <div class="review-item-submitted">
                        <strong><?php echo $review['name'] ?></strong>
                        <em><?php 
                        $date_time = new DateTime($review['date']);
                        $date = $date_time->format('d/m/y');
                        echo $date ;
                        ?> - <?php
                        $date_time = new DateTime($review['time']);
                        $time = $date_time->format('g:i a');
                         echo $time
                         ?></em>
                        <div class="rateit" data-rateit-value="<?php echo $review['rating'] ?>" data-rateit-ispreset="true" data-rateit-readonly="true"></div>
                      </div>
                      <div class="review-item-content">
                        <p><?php echo $review['review'] ?></p>
                      </div>
                    </div>
                  <?php } ?>
                  <!-- BEGIN FORM-->
                  <form id="get-review" method="post" class="reviews-form" role="form">
                    <h2>Write a review</h2>
                    <div class="form-group">
                      <label for="name">Name <span class="require">*</span></label>
                      <input type="text" name="name" class="form-control" id="name">
                    </div>
                    <div class="form-group">
                      <label for="email">Email</label>
                      <input type="text" name="email" class="form-control" id="email">
                    </div>
                    <div class="form-group">
                      <label for="review">Review <span class="require">*</span></label>
                      <textarea class="form-control" name="review" rows="8" id="review"></textarea>
                    </div>
                    <div class="form-group">
                      <label for="email">Rating</label>
                      <input type="range" value="4" name="rating" step="0.25" id="backing5">
                      <div class="rateit" data-rateit-backingfld="#backing5" data-rateit-resetable="false" data-rateit-ispreset="true" data-rateit-min="0" data-rateit-max="5">
                      </div>
                    </div>
                    <input type="text">
                    <div class="padding-top-20">
                      <button type="submit" name="send" class="btn btn-primary">Send</button>
                    </div>
                  </form>
                  <!-- END FORM-->
                </div>
              </div>
            </div>
            <div class="sticker <?php if ($items_view["sticker"] == 1) {
                                  echo "sticker-new ";
                                } elseif ($items_view["sticker"] == 2) {
                                  echo "sticker-sale";
                                } ?>"></div>
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
                          <a href="javascript:;" class="active"><img alt="Berry Lace Dress" src="<?php echo SITE_URL . '/' . $value['gallery_img_1'] ?>"></a>
                          <a href="javascript:;"><img alt="Berry Lace Dress" src="<?php echo SITE_URL . '/' . $value['gallery_img_2'] ?>"></a>
                          <a href="javascript:;"><img alt="Berry Lace Dress" src="<?php echo SITE_URL . '/' . $value['gallery_img_3'] ?>"></a>
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
          <?php } ?>
        </div>
      </div>
    </div>
    <!-- END SIMILAR PRODUCTS -->
  </div>
</div>

<!-- BEGIN BRANDS -->
<?php include("inc/brands.php") ?>
<!-- END BRANDS -->

<!-- BEGIN STEPS -->
<?php include("inc/footer.php") ?>
<!-- END FOOTER -->
<!-- Load javascripts at bottom, this will reduce page load time -->
<!-- BEGIN CORE PLUGINS(REQUIRED FOR ALL PAGES) -->
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
<script src="<?php echo SITE_URL ?>/front/assets/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
<script src="<?php echo SITE_URL ?>/front/assets/plugins/rateit/src/jquery.rateit.js" type="text/javascript"></script>
<script src="<?php echo SITE_URL ?>/front/assets/corporate/scripts/layout.js" type="text/javascript"></script>
<script src="<?php echo SITE_URL ?>/front/scriptForJs.js" type="text/javascript"></script>
<script type="text/javascript">
  jQuery(document).ready(function() {
    Layout.init();
    Layout.initOWL();
    Layout.initTwitter();
    Layout.initImageZoom();
    Layout.initTouchspin();
    Layout.initUniform();
  });
</script>
<!-- END PAGE LEVEL JAVASCRIPTS -->
</body>
<!-- END BODY -->

</html>