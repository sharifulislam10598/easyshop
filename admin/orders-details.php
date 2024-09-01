<?php include('C:\xampp\htdocs\easyshop\admin\inc\header.php');
$ordered_product = new OrderedProduct();
$user_tax_info = new UserTaxInfo();
$order_address = new OrderAddress();
?>
<div class="main-panel">
  <div class="content-wrapper">
    <div class="page-header">
      <h3 class="page-title">
        Invoice
      </h3>
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="#">Sample pages</a></li>
          <li class="breadcrumb-item active" aria-current="page">Invoice</li>
        </ol>
      </nav>
    </div>
    <div class="row">
      <div class="col-lg-12">
        <div class="card px-2">
          <div class="card-body">
            <div class="container-fluid">
              <h3 class="text-right my-5">Invoice&nbsp;&nbsp;#INV-17</h3>
              <hr>
            </div>
            <div class="container-fluid d-flex justify-content-between">
              <div class="col-lg-3 pl-0">
                <p class="mt-5 mb-2"><b>Melody Admin</b></p>
                <p>104,<br>Minare SK,<br>Canada, K1A 0G9.</p>
              </div>
              <div class="col-lg-3 pr-0">
                <p class="mt-5 mb-2 text-right"><b>Invoice to</b></p>
                <?php
                $address = $order_address->get_order_address();
                ?>
                <p class="text-right"><?php echo $address['company']; ?>,<br> <?php echo $address['address_1']; ?>,<?php echo $address['address_2']; ?><br> <?php echo $address['city']; ?>,<br> <?php if ($address['country'] == 244) {
                                                                                                                                                                                                    echo 'Aaland Islands';
                                                                                                                                                                                                  } elseif ($address['country'] == 1) {
                                                                                                                                                                                                    echo 'Afghanistan';
                                                                                                                                                                                                  } elseif ($address['country'] == 1) {
                                                                                                                                                                                                    echo 'Albania';
                                                                                                                                                                                                  } ?></p>
              </div>
            </div>
            <div class="container-fluid d-flex justify-content-between">
              <div class="col-lg-3 pl-0">
                <p class="mb-0 mt-5">Invoice Date : 23rd Jan 2016</p>
                <p>Due Date : 25th Jan 2017</p>
              </div>
            </div>
            <div class="container-fluid mt-5 d-flex justify-content-center w-100">
              <div class="table-responsive w-100">
                <table class="table">
                  <thead>
                    <tr class="bg-dark text-white">
                      <th>#</th>
                      <th>Description</th>
                      <th>Color</th>
                      <th>Size</th>
                      <th class="text-right">Quantity</th>
                      <th class="text-right">Unit cost</th>
                      <th class="text-right">Total</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $product_info = $ordered_product->get_user_order_history();
                    $subtotal = 0;
                    $sl = 1;
                    foreach ($product_info as $value) { ?>
                      <tr class="text-right">
                        <td class="text-left"><?php echo $sl ?></td>
                        <td class="text-left"><?php echo $value['product_name']; ?></td>
                        <td><?php echo $value['color']; ?></td>
                        <td><?php echo $value['size']; ?></td>
                        <td><?php echo $value['quantity']; ?></td>
                        <td>$<?php echo $value['price']; ?></td>
                        <td>$ <?php echo $value['quantity'] *  $value['price']; ?></td>
                      </tr>
                    <?php
                      $subtotal = $subtotal + ($value['quantity'] *  $value['price']);
                      $sl++;
                    }

                    ?>
                  </tbody>
                </table>
              </div>
            </div>
            <div class="container-fluid mt-5 w-100">
              <?php
              $tax_info = $user_tax_info->get_user_tax_info();
              $tax_rate = $tax_info['vat'];
              $tax = ($tax_info['vat'] / 100) * $subtotal;
              $shipping_cost = $tax_info['shipping_cost'];
              $eco_cost = $tax_info['eco_cost'];
              $total = $tax + $shipping_cost + $eco_cost + $subtotal;
              ?>
              <p class="text-right mb-2">Sub - Total amount: $<?php echo $subtotal; ?></p>
              <p class="text-right">vat (<?php echo $tax_rate; ?>) : $<?php echo $tax; ?></p>
              <p class="text-right">shipping cost : $<?php echo $shipping_cost; ?></p>
              <p class="text-right">Eco cost : $<?php echo $eco_cost; ?></p>
              <h4 class="text-right mb-5">Total : $<?php echo $total; ?></h4>
              <hr>
            </div>
            <div class="container-fluid w-100">
              <a href="#" class="btn btn-primary float-right mt-4 ml-2"><i class="fa fa-print mr-1"></i>Print</a>
              <a href="#" class="btn btn-success float-right mt-4"><i class="fa fa-share mr-1"></i>Send Invoice</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- content-wrapper ends -->
  <!-- partial:../../partials/_footer.html -->
  <footer class="footer">
    <div class="d-sm-flex justify-content-center justify-content-sm-between">
      <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2018 <a href="https://www.urbanui.com/" target="_blank">Urbanui</a>. All rights reserved.</span>
      <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with <i class="far fa-heart text-danger"></i></span>
    </div>
  </footer>
  <!-- partial -->
</div>
<!-- main-panel ends -->
</div>
<!-- page-body-wrapper ends -->
</div>
<!-- container-scroller -->


<!-- plugins:js -->
<script src="http://localhost/easyshop/admin/vendors/js/vendor.bundle.base.js"></script>
<script src="http://localhost/easyshop/admin/vendors/js/vendor.bundle.addons.js"></script>
<!-- endinject -->
<!-- inject:js -->
<script src="http://localhost/easyshop/admin/js/off-canvas.js"></script>
<script src="http://localhost/easyshop/admin/js/hoverable-collapse.js"></script>
<script src="http://localhost/easyshop/admin/js/misc.js"></script>
<script src="http://localhost/easyshop/admin/js/settings.js"></script>
<script src="http://localhost/easyshop/admin/js/todolist.js"></script>
<!-- endinject -->
<!-- Custom js for this page-->
<script src="http://localhost/easyshop/admin/js/data-table.js"></script>
<!-- End custom js for this page-->
</body>


<!-- Mirrored from www.urbanui.com/melody/template/pages/tables/data-table.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 15 Sep 2018 06:08:41 GMT -->

</html>