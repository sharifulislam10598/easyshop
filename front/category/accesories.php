<?php
include("../../define.php");
include("../inc/header.php");
$item_info = new ProductInfo();
$categoryObj = new Category();
$items = new items();
$ladies_category = $items->selected_item_info_by_accesories();

?>
<!-- Header END -->
<div class="main">
    <div class="container">
        <ul class="breadcrumb">
            <li><a href="index.html">Home</a></li>
            <li><a href="">Store</a></li>
            <li class="active">Men category</li>
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
                </ul>

                <div class="sidebar-filter margin-bottom-25">
                    <h2>Filter</h2>
                    <h3>Availability</h3>
                    <div class="checkbox-list">
                        <label><input type="checkbox"> Not Available (3)</label>
                        <label><input type="checkbox"> In Stock (26)</label>
                    </div>

                    <h3>Price</h3>
                    <p>
                        <label for="amount">Range:</label>
                        <input type="text" id="amount" style="border:0; color:#f6931f; font-weight:bold;">
                    </p>
                    <div id="slider-range"></div>
                </div>


            </div>
            <!-- END SIDEBAR -->
            <!-- BEGIN CONTENT -->
            <div class="col-md-9 col-sm-7">
                <div class="row list-view-sorting clearfix">
                    <div class="col-md-2 col-sm-2 list-view">
                        <a href="javascript:;"><i class="fa fa-th-large"></i></a>
                        <a href="javascript:;"><i class="fa fa-th-list"></i></a>
                    </div>
                    <div class="col-md-10 col-sm-10">
                        <div class="pull-right">
                            <label class="control-label">Show:</label>
                            <select class="form-control input-sm">
                                <?php foreach ($item_info->control_label as $index => $value) { ?>
                                    <option value="<?php echo $value['value'] ?>" <?php if ($index == 0) {
                                                                                        echo "selected";
                                                                                    } ?>><?php echo $value['number'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="pull-right">
                            <label class="control-label">Sort&nbsp;By:</label>
                            <select class="form-control input-sm">
                                <?php foreach ($item_info->sort_by as $index => $value) { ?>
                                    <option value="<?php echo $value['value'] ?>&amp;<?php echo $value['order_type'] ?>" <?php if ($index == 0) {
                                                                                                                                echo "selected";
                                                                                                                            } ?>><?php echo $value['order_by'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                </div>
                <!-- BEGIN PRODUCT LIST -->
                <div class="row product-list">
                    <!-- PRODUCT ITEM START -->
                    <?php foreach ($ladies_category as $index => $value) { ?>

                        <div class="col-md-4 col-sm-6 col-xs-12">
                            <div class="product-item">
                                <div class="pi-img-wrapper">
                                    <img src="<?php echo SITE_URL . '/' . $value['items_img'] ?>" class="img-responsive" alt="Berry Lace Dress">
                                    <div>
                                        <a href="<?php echo SITE_URL . '/' . $value['items_img'] ?>" class="btn btn-default fancybox-button">Zoom</a>
                                        <a href="#product-pop-up-<?php echo $index; ?>" class="btn btn-default fancybox-fast-view">View</a>
                                    </div>
                                </div>
                                <h3><a href="<?php echo SITE_URL ?>/front/shop-item.php?id=<?php echo $value['id'] ?>"><?php echo $value["items_name"] ?></a></h3>
                                <div class="pi-price">$<?php echo $value['price'] ?></div>
                                <a href="javascript:;" class="btn btn-default add2cart">Add to cart</a>
                                <div class="sticker <?php if ($value["sticker"] == 1) {
                                                        echo "sticker-new ";
                                                    } elseif ($value["sticker"] == 2) {
                                                        echo "sticker-sale";
                                                    } ?>"></div>

                                <!-- BEGIN fast view of a product -->
                                <div id="product-pop-up-<?php echo $index; ?>" style="display: none; width: 700px;">
                                    <div class="product-page product-pop-up">
                                        <div class="row">
                                            <div class="col-md-6 col-sm-6 col-xs-3">
                                                <div class="product-main-image">
                                                    <img src="<?php echo SITE_URL . '/' . $value['items_img'] ?>" alt="Cool green dress with red bell" class="img-responsive">
                                                </div>
                                                <div class="product-other-images">
                                                    <a href="javascript:;" class="active"><img alt="Berry Lace Dress" src="<?php echo SITE_URL . '/' . $value['items_img'] ?>"></a>
                                                    <a href="javascript:;"><img alt="Berry Lace Dress" src="<?php echo SITE_URL . '/' . $value['items_img'] ?>"></a>
                                                    <a href="javascript:;"><img alt="Berry Lace Dress" src="<?php echo SITE_URL . '/' . $value['items_img'] ?>"></a>
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
                    <!-- PRODUCT ITEM END -->
                </div>
                <!-- END PRODUCT LIST -->
                <!-- BEGIN PAGINATOR -->
                <div class="row">
                    <div class="col-md-4 col-sm-4 items-info">Items 1 to 9 of 10 total</div>
                    <div class="col-md-8 col-sm-8">
                        <ul class="pagination pull-right">
                            <li><a href="javascript:;">&laquo;</a></li>
                            <?php foreach ($item_info->paginator as $value) { ?>
                                <li><a href="<?php echo $value['link'] ?>"><?php echo $value['number'] ?></a></li>
                            <?php } ?>
                            <li><a href="javascript:;">&raquo;</a></li>
                        </ul>
                    </div>
                </div>
                <!-- END PAGINATOR -->
            </div>
            <!-- END CONTENT -->
        </div>
        <!-- END SIDEBAR & CONTENT -->
    </div>
</div>

<!-- BEGIN BRANDS -->
<?php include("../inc/brands.php") ?>
<!-- END BRANDS -->

<!-- BEGIN STEPS -->
<?php include("../inc/footer.php") ?>
<!-- END FOOTER -->


<!-- Load javascripts at bottom, this will reduce page load time -->
<!-- BEGIN CORE PLUGINS(REQUIRED FOR ALL PAGES) -->
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