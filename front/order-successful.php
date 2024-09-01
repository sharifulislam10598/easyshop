<?php
require '../define.php';
require ROOT_DIRECTORY . '/controllers/vendor/autoload.php';
include("inc/header.php");
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
        <div style="text-align: center;height: 50vh;">
            <h1>Order successful.</h1>
            <a href="<?php echo SITE_URL ?>">
                <button  class="btn btn-primary">Go to home</button>
            </a>
        </div>
        
      </div>
      <!-- END CONTENT -->
    </div>
    <!-- END SIDEBAR & CONTENT -->
  </div>
</div>

<!-- BEGIN STEPS -->
<?php include("inc/footer.php") ?>
<!-- END FOOTER -->

</body>
<!-- END BODY -->

</html>