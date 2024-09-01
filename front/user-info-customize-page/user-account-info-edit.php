<?php
require '../../define.php';
require ROOT_DIRECTORY . '/controllers/vendor/autoload.php';
$side_bar = new SideBarInfo();
include("../inc/header.php");

$user_info = new UserInfo();
if (isset($_POST['save_changes'])) {
  $response = $user_info->user_account_info_update();
  if ($response->status == false) {
    echo "information not updated.";
  }
}
$user_account_info = $user_info->get_user_account_info();

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
        <h1>Account Information Update</h1>
        <div class="content-form-page">
          <form role="form" class="form-horizontal form-without-legend" method="post">
            <div class="form-group">
              <label class="col-lg-2 control-label" for="first-name">User Name <span class="require">*</span></label>
              <div class="col-lg-8">
                <input type="text" id="first-name" name="name" value="<?php echo $user_account_info['name'] ?>" class="form-control">
              </div>
            </div>
            <div class="form-group">
              <label class="col-lg-2 control-label" for="email">E-Mail <span class="require">*</span></label>
              <div class="col-lg-8">
                <input type="text" id="email" name="email" value="<?php echo $user_account_info['email'] ?>" class="form-control">
              </div>
            </div>
        </div>
        <div class="row">
          <div class="col-lg-8 col-md-offset-2 padding-left-0 padding-top-20">
            <button class="btn btn-primary" name="save_changes" type="submit">Save Changes</button>
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