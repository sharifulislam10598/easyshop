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
            if(isset($_POST['update'])){
                $response = (new OurContacts())->contact_update();
                if(!$response->status){ ?>
              <div class="alert alert-fill-primary" role="alert">
              <i class="fa fa-exclamation-triangle"></i>
              <?php echo $response->get_string_errors() ?>
              </div>
              <?php } }

              if(isset($_POST['save'])){
                $response = (new OurContacts())->save();
                if(!$response->status){ ?>
              <div class="alert alert-fill-primary" role="alert">
              <i class="fa fa-exclamation-triangle"></i>
              <?php echo $response->get_string_errors() ?>
              </div>
              <?php }} ?>

              <div class="card">
                <div class="card-body">
                <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                <form class="forms-sample" method="post">
                  <?php 
                  $contact_info = (new Footer())->contacts;
                  if((new SiteIdentity())->demo == true){
                  ?>
                    <div class="form-group">
                      <label for="exampleInputUsername1">Address :</label>
                      <input type="text" class="form-control" id="exampleInputUsername1" name="address" value="<?php echo $contact_info['address'] ?>">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputUsername1">Phone :</label>
                      <input type="text" class="form-control" id="exampleInputUsername1" name="phone" value="<?php echo $contact_info['phone'] ?>">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputUsername1">Fax :</label>
                      <input type="text" class="form-control" id="exampleInputUsername1" name="fax" value="<?php echo $contact_info['fax'] ?>">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputUsername1">Email :</label>
                      <input type="text" class="form-control" id="exampleInputUsername1" name="email" value="<?php echo $contact_info['email'] ?>">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">skype :</label>
                      <input type="text" class="form-control" id="exampleInputEmail1" name="skype" value="<?php echo $contact_info['skype'] ?>">
                    </div>
                    <button class="btn btn-primary mr-2" name="">update</button>
                    <button class="btn btn-light" onclick="history.back();">Cancel</button>
                    </div>

                  <?php } else{ 
                      $contacts = (new OurContacts())->get_contacts_info();
                      if($contacts == true){ ?>
                    <div class="form-group">
                      <label for="exampleInputUsername1">Address :</label>
                      <input type="text" class="form-control" id="exampleInputUsername1" name="address" value="<?php echo $contacts['address'] ?>">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputUsername1">Phone :</label>
                      <input type="text" class="form-control" id="exampleInputUsername1" name="phone" value="<?php echo $contacts['phone'] ?>">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputUsername1">Fax :</label>
                      <input type="text" class="form-control" id="exampleInputUsername1" name="fax" value="<?php echo $contacts['fax'] ?>">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputUsername1">Email :</label>
                      <input type="text" class="form-control" id="exampleInputUsername1" name="email" value="<?php echo $contacts['email'] ?>">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">skype :</label>
                      <input type="text" class="form-control" id="exampleInputEmail1" name="skype" value="<?php echo $contacts['skype'] ?>">
                      <input type="hidden" name="id" value="<?php echo $contacts['id'] ?>">
                    </div>
                    <button type="submit" class="btn btn-primary mr-2" name="update">update</button>
                    <button class="btn btn-light" onclick="history.back();">Cancel</button>
                    </div>

                   <?php   }else{ ?>
                    <div class="form-group">
                      <label for="exampleInputUsername1">Address :</label>
                      <input type="text" class="form-control" id="exampleInputUsername1" name="address" value="">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputUsername1">Phone :</label>
                      <input type="text" class="form-control" id="exampleInputUsername1" name="phone" value="">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputUsername1">Fax :</label>
                      <input type="text" class="form-control" id="exampleInputUsername1" name="fax" value="">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputUsername1">Email :</label>
                      <input type="text" class="form-control" id="exampleInputUsername1" name="email" value="">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">skype :</label>
                      <input type="text" class="form-control" id="exampleInputEmail1" name="skype" value="">
                    </div>
                    <button type="submit" class="btn btn-primary mr-2" name="save">Save</button>
                    <button class="btn btn-light" onclick="history.back();">Cancel</button>
                    </div>
                  <?php }}
                    ?>

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
