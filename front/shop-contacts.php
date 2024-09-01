<?php
  require '../define.php';
  require ROOT_DIRECTORY.'/controllers/vendor/autoload.php';
  
  $side_bar = new SideBarInfo();
  $contacts_info = new Contacts();
  include("inc/header.php");
?>
    <!-- Header END -->

    <div class="main">
      <div class="container">
        <ul class="breadcrumb">
            <li><a href="index.html">Home</a></li>
            <li><a href="">Pages</a></li>
            <li class="active">Contact</li>
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

            <h2>Our Contacts</h2>
            <address>
              <?php echo $contacts_info->address ?><br>
              <abbr title="Phone">P:</abbr> <?php echo $contacts_info->phone ?><br>
            </address>
            <address>
              <strong>Email</strong><br>
              <a href="<?php echo $contacts_info->email_link ?>"><?php echo $contacts_info->email ?></a><br>
              <a href="<?php echo $contacts_info->email_2_link ?>"><?php echo $contacts_info->email_2 ?></a>
            </address>
            <ul class="social-icons margin-bottom-10">
            <?php foreach($contacts_info->social_icon as $icon){?>
              <li><a href="<?php echo $icon['link'] ?>" data-original-title="<?php echo $icon['title'] ?>" class="<?php echo $icon['class'] ?>"></a></li>
              <?php } ?>
            </ul>
          </div>
          <!-- END SIDEBAR -->

          <!-- BEGIN CONTENT -->
          <div class="col-md-9 col-sm-9">
            <h1>Contact</h1>
            <div class="content-page">
              <div id="map" class="gmaps margin-bottom-40" style="height:400px;"></div>

              <h2>Contact Form</h2>
              <p>Lorem ipsum dolor sit amet, Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat consectetuer adipiscing elit, sed diam nonummy nibh euismod tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.</p>
              
              <!-- BEGIN FORM-->
              <form action="#" class="default-form" role="form">
                <div class="form-group">
                  <label for="name">Name</label>
                  <input type="text" class="form-control" id="name">
                </div>
                <div class="form-group">
                  <label for="email">Email <span class="require">*</span></label>
                  <input type="text" class="form-control" id="email">
                </div>
                <div class="form-group">
                  <label for="message">Message</label>
                  <textarea class="form-control" rows="8" id="message"></textarea>
                </div>
                <div class="padding-top-20">                  
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
              <!-- END FORM-->          
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
    <script src='assets/plugins/zoom/jquery.zoom.min.js' type="text/javascript"></script><!-- product zoom -->
    <script src="assets/plugins/bootstrap-touchspin/bootstrap.touchspin.js" type="text/javascript"></script><!-- Quantity -->
    <script src="assets/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
    <script src="http://maps.google.com/maps/api/js?sensor=true" type="text/javascript"></script>
    <script src="assets/plugins/gmaps/gmaps.js" type="text/javascript"></script>
    <script src="assets/pages/scripts/contact-us.js" type="text/javascript"></script>

    <script src="assets/corporate/scripts/layout.js" type="text/javascript"></script>
    <script type="text/javascript">
        jQuery(document).ready(function() {
            Layout.init();    
            Layout.initOWL();
            Layout.initTwitter();
            Layout.initImageZoom();
            Layout.initTouchspin();
            Layout.initUniform();
            ContactUs.init();
        });
    </script>
    <!-- END PAGE LEVEL JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>