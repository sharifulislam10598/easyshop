<?php
require '../../define.php';
require ROOT_DIRECTORY . '/controllers/vendor/autoload.php';
$side_bar = new SideBarInfo();
include("../inc/header.php");
// user delivery address save and update script*********************************
$delivery_details = new DeliveryDetails();
$error = '';
$success_message = '';
if (isset($_POST['save'])) {
  $response = $delivery_details->save();
  if ($response->status == true) {
    $success_message = $response->get_string_messages();
  } else {
    $error = $response->get_string_errors();
  }
}

if(isset($_POST['update'])){
  $response = $delivery_details->delivery_info_update();
  if($response->status == true){
    $success_message = $response->get_string_messages();
  }else{
    $error = $response->get_string_errors();
  }
}
// ***********************************************************
$cart = new Cart();
$carted_item = $cart->get_carted_item();
$user_delivery_details = (new DeliveryDetails())->get_delivery_details();

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
        <div class="content-form-page">
          <div class="panel-body row">
            <h1 style="margin-bottom: 30px;">address book modify</h1>
            <div id="shipping-address" class="panel panel-default">
              <div class="panel-heading">
                <p style="text-align:center;">
                  <?php echo $error ?>
                  <?php echo $success_message ?>
                </p>
              </div>
              <div id="shipping-address-content" class="panel-collapse collapse in">
                <div class="panel-body row">
                  <form method="post">

                    <?php
                    if ($user_delivery_details == true) { ?>
                      <div class="col-md-6 col-sm-6">
                        <div class="form-group">
                          <label for="firstname-dd">First Name <span class="require">*</span></label>
                          <input type="text" id="firstname-dd" name="first_name" value="<?php echo $user_delivery_details['first_name'] ?>" class="form-control">
                        </div>
                        <div class="form-group">
                          <label for="lastname-dd">Last Name <span class="require">*</span></label>
                          <input type="text" id="lastname-dd" value="<?php echo $user_delivery_details['last_name'] ?>" name="last_name" class="form-control">
                        </div>
                        <div class="form-group">
                          <label for="email-dd">E-Mail <span class="require">*</span></label>
                          <input type="text" id="email-dd" name="email" value="<?php echo $user_delivery_details['email'] ?>" class="form-control">
                        </div>
                        <div class="form-group">
                          <label for="telephone-dd">Telephone <span class="require">*</span></label>
                          <input type="text" id="telephone-dd" value="<?php echo $user_delivery_details['telephone'] ?>" name="telephone" class="form-control">
                        </div>
                        <div class="form-group">
                          <label for="fax-dd">Fax</label>
                          <input type="text" id="fax-dd" value="<?php echo $user_delivery_details['fax'] ?>" name="fax" class="form-control">
                        </div>
                        <div class="form-group">
                          <label for="company-dd">Company</label>
                          <input type="text" id="company-dd" value="<?php echo $user_delivery_details['company'] ?>" name="company" class="form-control">
                        </div>
                      </div>
                      <div class="col-md-6 col-sm-6">
                        <div class="form-group">
                          <label for="address1-dd">Address 1</label>
                          <input type="text" id="address1-dd" value="<?php echo $user_delivery_details['address_1'] ?>" name="address_1" class="form-control">
                        </div>
                        <div class="form-group">
                          <label for="address2-dd">Address 2</label>
                          <input type="text" id="address2-dd" value="<?php echo $user_delivery_details['address_2'] ?>" name="address_2" class="form-control">
                        </div>
                        <div class="form-group">
                          <label for="city-dd">City <span class="require">*</span></label>
                          <input type="text" id="city-dd" value="<?php echo $user_delivery_details['city'] ?>" name="city" class="form-control">
                        </div>
                        <div class="form-group">
                          <label for="post-code-dd">Post Code <span class="require">*</span></label>
                          <input type="text" id="post-code-dd" value="<?php echo $user_delivery_details['post_code'] ?>" name="post_code" class="form-control">
                        </div>
                        <div class="form-group">
                          <label for="country-dd">Country <span class="require">*</span></label>
                          <select class="form-control input-sm" name="country" id="country-dd">
                            <option value=""> --- Please Select --- </option>
                            <option <?php if ($user_delivery_details['country'] == 244) {
                                      echo 'selected';
                                    } ?> value="244">Aaland Islands</option>
                            <option <?php if ($user_delivery_details['country'] == 1) {
                                      echo 'selected';
                                    } ?> value="1">Afghanistan</option>
                            <option <?php if ($user_delivery_details['country'] == 2) {
                                      echo 'selected';
                                    } ?> value="2">Albania</option>
                          </select>
                        </div>
                        <div class="form-group">
                          <label for="region-state-dd">Region/State <span class="require">*</span></label>
                          <select class="form-control input-sm" name="region" id="region-state-dd">
                            <option value=""> --- Please Select --- </option>
                            <option <?php if ($user_delivery_details['region'] == 3513) {
                                      echo 'selected';
                                    } ?> value="3513">Aberdeen</option>
                            <option <?php if ($user_delivery_details['region'] == 3514) {
                                      echo 'selected';
                                    } ?> value="3514">Aberdeenshire</option>
                            <option <?php if ($user_delivery_details['region'] == 3515) {
                                      echo 'selected';
                                    } ?> value="3515">Anglesey</option>
                            <option <?php if ($user_delivery_details['region'] == 3516) {
                                      echo 'selected';
                                    } ?> value="3516">Angus</option>
                          </select>
                          <input type="hidden" name="id" value="<?php echo $user_delivery_details['id']; ?>">
                        </div>
                      </div>
                      <div class="col-md-12">
                        <button class="btn btn-primary pull-right" name="update" type="submit"data-toggle="collapse" data-parent="#checkout-page" data-target="#shipping-method-content">Update</button>
                      </div>

                    <?php } else { ?>

                      <div class="col-md-6 col-sm-6">
                        <div class="form-group">
                          <label for="firstname-dd">First Name <span class="require">*</span></label>
                          <input type="text" id="firstname-dd" name="first_name" value="" class="form-control">
                        </div>
                        <div class="form-group">
                          <label for="lastname-dd">Last Name <span class="require">*</span></label>
                          <input type="text" id="lastname-dd" value="" name="last_name" class="form-control">
                        </div>
                        <div class="form-group">
                          <label for="email-dd">E-Mail <span class="require">*</span></label>
                          <input type="text" id="email-dd" name="email" value="" class="form-control">
                        </div>
                        <div class="form-group">
                          <label for="telephone-dd">Telephone <span class="require">*</span></label>
                          <input type="text" id="telephone-dd" value="" name="telephone" class="form-control">
                        </div>
                        <div class="form-group">
                          <label for="fax-dd">Fax</label>
                          <input type="text" id="fax-dd" value="" name="fax" class="form-control">
                        </div>
                        <div class="form-group">
                          <label for="company-dd">Company</label>
                          <input type="text" id="company-dd" value="" name="company" class="form-control">
                        </div>
                      </div>
                      <div class="col-md-6 col-sm-6">
                        <div class="form-group">
                          <label for="address1-dd">Address 1</label>
                          <input type="text" id="address1-dd" value="" name="address_1" class="form-control">
                        </div>
                        <div class="form-group">
                          <label for="address2-dd">Address 2</label>
                          <input type="text" id="address2-dd" value="" name="address_2" class="form-control">
                        </div>
                        <div class="form-group">
                          <label for="city-dd">City <span class="require">*</span></label>
                          <input type="text" id="city-dd" value="" name="city" class="form-control">
                        </div>
                        <div class="form-group">
                          <label for="post-code-dd">Post Code <span class="require">*</span></label>
                          <input type="text" id="post-code-dd" value="" name="post_code" class="form-control">
                        </div>
                        <div class="form-group">
                          <label for="country-dd">Country <span class="require">*</span></label>
                          <select class="form-control input-sm" name="country" id="country-dd">
                            <option value=""> --- Please Select --- </option>
                            <option value="244">Aaland Islands</option>
                            <option value="1">Afghanistan</option>
                            <option value="2">Albania</option>
                          </select>
                        </div>
                        <div class="form-group">
                          <label for="region-state-dd">Region/State <span class="require">*</span></label>
                          <select class="form-control input-sm" name="region" id="region-state-dd">
                            <option value=""> --- Please Select --- </option>
                            <option value="3513">Aberdeen</option>
                            <option value="3514">Aberdeenshire</option>
                            <option value="3515">Anglesey</option>
                            <option value="3516">Angus</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-md-12">
                        <button class="btn btn-primary pull-right" name="save" type="submit" data-toggle="collapse" data-parent="#checkout-page" data-target="#shipping-method-content">Save</button>
                      </div>

                    <?php } ?>
                  </form>

                </div>
              </div>
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
<?php include("../inc/footer.php") ?>


<!-- END FOOTER -->

<!-- Load javascripts at bottom, this will reduce page load time -->
<!-- BEGIN CORE PLUGINS(REQUIRED FOR ALL PAGES) -->
<!--[if lt IE 9]>
    <script src="assets/plugins/respond.min.js"></script>  
    <![endif]-->
<script src="<?php echo SITE_URL ?>/front/assets/plugins/jquery.min.js" type="text/javascript"></script>
<script src="<?php echo SITE_URL ?>/front/assets/plugins/jquery-migrate.min.js" type="text/javascript"></script>
<script src="<?php echo SITE_URL ?>/front/assets/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>

<script src="<?php echo SITE_URL ?>/front/scriptForJs.js" type="text/javascript"></script>
<script src="<?php echo SITE_URL ?>/front/assets/corporate/scripts/back-to-top.js" type="text/javascript"></script>
<script src="<?php echo SITE_URL ?>/front/assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<!-- END CORE PLUGINS -->

<!-- BEGIN PAGE LEVEL JAVASCRIPTS (REQUIRED ONLY FOR CURRENT PAGE) -->
<script src="<?php echo SITE_URL ?>/front/assets/plugins/fancybox/source/jquery.fancybox.pack.js" type="text/javascript"></script><!-- pop up -->
<script src="<?php echo SITE_URL ?>/front/assets/plugins/owl.carousel/owl.carousel.min.js" type="text/javascript"></script><!-- slider for products -->

<script src="<?php echo SITE_URL ?>/front/assets/corporate/scripts/layout.js" type="text/javascript"></script>
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