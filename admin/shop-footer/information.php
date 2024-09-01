<?php include('..\inc\header.php');
 if((new SiteIdentity())->demo == false){
  if(isset($_GET['id'])){
    (new Information())->remove();
}
}
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
                <div class="card">
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table">
                      <thead>
                        <tr>
                          <th>Subject</th>
                          <th>link</th>
                          <th>action</th>
                        </tr>
                      </thead>
                      <tbody>

                      <?php
                      $footer_info = new Footer();
                      if((new SiteIdentity())->demo == true){
                       foreach($footer_info->information as $value){?>
                        <tr>
                          <td><?php echo $value['subject'] ?></td>
                          <td><?php echo $value['link'] ?></td>
                          <td>
                            <a href="information-edit.php">
                            <button class="btn">Edit</button>
                            </a>
                            <button class="btn">Delete</button>
                          </td>
                        </tr>
                    <?php }}else{ 

                        foreach($footer_info->information as $value){?>
                        <tr>
                          <td><?php echo $value['subject'] ?></td>
                          <td><?php echo $value['link'] ?></td>
                          <td>
                            <a href="information-edit.php?id=<?php echo $value['id'] ?>">
                            <button class="btn">Edit</button>
                            </a>
                            <a href="information.php?id=<?php echo $value['id'] ?>">
                            <button class="btn" onclick="return confirm('Are you sure ?');">Delete</button>
                            </a>
                          </td>
                        </tr>
                    <?php }}?>

                      </tbody>
                    </table>
                  </div>
                </div>            
                    <a href="add-more-information.php">
                        <button class="btn">Add more</button>
                    </a>
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
