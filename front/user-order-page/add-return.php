<?php
  require '../../define.php';
  require ROOT_DIRECTORY.'/controllers/vendor/autoload.php';
  $side_bar = new SideBarInfo();
  $wishlist_info = new WishList(); 
  include("../inc/header.php");
  
?>
    <!-- Header END -->
    
    <div class="main">
      <div class="container">
        <ul class="breadcrumb">
            <li><a href="index.html">Home</a></li>
            <li><a href="">Store</a></li>
            <li class="active">My Wish List</li>
        </ul>
        <!-- BEGIN SIDEBAR & CONTENT -->
        <div class="row margin-bottom-40">
          <!-- BEGIN SIDEBAR -->
          <div class="sidebar col-md-3 col-sm-3">

          </div>
          <!-- END SIDEBAR -->

          <!-- BEGIN CONTENT -->
          <div class="col-md-9 col-sm-7">
            <div class="goods-page">
              <div class="goods-data clearfix">
                        <h1 style="margin-bottom: 20px;">Select product to return</h1>
                            <div class="table-wrapper-responsive return-page" >
                            <table>
                            <tr>
                                <th>Select</th>
                                <th>Order Id</th>
                                <th>Image</th>
                                <th>Productds Name</th>
                                <th>Quantity</th>
                                <th>Reason</th>
                            </tr>
                            <tr>
                                <td><input type="checkbox"></td>
                                <td>6767</td>
                                <td><img src="<?php echo SITE_URL.'/front/assets/pages/img/products/model4.jpg'?>"></td>
                                <td>T-shirt</td>
                                <td><input type="number" value="1"></td>
                                <td>
                                    <select>
                                        <option value="">Too large</option>
                                        <option value="">Too short</option>
                                        <option value="">Damage</option>
                                        <option value="">I dont like this</option>
                                        <option value="">Not comfortable for me</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td><input type="checkbox"></td>
                                <td>6767</td>
                                <td><img src="<?php echo SITE_URL.'/front/assets/pages/img/products/model4.jpg'?>"></td>
                                <td>T-shirt</td>
                                <td><input type="number" value="1"></td>
                                <td>
                                    <select>
                                        <option value="">Too large</option>
                                        <option value="">Too short</option>
                                        <option value="">Damage</option>
                                        <option value="">I dont like this</option>
                                        <option value="">Not comfortable for me</option>
                                    </select>
                                </td>
                            </tr>
                        </table>
                      </div>
                      <a href="return-options.php">
                         <button class="btn" type="submit" > continue</button>
                      </a>

                    </div>
                </div>
              </div>
            </div>
          </div>
          <!-- END CONTENT -->
        </div>
        <!-- END SIDEBAR & CONTENT -->
      </div>
    </div>

    <!-- BEGIN BRANDS -->
   <?php include("../inc/brands.php") ?>
    <!-- END BRANDS -->
    <?php include("../inc/footer.php") ?>
    <!-- END FOOTER -->

    <!-- Load javascripts at bottom, this will reduce page load time -->
    <!-- BEGIN CORE PLUGINS(REQUIRED FOR ALL PAGES) -->
    <!--[if lt IE 9]>
    <script src="assets/plugins/respond.min.js"></script>  
    <![endif]-->  
    <script src="assets/plugins/jquery.min.js" type="text/javascript"></script>
    <script src="assets/plugins/jquery-migrate.min.js" type="text/javascript"></script>
    <script src="assets/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>      
    <script src="assets/corporate/scripts/back-to-top.js" type="text/javascript"></script>
    <script src="assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
    <!-- END CORE PLUGINS -->

    <!-- BEGIN PAGE LEVEL JAVASCRIPTS (REQUIRED ONLY FOR CURRENT PAGE) -->
    <script src="assets/plugins/fancybox/source/jquery.fancybox.pack.js" type="text/javascript"></script><!-- pop up -->
    <script src="assets/plugins/owl.carousel/owl.carousel.min.js" type="text/javascript"></script><!-- slider for products -->
    <script src='assets/plugins/zoom/jquery.zoom.min.js' type="text/javascript"></script><!-- product zoom -->
    <script src="assets/plugins/bootstrap-touchspin/bootstrap.touchspin.js" type="text/javascript"></script><!-- Quantity -->
    <script src="assets/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
    <script src="assets/plugins/rateit/src/jquery.rateit.js" type="text/javascript"></script>
    <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js" type="text/javascript"></script><!-- for slider-range -->

    <script src="assets/corporate/scripts/layout.js" type="text/javascript"></script>
    <script type="text/javascript">
        jQuery(document).ready(function() {
            Layout.init();    
            Layout.initOWL();
            Layout.initTwitter();
            Layout.initImageZoom();
            Layout.initTouchspin();
            Layout.initUniform();
            Layout.initSliderRange();
        });
    </script>
    <!-- END PAGE LEVEL JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>