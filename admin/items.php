<?php include('inc\header.php');
if(isset($_GET['id'])){
  (new items())->remove();
}
if(isset($_GET['stickerid'])){
  (new Sticker())->remove();
}

?>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="page-header">
            <h3 class="page-title">
             Items List
            </h3>
          </div>
          <div class="row">
            <div class="col-12 grid-margin">
              <div class="card">
                <div class="card-body">
                  <div class="row">
                    <div class="table-sorter-wrapper col-lg-12 table-responsive">
                      <table id="sortable-table-1" class="table">
                        <thead>
                          <tr>
                            <th class="sortStyle">Image<i class=""></i></th>
                            <th class="sortStyle">Name<i class=""></i></th>
                            <th class="sortStyle">Price<i class=""></i></th>
                            <th class="sortStyle">Category<i class=""></i></th>
                            <th class="sortStyle">added<i class=""></i></th>
                            <th class="sortStyle">Availability<i class=""></i></th>
                            <th class="sortStyle">Action<i class=""></i></th>
                          </tr>
                        </thead>
                        <tbody>

                        <?php 
                        $items = new ProductInfo();
                        if((new SiteIdentity())->demo == true){
                        foreach($items->items as $value){?> 
                        
                        <tr>
                            <td><img style="border-radius:0" width="50px" src="<?php echo $value['items_img'] ?>"></td>
                            <td><?php echo $value['items_name'] ?></td>
                            <td><?php echo $value['price'] ?></td>
                            <td>None</td>
                            <td>None</td>
                            <td>none</td>
                            <td>
                                <a href="<?php echo SITE_URL ?>/admin/item-edit.php">
                                    <button class="btn">Edit</button>
                                </a>
                                <a >
                                    <button class="btn">Delete</button>
                                </a>
                            </td>
                        </tr>

                    <?php }}else{ 
                        foreach($items->items as $value){ ?>
                      <tr>
                            <td><img style="border-radius:0" width="50px" src="<?php echo SITE_URL.'/'. $value['items_img'] ?>"></td>
                            <td><?php echo $value['items_name'] ?></td>
                            <td><?php echo $value['price'] ?></td>
                            <td><?php echo $value['category_name'] ?></td>
                            <td>
                              <?php if($value['sticker'] == 1){echo 'new';}elseif($value['sticker']== 2){echo 'sale';} ?>
                              <br><br>
                              <?php if($value['item_added']== 1){echo 'Two items';}elseif($value['item_added'] == 2){echo 'Three items';} ?>
                            </td>
                            <td><?php echo $value['availability'] ?></td>
                            
                            <td>
                                <a href="<?php echo SITE_URL ?>/admin/item-edit.php?id=<?php echo $value['id'] ?>">
                                    <button class="btn">Edit</button>
                                </a>
                                <a href="<?php echo SITE_URL ?>/admin/items.php?id=<?php echo $value['id'] ?>">
                                    <button class="btn" onclick="return confirm('Are you sure ?');">Delete</button>
                                </a>
                            </td>
                        </tr>

                      <?php }} ?>
                        </tbody>
                      </table>
                    </div>
                    <a href="add-item.php">
                        <button class="btn">Add a item</button>
                    </a>
                  </div>
                </div>
              </div>
            <br> 

            <!-- sticker start -->
            <div class="col-7 grid-margin">
              <div class="card" >
                <div class="card-body">
                  <div class="row" class="col-7">
                    <div class="table-sorter-wrapper col-lg-12 table-responsive">
                      <table id="sortable-table-1" class="table">
                        <thead>
                          <tr>
                            <th class="sortStyle">Sticker<i class=""></i></th>
                            <th class="sortStyle">Action<i class=""></i></th>
                          </tr>
                        </thead>
                        <tbody>

                        <?php 
                        $items = new ProductInfo();
                        if((new SiteIdentity())->demo == true){
                        foreach($items->sticker as $value){?> 
                        <tr>
                            <td><?php echo $value['sticker'] ?></td>
                            <td>
                                <a href="<?php echo SITE_URL ?>/admin/item-edit.php">
                                    <button class="btn">Edit</button>
                                </a>
                                <a >
                                    <button class="btn">Delete</button>
                                </a>
                            </td>
                        </tr>

                    <?php }}else{ 
                        foreach($items->sticker as $value){ ?>
                      <tr>
                            <td><?php echo $value['sticker'] ?></td>
                            <td>
                                <a href="<?php echo SITE_URL ?>/admin/sticker/sticker-edit.php?id=<?php echo $value['id'] ?>">
                                    <button class="btn">Edit</button>
                                </a>
                                <a href="<?php echo SITE_URL ?>/admin/items.php?stickerid=<?php echo $value['id'] ?>">
                                    <button class="btn" onclick="return confirm('Are you sure ?');">Delete</button>
                                </a>
                            </td>
                        </tr>

                      <?php }} ?>
                        </tbody>
                      </table>
                    </div>
                    <a href="<?php echo SITE_URL ?>/admin/sticker/add-sticker.php">
                        <button class="btn">Add a sticker</button>
                    </a>
                        </div>
                  </div>
                </div>
              </div>
              <!-- sticker end -->


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