<?php
  require '../../define.php';
  require ROOT_DIRECTORY.'/controllers/vendor/autoload.php';
  $side_bar = new SideBarInfo();
  include("../inc/header.php");
  $error = '';
  $message = '';
  if(isset($_POST['reset_password'])){
    $response = (new UserInfo())->reset_password();
    $error = $response->get_string_errors();
    $message = $response->get_string_messages();
    if($response->status == true){
      echo "<script>alert('Password change successful.')</script>";
    }

  }


?>
    <!-- Header END -->
    <div class="main">
      <div class="container">
        <ul class="breadcrumb">
            <li><a href="index.html">Home</a></li>
            <li><a href="">Store</a></li>
            <li class="active">Terms &amp; Conditions</li>
        </ul>
        <!-- BEGIN SIDEBAR & CONTENT -->
        <div class="row margin-bottom-40">
          <!-- BEGIN SIDEBAR -->
          <div class="sidebar col-md-3 col-sm-3">

          </div>
          <!-- END SIDEBAR -->

          <!-- BEGIN CONTENT -->
          <div class="col-md-9 col-sm-7">
            <h1>Change password</h1>
            <div class="content-form-page">
            <span style="color:red;"><?php echo $message; ?></span>
            <span style="color:red;"><?php echo $error; ?></span>
            <form role="form" class="form-horizontal form-without-legend" method="post">
              
            <div class="form-group">
                  <label class="col-lg-2 control-label">Old password <span class="require">*</span></label>
                  <div class="col-lg-8">
                    <input type="" id="" name="old_password" class="form-control">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-lg-2 control-label" >New password <span class="require">*</span></label>
                  <div class="col-lg-8">
                    <input type="password" id="password" name="new_password" class="form-control">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-lg-2 control-label" >Retype password <span class="require">*</span></label>
                  <div class="col-lg-8">
                    <input type="password" id="password" name="retype_password" class="form-control">
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-8 col-md-offset-2 padding-left-0 padding-top-20">
                    <button class="btn btn-primary" name="reset_password" type="submit">Reset Password</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
          <!-- END CONTENT -->
        </div>
        <!-- END SIDEBAR & CONTENT -->
      </div>
    </div>

    <!-- BEGIN BRANDS -->
<?php include("../inc/brands.php") ?>
<?php include("../inc/footer.php") ?>
 
   
    <!-- END FOOTER -->

    <!-- Load javascripts at bottom, this will reduce page load time -->
    <!-- BEGIN CORE PLUGINS(REQUIRED FOR ALL PAGES) -->
    <!--[if lt IE 9]>
    <script src="assets/plugins/respond.min.js"></script>  
    <![endif]-->  
    <script src="<?php echo SITE_URL?>/front/assets/plugins/jquery.min.js" type="text/javascript"></script>
    <script src="<?php echo SITE_URL?>/front/assets/plugins/jquery-migrate.min.js" type="text/javascript"></script>
    <script src="<?php echo SITE_URL?>/front/assets/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>      
    <script src="<?php echo SITE_URL?>/front/assets/corporate/scripts/back-to-top.js" type="text/javascript"></script>
    <script src="<?php echo SITE_URL?>/front/assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
    <!-- END CORE PLUGINS -->

    <!-- BEGIN PAGE LEVEL JAVASCRIPTS (REQUIRED ONLY FOR CURRENT PAGE) -->
    <script src="<?php echo SITE_URL?>/front/assets/plugins/fancybox/source/jquery.fancybox.pack.js" type="text/javascript"></script><!-- pop up -->
    <script src="<?php echo SITE_URL?>/front/assets/plugins/owl.carousel/owl.carousel.min.js" type="text/javascript"></script><!-- slider for products -->
    <script src="<?php echo SITE_URL?>/front/scriptForJs.js" type="text/javascript"></script>
    <script src="<?php echo SITE_URL?>/front/assets/corporate/scripts/layout.js" type="text/javascript"></script>
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