<?php include('C:\xampp\htdocs\easyshop\admin\inc\header.php');
 $tax_info = (new TaxCharges())->get_tax_charge_info();

?>
<div class="main-panel">
        <div class="content-wrapper">
          <div class="page-header">
            <h3 class="page-title">
              Add a tax charge
            </h3>
          </div>
          <div class="row">
            <div class="col-7 grid-margin">
            <?php 

              if(isset($_POST['submit'])){
                $response = (new TaxCharges())->tax_charge_update();
                if($response->status){
                  header('location:'.SITE_URL.'/admin/taxes/tax-charges.php');
             } else{?>
              
            <div class="alert alert-fill-primary" role="alert">
            <i class="fa fa-exclamation-triangle"></i>
            <?php echo $response->get_string_errors() ?>
            </div>
            <?php } }?>

              <div class="card">
                <div class="card-body">
                <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                <form class="forms-sample" method="post">
                    <div class="form-group">
                      <label for="exampleInputUsername1">Write a tax :</label>
                      <input type="text" class="form-control" name="tax" id="exampleInputUsername1" value="<?php echo $tax_info['taxes'] ?>">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputUsername1">rate :</label>
                      <input type="text" class="form-control" name="rate" id="exampleInputUsername1" value="<?php echo $tax_info['rate'] ?>">
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary mr-2">Update</button>
                    <button onclick="history.back();" class="btn btn-light">Cancel</button>
                    </div>
                  </form>
                </div>
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
