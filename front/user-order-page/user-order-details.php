<?php
require '../../define.php';
require ROOT_DIRECTORY . '/controllers/vendor/autoload.php';
include("../inc/header.php");

$side_bar = new SideBarInfo();
$ordered_product = new OrderedProduct();
$user_tax_info = new UserTaxInfo();
$order_address = new OrderAddress();

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
                <ul class="list-group margin-bottom-25 sidebar-menu">
                    <?php foreach ($side_bar->side_bar as $value) { ?>
                        <li class="list-group-item clearfix"><a href="<?php echo $value['link'] ?>"><i class="fa fa-angle-right"></i><?php echo $value['name'] ?></a></li>
                    <?php } ?>
                </ul>
            </div>
            <!-- END SIDEBAR -->

            <!-- BEGIN CONTENT -->
            <div class="col-md-9 col-sm-7">
                <h1>Order details</h1>
                <div class="goods-page">
                    <div class="goods-data clearfix">
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
                                    <?php
                                    $address = $order_address->get_order_address();
                                    ?>
                                    <div class="left-col">
                                        <h5>Bill to :</h5>
                                        <h3><?php echo $address['company'] ?></h3>
                                        <p><?php echo $address['address_1'] . ',' . $address['address_2'] ?></p>
                                        <p><?php echo $address['city'] ?></p>
                                        <p><?php if ($address['country'] == 244) {
                                                echo 'Aaland Islands';
                                            } elseif ($address['country'] == 1) {
                                                echo 'Afghanistan';
                                            } elseif ($address['country'] == 1) {
                                                echo 'Albania';
                                            } ?></p>
                                        <p><?php echo $address['post_code'] ?></p>
                                    </div>
                                    <div class="right-col">
                                        <h5>Invoice No</h5>
                                        <p><?php echo $address['order_id'] ?></p>
                                        <h5>DATE</h5>
                                        <p>12/31/20</p>
                                        <h5>INVOICE DUE DATE</h5>
                                        <p>12/31/20</p>
                                    </div>
                                </div>
                                <div class="table-data">
                                    <table>
                                        <tr style="width: 100%;" class="t-head">
                                            <th style="text-align: center;">ITEMS</th>
                                            <th style="text-align: center;">DESCRIPTION</th>
                                            <th style="text-align: center;">color</th>
                                            <th style="text-align: center;">size</th>
                                            <th style="text-align: center;">QUANTITY</th>
                                            <th style="text-align: center;">PRICE</th>
                                            <th style="text-align: center;">AMOUNT</th>
                                        </tr>
                                        <?php
                                        $product_info = $ordered_product->get_user_order_history();
                                        $subtotal = 0;
                                        $sl = 1;
                                        foreach ($product_info as $value) { ?>
                                            <tr>
                                                <td style="text-align: center;">Item <?php echo $sl ?></td>
                                                <td style="text-align: center; "><?php echo $value['product_name'] ?></td>
                                                <td style="text-align: center;"><?php echo $value['color'] ?></td>
                                                <td style="text-align: center;"><?php echo $value['size'] ?></td>
                                                <td style="text-align: center;"><?php echo $value['quantity'] ?></td>
                                                <td style="text-align: center;">$<?php echo $value['price'] ?></td>
                                                <td style="text-align: center;">$<?php echo $value['quantity'] *  $value['price'] ?></td>
                                            </tr>
                                        <?php
                                            $subtotal = $subtotal + ($value['quantity'] *  $value['price']);
                                            $sl++;
                                        }

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
                                            <?php
                                            $tax_info = $user_tax_info->get_user_tax_info();
                                            $tax_rate = $tax_info['vat'];
                                            $tax = ($tax_info['vat'] / 100) * $subtotal;
                                            $shipping_cost = $tax_info['shipping_cost'];
                                            $eco_cost = $tax_info['eco_cost'];
                                            $total = $tax + $shipping_cost + $eco_cost + $subtotal;
                                            ?>
                                            <tr>
                                                <td>SUB-TOTAL</td>
                                                <td style="text-align: center;">$<?php echo $subtotal; ?></td>
                                            </tr>
                                            <tr>
                                                <td>TAX RATE</td>
                                                <td style="text-align: center;">$<?php echo $tax_rate ?>%</td>
                                            </tr>
                                            <tr>
                                                <td>TAX</td>
                                                <td style="text-align: center;">$<?php echo $tax ?></td>
                                            </tr>
                                            <tr>
                                                <td>SHIPPING COST</td>
                                                <td style="text-align: center;">$<?php echo $shipping_cost; ?></td>
                                            </tr>
                                            <tr>
                                                <td>ECO COST</td>
                                                <td style="text-align: center;">$<?php echo $eco_cost; ?></td>
                                            </tr>
                                            <tr>
                                                <td>TOTAL</td>
                                                <td style="text-align: center;">$<?php echo $total; ?></td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                                <p>easyshop invoice</p>
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
<!-- END BRANDS -->
<?php include("../inc/footer.php") ?>
<!-- END FOOTER -->


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