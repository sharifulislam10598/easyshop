<?php include('..\inc\header.php');
$id = $_GET['id'];

?>
<div class="main-panel">
        <div class="content-wrapper">
          <div class="page-header">
            <h3 class="page-title">
              Icon Edit
            </h3>
          </div>
          <div class="row">
            <div class="col-7 grid-margin">
            <?php 

            if(isset($_POST['update'])){
              $response = (new SocialNetwork())->icon_update($id);
              if($response->status){
                header('location:'.SITE_URL.'/admin/social-network/social-icon.php');
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
          <?php 
          if((new SiteIdentity())->demo == true){
            foreach((new Footer())->social_icon as $value){
              if($value['id'] == $id){
              ?>
                
                <form class="forms-sample" method="post">
                    <div class="form-group">
                      <label for="exampleInputUsername1">Icon</label>
                      <input type="text" class="form-control" name="icon" id="exampleInputUsername1" value="<?php echo $value['icon'] ?>">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputUsername1">link</label>
                      <input type="text" class="form-control" name="link" id="exampleInputUsername1" value="<?php echo $value['link'] ?>">
                    </div>
                    <button type="submit" class="btn btn-primary mr-2">update</button>
                    <button class="btn btn-light" onclick="history.back();">Cancel</button>
                    </div>
                  </form>
                  <?php  }}}else{
                    $icon_info = (new SocialNetwork())->get_icon($id);
                    ?>
                    <form class="forms-sample" method="post">
                    <div class="form-group">
                      <label for="exampleInputUsername1">Icon</label>
                      <input type="text" class="form-control" name="icon" id="exampleInputUsername1" value="<?php echo $icon_info['icon'] ?>">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputUsername1">link</label>
                      <input type="text" class="form-control" name="link" id="exampleInputUsername1" value="<?php echo $icon_info['link'] ?>">
                    </div>
                    <button type="submit" class="btn btn-primary mr-2 " name="update">update</button>
                    <button class="btn btn-light" onclick="history.back();">Cancel</button>
                    </div>
                  </form>

                <?php  }
                  ?>
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
