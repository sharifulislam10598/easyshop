<?php include('..\inc\header.php');
?>
<div class="main-panel">
        <div class="content-wrapper">
          <div class="page-header">
            <h3 class="page-title">
            Add a new slide
            </h3>
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Tables</a></li>
                <li class="breadcrumb-item active" aria-current="page">Sortable table</li>
              </ol>
            </nav>
          </div>
          <div class="row">
            <div class="col-12 grid-margin">

            <?php 
            if((new SiteIdentity())->demo == false){
              if(isset($_POST['save'])){
                $response = (new Slider())->save_item_six();
                if(!$response->status){ ?>
              <div class="alert alert-fill-primary" role="alert">
              <i class="fa fa-exclamation-triangle"></i>
              <?php echo $response->get_string_errors() ?>
              </div>
              <?php }else{
                header('location:'.SITE_URL.'/admin/slider/slider.php');
              } }}?>

              <div class="card">
                <div class="card-body">
                <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <form class="forms-sample" method="post" enctype="multipart/form-data">
                    <div class="form-group row">
                      <label for="exampleInputEmail2" class="col-sm-3 col-form-label">1st line</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" id="exampleInputEmail2" name="first_line" placeholder="">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="exampleInputEmail2" class="col-sm-3 col-form-label">1st line color</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" id="exampleInputEmail2" name="first_line_color" placeholder="">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="exampleInputMobile" class="col-sm-3 col-form-label">2nd line</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" id="exampleInputMobile" name="second_line" placeholder="">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="exampleInputMobile" class="col-sm-3 col-form-label">2nd line color</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" id="exampleInputMobile" name="second_line_color" placeholder="">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="exampleInputPassword2" class="col-sm-3 col-form-label">third line</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" id="exampleInputPassword2" name="third_line" placeholder="">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="exampleInputPassword2" class="col-sm-3 col-form-label">third line color</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" id="exampleInputPassword2" name="third_line_color" placeholder="">
                      </div>
                    </div>
                    <div class="form-group">
                      <label>Background Image</label>
                      <div class="input-group col-xs-12">
                        <input type="file" name="background_img" class="form-control file-upload-info">
                      </div>
                    </div>
                    <input type="hidden" name="slider_item" value="6">
                    <button type="submit" class="btn btn-primary mr-2" name="save">Save</button>
                    <button class="btn btn-light" onclick="history.back();">Cancel</button>
                  </form>
                </div>
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
