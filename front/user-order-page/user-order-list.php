<?php
require '../../define.php';
require ROOT_DIRECTORY . '/controllers/vendor/autoload.php';
include("../inc/header.php");

$side_bar = new SideBarInfo();
$orders = new Orders();
$user_order_history = $orders->get_user_order_history();
// echo "<pre>";
// print_r($user_order_info);
// echo "</pre>";

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
        <h1>Order history</h1>
        <div class="goods-page">
          <div class="goods-data clearfix">
            <div class="table-wrapper-responsive">
              <table>
                <tr>
                  <th>SL NO.</th>
                  <th>Order id</th>
                  <th>Quantity</th>
                  <th>Total</th>
                  <th>Date</th>
                  <th>Options</th>
                </tr>
                <?php

                // $sl_no = 0;
                // $product_quantity = 0;
                // $total_price = 0;
                // $name = '';
                // $shipping_cost = 0;
                // $eco_cost = 0;
                // $vat_rate = 0;
                // foreach ($user_order_info as $value) {

                //   $product_quantity += $value['quantity'];
                //   $total_price = $total_price + ($value['quantity'] * $value['price']);
                //   $name = $value['name'];
                //   $shipping_cost = $value['shipping_cost'];
                //   $eco_cost = $value['eco_cost'];
                //   $vat_rate = $value['vat'];
                //   $sl_no++;
                // }
                // $total_vat = $vat_rate / 100 * $total_price;
                // $total_price = $total_price + $total_vat + $shipping_cost + $eco_cost;
                $sl_no = 1;
                foreach ($user_order_history as $value) { ?>
                  <td><?php echo $sl_no; ?></td>
                  <td> <?php echo $value['id']; ?></td>
                  <td><?php echo $value['quantity']; ?></td>
                  <td>$ <?php echo $value['total_price']; ?></td>
                  <?php
                  $date = new DateTime($value['date']);
                  $formated_date = $date->format('d-m-y');
                  
                  ?>
                  <td><?php echo $formated_date; ?></td>
                  <td>
                    <a href="user-order-details.php?order_id=<?php echo $value['id'] ?> ">
                      <button>Details</button>
                    </a>
                  </td>
                  </tr>

                <?php  
                $sl_no++;
                
              }
                ?>

                <tr>



              </table>
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

<div class="popupElement">
  <div class="invoice">
    <div class="header">
      <div class="header-title">
        <h3>Invoice</h3>
      </div>
      <button id="printBtn" class="print-btn">Print</button>
    </div>
    <div class="company-info">
      <h2>super shop</h2>
      <p>Super Shop Compani LTD</p>
      <p>Kumarkhali</p>
      <p>Bangladesh</p>
      <p>7010</p>
    </div>
    <hr>
    <div class="invoice-info">
      <div class="left-col">
        <h5>Bill to :</h5>
        <h3>Company Name</h3>
        <p>Address</p>
        <p>City</p>
        <p>Country</p>
        <p>Postal</p>
      </div>
      <div class="right-col">
        <h5>Invoice No</h5>
        <p>123456</p>
        <h5>DATE</h5>
        <p>12/31/20</p>
        <h5>INVOICE DUE DATE</h5>
        <p>12/31/20</p>
      </div>
    </div>
    <div class="table-data">
      <table>
        <tr class="t-head">
          <th class="left">ITEMS</th>
          <th class="left">DESCRIPTION</th>
          <th>QUANTITY</th>
          <th>PRICE</th>
          <th>AMOUNT</th>
        </tr>
        <?php
        $subtotal = 0;
        $sl_no = 1;
        foreach ($user_order_history as $value) { ?>
          <tr>
            <td class="left">Item <?php echo $sl_no ?></td>
            <td class="left"><?php echo $value['product_name'] ?></td>
            <td><?php echo $value['quantity'] ?></td>
            <td>$<?php echo $value['price'] ?></td>
            <td>$<?php echo $value['quantity'] *  $value['price'] ?></td>
          </tr>
        <?php
          $subtotal = $subtotal + ($value['quantity'] *  $value['price']);
        }
        $sl_no++
        ?>
      </table>
    </div>
    <div class="total-info">
      <div class="left-col">
        <h3>Notes :</h3>
        <p>Add your notes here</p>
      </div>
      <div class="right-col">
        <table>
          <tr>
            <td>SUB-TOTAL</td>
            <td>$<?php echo $subtotal; ?></td>
          </tr>
          <tr>
            <td>TAX RATE</td>
            <td>$<?php echo $vat_rate; ?>%</td>
          </tr>
          <tr>
            <td>TAX</td>
            <td>$<?php echo $total_vat; ?></td>
          </tr>
          <tr>
            <td>SHIPPING COST</td>
            <td>$<?php echo $shipping_cost; ?></td>
          </tr>
          <tr>
            <td>ECO COST</td>
            <td>$<?php echo $eco_cost; ?></td>
          </tr>
          <tr>
            <td>TOTAL</td>
            <td>$<?php echo $subtotal + $shipping_cost + $eco_cost + $total_vat; ?></td>
          </tr>
        </table>
      </div>
    </div>
    <p>easyshop invoice</p>
  </div>
  <div class="close" style="opacity: .9;">
    <img src="images/close.png" id="closeBtn">
  </div>
</div>
<script>
  const btns = document.querySelectorAll('.btn');
  var popupElement = document.querySelector('.popupElement');
  const printBtn = document.getElementById('printBtn');
  const closeBtn = document.getElementById("closeBtn");


  function close_all_popup() {
    document.querySelectorAll(".popupElement").forEach(function(popElement) {
      popElement.classList.remove('remove-popup');
    });
  }

  btns.forEach(function(btn) {
    btn.onclick = function(e) {
      popupElement.style.visibility = 'visible';

      e.preventDefault();
      close_all_popup();

      var href = this.parentElement.getAttribute('href');
      var id = href.replace('#', '');
      var popElement = document.getElementById(id);
      popElement.classList.add('open-popup');
    }
  });
  closeBtn.onclick = function() {
    popupElement.classList.add("remove-popup");
    setTimeout(function() {
      popupElement.style.visibility = 'hidden';
    }, 200);

  }


  printBtn.onclick = function() {
    window.print()
  }
</script>

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