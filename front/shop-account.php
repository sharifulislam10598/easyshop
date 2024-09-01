<?php
  require '../define.php';
  include("inc/header.php");

  if(!isset($_SESSION['session_id'])){
    $_SESSION['redirect_url'] = $_SERVER['REQUEST_URI'];
    header('location:'.SITE_URL.'/front/shop-login.php');
    exit();
  }
  $account_info = new Account();
?>
    <!-- Header END -->
    
    <div class="main">
      <div class="container">
        <ul class="breadcrumb">
            <li><a href="index.html">Home</a></li>
            <li><a href="">Store</a></li>
            <li class="active">My Account Page</li>
        </ul>
        <!-- BEGIN SIDEBAR & CONTENT -->
        <div class="row margin-bottom-40">
          <!-- BEGIN SIDEBAR -->
          <div class="sidebar col-md-3 col-sm-3">

          </div>
          <!-- END SIDEBAR -->

          <!-- BEGIN CONTENT -->
          <div class="col-md-9 col-sm-7">
            <h1>My Account Page</h1>
            <div class="content-page">
              <h3>My Account</h3>
              <ul>
              <?php foreach($account_info->account_info as $info){?>
                <li><a href="<?php echo $info['link'] ?>"><?php echo $info['content'] ?></a></li>
              <?php } ?>
              </ul>
              <hr>

              <h3>My Orders</h3>
              <ul>
              <?php foreach($account_info->order_info as $info){?>
                <li><a href="<?php echo $info['link'] ?>"><?php echo $info['content'] ?></a></li>
              <?php } ?>
              </ul>
            </div>
          </div>
          <!-- END CONTENT -->
        </div>
        <!-- END SIDEBAR & CONTENT -->
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

    <script src="<?php echo SITE_URL ?>/front/assets/corporate/scripts/layout.js" type="text/javascript"></script>
    <script src="<?php echo SITE_URL ?>/front/scriptForJs.js" type="text/javascript"></script>
    <script type="text/javascript">
        jQuery(document).ready(function() {
            Layout.init();    
            Layout.initOWL();
            Layout.initTwitter();
        });
    </script>
    <!-- END PAGE LEVEL JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>