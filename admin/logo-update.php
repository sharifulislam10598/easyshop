<?php 

  include('inc/header.php');

  ?>
<div class="main-panel">
        <div class="content-wrapper">
          <div class="page-header">
            <h3 class="page-title">
              Logo
            </h3>
          </div>
          <div class="row">
            <div class="col-7 grid-margin">
            <?php 
              if(isset($_POST['save'])){
                $response = (new logo())->save();
                if(!$response->status){ ?>
              <div class="alert alert-fill-primary" role="alert">
              <i class="fa fa-exclamation-triangle"></i>
              <?php echo $response->get_string_errors() ?>
              </div>
              <?php } }?>

            <?php 
              if(isset($_POST['update'])){
                $response = (new logo())->logo_update();
                if(!$response->status){ ?>
              <div class="alert alert-fill-primary" role="alert">
              <i class="fa fa-exclamation-triangle"></i>
              <?php echo $response->get_string_errors() ?>
              </div>
              <?php } }?>

              <div class="card">
                <div class="card-body">
                <div class="col-12 grid-margin stretch-card">
                <?php 
                  $logo_info = new SiteIdentity();
                  $logo_img = $logo_info->logo;
                  $logo = (new logo())->get_logo(); // query for logo id.............
                      if($logo_info->demo == false && $logo == false){ 
                    ?>
                    <div class="card">
                      No logo here.
                      <div class="card-body">
                        <form class="forms-sample" method="post" enctype="multipart/form-data">
                          <div class="form-group">
                              <br>
                              <br>
                              If you add your brands logo, select a logo form your file and save it.
                              <br>
                              <br>
                              <input type="file" name="image">
                    </div>
                    <button type="submit" name="save" class="btn btn-primary mr-2">Save</button>
                    </form>

                  <?php
                    }else{ 
                      if($logo_info->demo == false){
                        $logo_img = SITE_URL.'/'. $logo['image'];
                        $logo_id = $logo['id'];
                      }
                      ?>
                    
                    <div class="card">
                    Current logo :
                      <div class="card-body">
                        <form class="forms-sample" method="post" enctype="multipart/form-data">
                          <div class="form-group">
                              <img width="50px" src="<?php echo $logo_img ?>">
                              <br>
                              <br>
                              If you change your brands logo, select a logo form your file and update it.
                              <br>
                              <br>
                              <input type="file" name="image">
                              <input type="hidden" value="<?php echo $logo_id ?>" name="id">
                    </div>
                    <button type="submit" name="update" class="btn btn-primary mr-2">Update</button>
                    
                <?php   }
                ?>
                  </form>
                </div>
              </div>
            </div>
                </div>
              </div>
            </div>
        </div>
        <br><br><br><br><br><br><br>
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
