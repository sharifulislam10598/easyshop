<?php include('..\inc\header.php');

?>
<div class="main-panel">
        <div class="content-wrapper">
          <div class="page-header">
            <h3 class="page-title">
              Informations
            </h3>
          </div>
          <div class="row">
            <div class="col-7 grid-margin">

            <?php 
            if((new SiteIdentity())->demo == false){
              if(isset($_POST['update'])){
                $response = (new Information())->information_update();
                if(!$response->status){ ?>
              <div class="alert alert-fill-primary" role="alert">
              <i class="fa fa-exclamation-triangle"></i>
              <?php echo $response->get_string_errors() ?>
              </div>
              <?php }else{
                header('location:information.php');
              } }}?>

              <div class="card">
                <div class="card-body">
                <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                <form class="forms-sample" method="post">
                  <?php
                  $footer_info = new Footer();
                  if((new SiteIdentity())->demo == true){ 
                   ?>

                    <div class="form-group">
                      <label for="exampleInputUsername1">Subject</label>
                      <input type="text" class="form-control" id="exampleInputUsername1" name="" value="">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">link</label>
                      <input type="text" class="form-control" id="exampleInputEmail1" name="" value="">
                    </div>
                    <button type="" class="btn btn-primary mr-2">Update</button>
                    <button class="btn btn-light" onclick="history.back();">Cancel</button>
                    </div>

                  <?php }else{
                      $info = (new Information())->get_information();
                     ?>
                    
                    <div class="form-group">
                      <label for="exampleInputUsername1">Subject</label>
                      <input type="text" class="form-control" id="exampleInputUsername1" name="subject" value="<?php echo $info['subject'] ?>">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">link</label>
                      <input type="text" class="form-control" id="exampleInputEmail1" name="link" value="<?php echo $info['link'] ?>">
                      <input type="hidden" name="id" value="<?php echo $info['id'] ?>">
                    </div>
                    <button type="submit" class="btn btn-primary mr-2" name="update">Update</button>
                    <button class="btn btn-light" onclick="history.back();">Cancel</button>
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
