<?php include('C:\xampp\htdocs\easyshop\admin\inc\header.php');
 if((new SiteIdentity())->demo == false){
  if(isset($_GET['id'])){
    (new DeliveryMethodList())->remove();
}
}

$delivery_method_list = (new DeliveryMethodList())->get_delivery_method_list();
?>
<div class="main-panel">
        <div class="content-wrapper">
          <div class="page-header">
            <h3 class="page-title">
                Method list
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
              <div class="card">
                <div class="card-body">
                  <div class="row">
                    <div class="table-sorter-wrapper col-lg-12 table-responsive">
                      <table class="table">
                        <thead>
                        <tr>
                            <th class="sortStyle">Sl</th>
                            <th class="sortStyle">Method</th>
                            <th class="sortStyle">Shiping cost</th>
                            <th class="sortStyle">Options</th>
                          </tr>
                        </thead>
                        <tbody>
                        <?php foreach($delivery_method_list as $index => $value){?>
                          <tr>
                            <td><?php echo $index + 1 ?></td>
                            <td><?php echo $value['method'] ?></td>
                            <td>$ <?php echo $value['shipping_cost'] ?></td>
                            <td>
                                <a href="<?php echo SITE_URL?>/admin/delivery/edit-delivery-method.php?id=<?php echo $value['id'] ?>">
                                    <button class="btn">Edit</button>
                                </a>
                                <a href="<?php echo SITE_URL?>/admin/delivery/delivery-method-list.php?id=<?php echo $value['id'] ?>">
                                  <button class="btn">Delete</button>
                                </a>
                            </td>
                          </tr>
                        <?php } ?>
                        </tbody>
                      </table>
                    </div>
                    <a href="<?php echo SITE_URL ?>/admin/delivery/add-delivery-method.php">
                        <button class="btn">Add a method</button>
                    </a>
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
