<?php
  require '../../define.php';
  require ROOT_DIRECTORY.'/controllers/vendor/autoload.php';
  $side_bar = new SideBar();
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
            <h1>Order NO -02 </h1>
            <div class="goods-page">
              <div class="goods-data clearfix">
                <div class="table-wrapper-responsive">
                 <table style="text-align:center;">
                  <tr>
                    <th style="text-align:center;">Products Name</th>
                    <th style="text-align:center;">Quantity</th>
                    <th style="text-align:center;">price</th>
                    <th style="text-align:center;">Subtotal</th>
                    <th style="text-align:center;">Options</th>
                  </tr>
                  <tr>
                    <td>Red printed t-shirt</td>
                    <td>04</td>
                    <td>$400</td>
                    <td>$400</td>
                    <td style="position: relative;">
                        <a>
                        <button id="review">Reviews</button>
                        </a>    
                    </td>
                  </tr>
                  <tr>
                    <td>Red printed t-shirt</td>
                    <td>04</td>
                    <td>$400</td>
                    <td>$400</td>
                    <td style="position: relative;">
                        <a>
                        <button id="review">Reviews</button>
                        </a>    
                    </td>
                  </tr>
                 </table>

                <!-- ------ feedback and rating section------ -->
                <div id="container" style="background: white; visibility:hidden; width: 113%; padding: 20px; position: absolute; left: 50%; top:90%; transform: translate(-50%, -90%) scale(0.1);transition: transform .5s;box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.40);" >
                <div class="goods-page">
                <h1>Order NO -02 </h1>
              <div class="goods-data clearfix">
                <div class="table-wrapper-responsive">
                 <table style="text-align:center;">
                  <tr>
                    <th style="text-align:center;">Products Name</th>
                    <th style="text-align:center;">Quantity</th>
                    <th style="text-align:center;">price</th>
                    <th style="text-align:center;">Subtotal</th>
                  </tr>
                  <tr>
                    <td>Red printed t-shirt</td>
                    <td>04</td>
                    <td>$400</td>
                    <td>$400</td>
                  </tr>
                 </table>
                 <form action="">
                <div style="display:flex; justify-content:space-around; align-items:center; margin-top: 20px;">
                    <div style="padding-right: 20px;">
                        <textarea name="" id="" cols="20" rows="2" placeholder="Is this product good?"></textarea>
                    </div>
                    <div>
                        <h3 style="font-size: 20px;">Rating:</h3>
                        <input type="radio" name="rating"> 1 ster
                        <input type="radio" name="rating"> 2 ster
                        <input type="radio" name="rating"> 3 ster
                        <input type="radio" name="rating"> 4 ster
                        <input type="radio" name="rating"> 5 ster
                    </div>
                </div>
                <button id="submit" type="submit" style="float:right; margin: 10px 25px 0;"> Submit</button>
                </form>
                </div>
              </div>
            </div>
                </div>
                <!-- ------end feedback and rating section------ -->


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

    <script>
        let review = document.getElementById("review")
        let container = document.getElementById("container")
        let submit = document.getElementById("submit")

        review.onclick = function(){
            container.style.visibility = "visible";
            container.style.transform = "translate(-63%,-100%) scale(1)";

        }
        submit.onclick = function(){
          container.style.transform = "translate(-50%, -50%) scale(0.1)";
          container.style.visibility = "hidden";
         
        }
    </script>

    <script src="<?php echo SITE_URL.'/front/assets/plugins/jquery.min.js' ?>" type="text/javascript"></script>
    <script src="<?php echo SITE_URL.'/front/assets/plugins/jquery-migrate.min.js' ?>" type="text/javascript"></script>
    <script src="<?php echo SITE_URL.'/front/assets/plugins/bootstrap/js/bootstrap.min.js' ?>" type="text/javascript"></script>      
    <script src="<?php echo SITE_URL.'/front/assets/corporate/scripts/back-to-top.js' ?>" type="text/javascript"></script>
    <script src="<?php echo SITE_URL.'/front/assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js' ?>" type="text/javascript"></script>
    <!-- END CORE PLUGINS -->

    <!-- BEGIN PAGE LEVEL JAVASCRIPTS (REQUIRED ONLY FOR CURRENT PAGE) -->
    <script src="assets/plugins/fancybox/source/jquery.fancybox.pack.js" type="text/javascript"></script><!-- pop up -->
    <script src="<?php echo SITE_URL.'/front/assets/plugins/owl.carousel/owl.carousel.min.js' ?>" type="text/javascript"></script><!-- slider for products -->
    <script src='assets/plugins/zoom/jquery.zoom.min.js' type="text/javascript"></script><!-- product zoom -->
    <script src="assets/plugins/bootstrap-touchspin/bootstrap.touchspin.js" type="text/javascript"></script><!-- Quantity -->
    <script src="assets/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
    <script src="assets/plugins/rateit/src/jquery.rateit.js" type="text/javascript"></script>
    <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js" type="text/javascript"></script><!-- for slider-range -->

    <script src="<?php echo SITE_URL.'/front/assets/corporate/scripts/layout.js' ?>" type="text/javascript"></script>
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