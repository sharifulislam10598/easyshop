<?php include('..\inc\header.php');?>

<div class="main-panel">
        <div class="content-wrapper">
          <div class="page-header">
            <h3 class="page-title">
              About us
            </h3>
          </div>
          <div class="row">
            <div class="col-7 grid-margin">

            <?php 
              if(isset($_POST['update'])){
                $response = (new AboutUs())->about_update();
                if(!$response->status){ ?>
              <div class="alert alert-fill-primary" role="alert">
              <i class="fa fa-exclamation-triangle"></i>
              <?php echo $response->get_string_errors() ?>
              </div>
              <?php }}

              if(isset($_POST['save'])){
                $response = (new AboutUs())->save();
                if(!$response->status){ ?>
              <div class="alert alert-fill-primary" role="alert">
              <i class="fa fa-exclamation-triangle"></i>
              <?php echo $response->get_string_errors() ?>
              </div>
              <?php }}?>

              <div class="card">
                <div class="card-body">
                <form class="forms-sample" method="post">
                  
                  <?php 
                  $footer_info = new Footer();
                  if((new SiteIdentity())-> demo == true){ ?>
                    <div class="form-group">
                      <label for="exampleInputUsername1">Title</label>
                      <input type="text" class="form-control" id="exampleInputUsername1" value="<?php echo $footer_info->about_us["title"]  ?>">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Article 1</label>
                      <input type="text" class="form-control" id="exampleInputEmail1" value="<?php echo $footer_info->about_us['article_1'] ?>">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Article 2</label>
                      <input type="text" class="form-control"  value="<?php echo $footer_info->about_us['article_2'] ?>">
                    </div>
                    <button class="btn btn-primary mr-2">Update</button>
                    <button class="btn btn-light" onclick="history.back();">Cancel</button>
                    </div>

                    <?php }else{
                      $about_info = (new AboutUs())->get_about_info();
                      if($about_info == true){?>
                    <div class="form-group">
                      <label for="exampleInputUsername1">Title</label>
                      <input type="text" class="form-control" id="exampleInputUsername1" name="title" value="<?php echo $footer_info->about_us["title"]  ?>">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Article 1</label>
                      <input type="text" class="form-control" id="exampleInputEmail1" name="article_1" value="<?php echo $footer_info->about_us['article_1'] ?>">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Article 2</label>
                      <input type="text" class="form-control" name="article_2" value="<?php echo $footer_info->about_us['article_2'] ?>">
                      <input type="hidden" name="id" value="<?php echo $footer_info->about_us['id'] ?>" >
                    </div>
                    <button type="submit" class="btn btn-primary mr-2" name="update">Update</button>
                    <button class="btn btn-light" onclick="history.back();">Cancel</button>
                    </div>

                    <?php }else{ ?>
                    <div class="form-group">
                    <label for="exampleInputUsername1">Title</label>
                    <input type="text" class="form-control" id="exampleInputUsername1" name="title" value="">
                    </div>
                    <div class="form-group">
                    <label for="exampleInputEmail1">Article 1</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="article_1" value="">
                    </div>
                    <div class="form-group">
                    <label for="exampleInputPassword1">Article 2</label>
                    <input type="text" class="form-control" name="article_2"  value="">
                    </div>
                    <button type="submit" class="btn btn-primary mr-2" name="save">save</button>
                    <button class="btn btn-light" onclick="history.back();">Cancel</button>
                    </div>
                  <?php }}?>

                  </form>
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
  </div>

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
