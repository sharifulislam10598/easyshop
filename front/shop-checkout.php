<?php
require '../define.php';
require ROOT_DIRECTORY . '/controllers/vendor/autoload.php';
include("inc/header.php");
// prevent none loging user...........
if (!isset($_SESSION['session_id'])) {
  $_SESSION['redirect_url'] = $_SERVER['REQUEST_URI'];
  header('location:' . SITE_URL . '/front/shop-login.php');
  exit();
}
//--------------------------------

$shipping_method_list = (new DeliveryMethodList())->get_delivery_method_list();

$delivery_method = new DeliveryMethod();


$tax_charges = new TaxCharges();
$tax = $tax_charges->get_tax_charge_list();
$eco_cost = 0;
$vat_rate = 0;
foreach ($tax as $value) {
  if ($value['taxes'] == 'eco tax') {
    $eco_cost = $value['rate'];
  }
  if ($value['taxes'] == 'vat') {
    $vat_rate = $value['rate'];
  }
}

$shipping_method = $delivery_method->get_shipping_method_info();
$shipping_cost = 0;
if ($shipping_method) {
  $shipping_cost = $shipping_method['shipping_cost'];
}

$delivery_details = new DeliveryDetails();
$order_address = new OrderAddress();
$order = new Orders();
$user_tax_info = new UserTaxInfo();

$order_product = new OrderedProduct();
$cart = new Cart();
$carted_item = $cart->get_carted_item();


if (isset($_GET['confirm'])) {
  $response = $order->save_order($_SESSION['session_id'], $_GET['quantity'], $_GET['total_price']);
  $order_id = $response->data['last_insert_id'];

  $carted_item = $cart->get_carted_item();
  foreach ($carted_item as $value) {
    $order_product->save_ordered_product_info($_SESSION['session_id'],$order_id, $value['product_id'], $value['size'], $value['color'], $value['quantity']);
  }

  $address = $delivery_details->get_delivery_details();
  $error =  $order_address->save_order_address($order_id,$address['first_name'],$address['last_name'], $address['email'], $address['telephone'], $address['fax'], $address['company'], $address['address_1'], $address['address_2'], $address['city'], $address['post_code'], $address['country'], $address['region']);

  $user_tax_info->save_user_tax_info($_SESSION['session_id'], $order_id, $shipping_cost, $eco_cost, $vat_rate);


  $cart->remove();
  header('location:' . SITE_URL . '/front/order-successful.php');
  $delivery_method->delete_user_delivery_method();
}

?>
<!-- Header END -->

<div class="main">
  <div class="container">
    <ul class="breadcrumb">
      <li><a href="index.html">Home</a></li>
      <li><a href="">Store</a></li>
      <li class="active">Checkout</li>
    </ul>
    <!-- BEGIN SIDEBAR & CONTENT -->
    <div class="row margin-bottom-40">
      <!-- BEGIN CONTENT -->
      <div class="col-md-12 col-sm-12">
        <h1>Checkout</h1>
        <!-- BEGIN CHECKOUT PAGE -->
        <div class="panel-group checkout-page accordion scrollable" id="checkout-page">

          <?php
          if ($carted_item == true) { ?>
            <!-- BEGIN SHIPPING ADDRESS -->
            <div id="shipping-address" class="panel panel-default">
              <div class="panel-heading">
                <h2 class="panel-title">
                  <a data-toggle="collapse" data-parent="#checkout-page" href="#shipping-address-content" class="accordion-toggle">
                    Step 1: Delivery Details
                  </a>
                </h2>
              </div>
              <div id="shipping-address-content" class="panel-collapse collapse in">
                <div class="panel-body row">

                  <form class="delivery-details-form">

                    <?php
                    $user_delivery_details = $delivery_details->get_delivery_details();
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
                        </div>
                      </div>
                      <div class="col-md-12">
                        <button class="btn btn-primary pull-right" type="submit" id="button-shipping-address" data-toggle="collapse" data-parent="#checkout-page" data-target="#shipping-method-content">Continue</button>
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
                        <button class="btn btn-primary pull-right" type="submit" id="button-shipping-address" data-toggle="collapse" data-parent="#checkout-page" data-target="#shipping-method-content">Continue</button>
                      </div>

                    <?php } ?>
                  </form>

                </div>
              </div>
            </div>
            <!-- END SHIPPING ADDRESS -->

            <!-- BEGIN SHIPPING METHOD -->
            <div id="shipping-method" class="panel panel-default">
              <div class="panel-heading">
                <h2 class="panel-title">
                  <a data-toggle="collapse" data-parent="#checkout-page" href="#shipping-method-content" class="accordion-toggle">
                    Step 4: Delivery Method
                  </a>
                </h2>
              </div>
              <div id="shipping-method-content" class="panel-collapse collapse">
                <div class="panel-body row">
                  <div class="col-md-12">
                    <form class="shipping-method-form">
                      <p>Please select the preferred shipping method to use on this order.</p>

                      <select name="method" style="background-color: white;border:1px solid grey;">
                        <?php
                        foreach ($shipping_method_list as $value) { ?>
                          <option value="<?php echo $value['method'] ?>"><?php echo $value['method'] ?> - shipping cost : $<?php echo $value['shipping_cost'] ?> </option>
                        <?php } ?>

                      </select>
                      <div class="form-group">
                        <label for="delivery-comments">Add Comments About Your Order</label>
                        <textarea id="delivery-comments" name="comments" rows="8" class="form-control"></textarea>
                      </div>
                      <button class="btn btn-primary  pull-right" type="submit" id="button-shipping-method" data-toggle="collapse" data-parent="#checkout-page" data-target="#payment-method-content">Continue</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
            <!-- END SHIPPING METHOD -->

            <!-- BEGIN PAYMENT METHOD -->
            <div id="payment-method" class="panel panel-default">
              <div class="panel-heading">
                <h2 class="panel-title">
                  <a data-toggle="collapse" data-parent="#checkout-page" href="#payment-method-content" class="accordion-toggle">
                    Step 3: Payment Method
                  </a>
                </h2>
              </div>
              <div id="payment-method-content" class="panel-collapse collapse">
                <div class="panel-body row">
                  <div class="col-md-12">
                    <p>Please select the preferred payment method to use on this order.</p>
                    <div>
                    </div>
                    <div class="form-group">
                      <label for="delivery-payment-method">Add Comments About Your Order</label>
                      <textarea id="delivery-payment-method" rows="8" class="form-control"></textarea>
                    </div>
                    <button class="btn btn-primary  pull-right" type="submit" id="button-payment-method" data-toggle="collapse" data-parent="#checkout-page" data-target="#confirm-content">Continue</button>
                    <div class="checkbox pull-right">
                      <label>
                        <input type="checkbox"> I have read and agree to the <a title="Terms & Conditions" href="javascript:;">Terms & Conditions </a> &nbsp;&nbsp;&nbsp;
                      </label>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- END PAYMENT METHOD -->

            <!-- BEGIN CONFIRM -->
            <div id="confirm" class="panel panel-default">
              <div class="panel-heading">
                <h2 class="panel-title">
                  <a data-toggle="collapse" data-parent="#checkout-page" href="#confirm-content" class="accordion-toggle">
                    Step 4: Confirm Order
                  </a>
                </h2>
              </div>
              <div id="confirm-content" class="panel-collapse collapse">
                <div class="panel-body row">
                  <div class="col-md-12 clearfix">
                    <?php
                    $carted_item = (new Cart())->get_carted_item();
                    if ($carted_item == true) { ?>
                      <div class="table-wrapper-responsive">
                        <table>
                          <tr>
                            <th class="checkout-image">Image</th>
                            <th class="checkout-description">Description</th>
                            <th class="checkout-model">Model</th>
                            <th class="checkout-quantity">Quantity</th>
                            <th class="checkout-price">Price</th>
                            <th class="checkout-total">Total</th>
                          </tr>
                          <?php
                          $sub_total = 0;
                          $shipping_cost = $shipping_cost;
                          $eco_cost = $eco_cost;
                          $vat = 0;
                          $vat_par_hundred = $vat_rate;
                          $total = 0;
                          $quantity = 0;
                          foreach ($carted_item as $index => $value) { ?>

                            <tr>
                              <td class="checkout-image">
                                <a href="javascript:;"><img src="<?php echo SITE_URL . '/' . $value['items_img'] ?>"></a>
                              </td>
                              <td class="checkout-description">
                                <h3><a href="javascript:;"><?php echo $value['items_name'] ?></a></h3>
                                <p><strong>Item <?php echo $index + 1 ?></strong> - Color: <?php echo $value['color'] ?>; Size: <?php echo $value['size'] ?></p>
                                <em>More info is here</em>
                              </td>
                              <td class="checkout-model">RES.193</td>
                              <td class="checkout-quantity"><?php echo $value['quantity'] ?></td>
                              <td class="checkout-price"><strong><span>$</span><?php echo $value['price'] ?></strong></td>
                              <td class="checkout-total"><strong><span>$</span><?php echo $value['price'] *  $value['quantity'] ?></strong></td>
                            </tr>
                          <?php
                            $quantity = $quantity + $value['quantity'];
                            $sub_total = $sub_total + ($value['price'] *  $value['quantity']);
                            $vat =  ($vat_par_hundred / 100) * $sub_total;
                            $total = $sub_total + $shipping_cost + $eco_cost + $vat;
                          } ?>

                        </table>
                      </div>
                      <div class="checkout-total-block">
                        <ul>
                          <li>
                            <em>Sub total</em>
                            <strong class="price"><span>$</span><?php echo $sub_total; ?></strong>
                          </li>
                          <li>
                            <em>Shipping cost</em>
                            <strong class="price"><span>$</span><?php echo $shipping_cost; ?></strong>
                          </li>
                          <li>
                            <em>Eco Tax</em>
                            <strong class="price"><span>$</span><?php echo $eco_cost; ?></strong>
                          </li>
                          <li>
                            <em>VAT (<?php echo $vat_rate ?> %)</em>
                            <strong class="price"><span>$</span><?php echo $vat; ?></strong>
                          </li>
                          <li class="checkout-total-price">
                            <em>Total</em>
                            <strong class="price"><span>$</span><?php echo $total; ?></strong>
                          </li>
                        </ul>
                      </div>
                      <div class="clearfix"></div>
                      <a href="<?php echo SITE_URL ?>/front/shop-checkout.php?confirm=true&total_price=<?php echo $total ?>&quantity=<?php echo $quantity ?>">
                        <button class="btn btn-primary pull-right" name="confirm" type="submit" id="button-confirm">Confirm Order</button>
                      </a>
                      <button type="button" class="btn btn-default pull-right margin-right-20">Cancel</button>

                    <?php  } else { ?>
                      <div style="height: 50vh;">
                        <h3 style="text-align: center; color:red;">No product here !</h3>
                      </div>
                    <?php  } ?>
                  </div>
                </div>
              </div>
            </div>
            <!-- END CONFIRM -->

          <?php  } else { ?>
            <div style="height: 50vh;">
              <h3 style="text-align: center;color: red;">Please add some product !</h3>
            </div>
          <?php } ?>
        </div>
        <!-- END CHECKOUT PAGE -->
      </div>
      <!-- END CONTENT -->
    </div>
    <!-- END SIDEBAR & CONTENT -->
  </div>
</div>

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
<script src="front/assets/plugins/fancybox/source/jquery.fancybox.pack.js" type="text/javascript"></script>pop up
<script src="assets/plugins/owl.carousel/owl.carousel.min.js" type="text/javascript"></script>slider for products
<script src="assets/plugins/zoom/jquery.zoom.min.js" type="text/javascript"></script><!-- product zoom -->
<script src="assets/plugins/bootstrap-touchspin/bootstrap.touchspin.js" type="text/javascript"></script><!-- Quantity -->
<script src="assets/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>

<script src="assets/corporate/scripts/layout.js" type="text/javascript"></script>
<script src="assets/pages/scripts/checkout.js" type="text/javascript"></script>
<script src="<?php echo SITE_URL ?>/front/scriptForJs.js" type="text/javascript"></script>
<script type="text/javascript">
  jQuery(document).ready(function() {
    Layout.init();
    Layout.initOWL();
    Layout.initTwitter();
    Layout.initImageZoom();
    Layout.initTouchspin();
    Layout.initUniform();
    Checkout.init();
  });
</script>
<!-- END PAGE LEVEL JAVASCRIPTS -->
</body>
<!-- END BODY -->

</html>