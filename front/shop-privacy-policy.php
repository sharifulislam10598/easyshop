<?php
  require '../define.php';
  require ROOT_DIRECTORY.'/controllers/vendor/autoload.php';
  $side_bar = new SideBar();
  $privacy_policy = new PrivacyPolicy();
  include("inc/header.php");
?>
    <!-- Header END -->

    <div class="main">
      <div class="container">
        <ul class="breadcrumb">
            <li><a href="index.html">Home</a></li>
            <li><a href="">Store</a></li>
            <li class="active">Privacy Policy</li>
        </ul>
        <!-- BEGIN SIDEBAR & CONTENT -->
        <div class="row margin-bottom-40">
          <!-- BEGIN SIDEBAR -->
          <div class="sidebar col-md-3 col-sm-3">
            <ul class="list-group margin-bottom-25 sidebar-menu">
            <?php foreach($side_bar->side_bar as $value){?> 
              <li class="list-group-item clearfix"><a href="<?php echo $value['link'] ?>"><i class="fa fa-angle-right"></i><?php echo $value['name'] ?></a></li>
            <?php } ?>
            </ul>
          </div>
          <!-- END SIDEBAR -->

          <!-- BEGIN CONTENT -->
          <div class="col-md-9 col-sm-9">
            <h1>Privacy Policy</h1>
            <div class="content-page">
            <?php foreach($privacy_policy->privacy_policy_info['first_content'] as $value){?>
              <p><?php echo $value['article_1'] ?></p>

              <p><?php echo $value['article_2'] ?></p>

              <h2><?php echo $value['title'] ?></h2>

              <p><?php echo $value['article_3'] ?></p>
            <?php } ?>
            <?php foreach($privacy_policy->privacy_policy_info['second_content'] as $value){?> 
              <h3><?php echo $value['title'] ?></h3>
              <ul>
              <?php foreach($value['list'] as $list){?>
                <li><?php echo $list['subtitle'] ?></li>
                <?php } ?>
              </ul>

              <p><?php echo $value['article_1'] ?></p>

              <h2><?php echo $value['title_2'] ?></h2>

              <p><?php echo $value['article_2'] ?></p>
            <?php } ?>
            </div>
          </div>
          <!-- END CONTENT -->
        </div>
        <!-- END SIDEBAR & CONTENT -->
      </div>
    </div>

    <!-- BEGIN BRANDS -->
    <div class="brands">
      <div class="container">
            <div class="owl-carousel owl-carousel6-brands">
              <?php include("inc/brands.php") ?>
            </div>
        </div>
    </div>
    <!-- END BRANDS -->

    <!-- BEGIN STEPS -->
    <?php include("inc/footer.php") ?>
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

    <script src="assets/corporate/scripts/layout.js" type="text/javascript"></script>
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