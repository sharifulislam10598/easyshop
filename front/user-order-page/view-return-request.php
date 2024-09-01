<?php
  require '../../define.php';
  require ROOT_DIRECTORY.'/controllers/vendor/autoload.php';
  $side_bar = new SideBarInfo();
  $wishlist_info = new WishList(); 
  include("../inc/header.php");
  
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
            <div class="goods-page">
              <div class="goods-data clearfix">
                <p style="margin-bottom: 30px;">You have no return request!</p>
                <div>
                    <a href="add-return.php">
                        <button type="button">Add return</button>
                    </a>
                </div>
                </div>
                </div>
              </div>
            </div>
          </div>
          <!-- END CONTENT -->
        </div>
        <!-- END SIDEBAR & CONTENT -->


    <!-- BEGIN BRANDS -->
   <?php include("../inc/brands.php") ?>
    <!-- END BRANDS -->
    <?php include("../inc/footer.php") ?>
    <!-- END FOOTER -->

    <div class="popupElement" id="link-1">
            <div class="invoice">
                <div class="header">
                    <div class="header-title">
                        <h3>Invoice</h3>
                    </div>
                    <button id="printBtn" class="print-btn">Print</button>
                </div>
                <div class="company-info">
                    <h2>Your Company Name</h2>
                    <p>Your Business Name</p>
                    <p>City</p>
                    <p>Country</p>
                    <p>Postal</p>
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
                            <th>TAX</th>
                            <th>AMOUNT</th>
                        </tr>
                        <tr>
                            <td class="left">Item 1</td>
                            <td class="left">Description</td>
                            <td>1</td>
                            <td>$0</td>
                            <td>0%</td>
                            <td>$000.00</td>
                        </tr>
                        <tr>
                            <td class="left">Item 1</td>
                            <td class="left">Description</td>
                            <td>1</td>
                            <td>$0</td>
                            <td>0%</td>
                            <td>$000.00</td>
                        </tr>
                        <tr>
                            <td class="left">Item 1</td>
                            <td class="left">Description</td>
                            <td>1</td>
                            <td>$0</td>
                            <td>0%</td>
                            <td>$000.00</td>
                        </tr>
                        <tr>
                            <td class="left">Item 1</td>
                            <td class="left">Description</td>
                            <td>1</td>
                            <td>$0</td>
                            <td>0%</td>
                            <td>$000.00</td>
                        </tr>
                        <tr>
                            <td class="left">Item 1</td>
                            <td class="left">Description</td>
                            <td>1</td>
                            <td>$0</td>
                            <td>0%</td>
                            <td>$000.00</td>
                        </tr>
                        <tr>
                            <td class="left">Item 1</td>
                            <td class="left">Description</td>
                            <td>1</td>
                            <td>$0</td>
                            <td>0%</td>
                            <td>$000.00</td>
                        </tr>
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
                                <td>$0000.00</td>
                            </tr>
                            <tr>
                                <td>TAX RATE</td>
                                <td>$0000.00</td>
                            </tr>
                            <tr>
                                <td>TAX</td>
                                <td>$0000.00</td>
                            </tr>
                            <tr>
                                <td>TOTAL</td>
                                <td>$0000.00</td>
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
        const popupElement = document.querySelector('.popupElement');
        const printBtn = document.getElementById('printBtn');
        const closeBtn = document.getElementById("closeBtn");
         
        
        function close_all_popup(){
            document.querySelectorAll(".popupElement").forEach(function(popupElement){
              popupElement.classList.remove('remove-popup');
            });
        }
            
        btns.forEach(function(btn){
            btn.onclick = function(e){
                e.preventDefault();
                close_all_popup();
                var href = this.parentElement.getAttribute('href');
                var id = href.replace('#','');
                var popupElement = document.getElementById(id);
                popupElement.classList.add('open-popup');  
            }
        });
        closeBtn.onclick = function(){
          popupElement.classList.add("remove-popup");

        }
            
        
        printBtn.onclick = function(){
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