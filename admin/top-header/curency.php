<?php include('C:\xampp\htdocs\easyshop\admin\inc\header.php');
$curency = new Menu();
?>
<div class="main-panel">
        <div class="content-wrapper">
          <div class="page-header">
            <h3 class="page-title">
                Curency list
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
                            <th class="sortStyle">Curency</th>
                            <th class="sortStyle">Symbol</th>
                            <th class="sortStyle">URL</th>
                            <th class="sortStyle">actions</i></th>
                          </tr>
                        </thead>
                        <tbody>
                        <?php foreach($curency->currency as $index => $value){?>
                          <tr>
                            <td><?php echo $index + 1 ?></td>
                            <td><?php echo $value['name'] ?></td>
                            <td><?php echo $value['symbol'] ?></td>
                            <td><?php echo $value['url'] ?></td>
                            <td>
                                <a href="http://localhost/easyshop/admin/top-header/curency-edit.php?id=<?php echo $value['id'] ?>">
                                    <button class="btn">Edit</button>
                                </a>
                                <button class="btn">Delete</button>
                            </td>
                          </tr>
                        <?php } ?>
                        </tbody>
                      </table>
                    </div>
                    <a href="http://localhost/easyshop/admin/top-header/add-curency.php">
                        <button class="btn">Add a curency</button>
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
