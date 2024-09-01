<?php include('..\inc\header.php');

    if(isset($_GET['id'])){
      (new Slider())->remove();
    }

?>
<div class="main-panel">
        <div class="content-wrapper">
          <div class="page-header">
            <h3 class="page-title">
                Slider Customize
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
                            <th class="sortStyle">1st line</th>
                            <th class="sortStyle">2nd line</th>
                            <th class="sortStyle">3rd line</th>
                            <th class="sortStyle">Background</th>
                            <th class="sortStyle">actions</i></th>
                          </tr>
                        </thead>
                        <tbody>
                          
                        <?php 
                        $slider = new Anouncement();
                        if((new SiteIdentity())->demo == true){
                        foreach($slider->items_four as $value){?>
                          <tr>
                            <td><?php echo $value["1st_line"]["text"] ?></td>
                            <td><?php echo $value["2nd_line"]["text"] ?></td>
                            <td><?php echo $value["3rd_line"]["text"] ?></td>
                            <td><img style="border-radius: 0;" src="<?php echo $value["background_img"] ?>"></td>
                            <td>
                                <a href="slide-style-four-edit.php">
                                    <button class="btn">Customize</button>
                                </a>
                                <a href="">
                                  <button class="btn">Delete</button>
                                </a>
                            </td>
                          </tr>
                            <?php } ?>

                          <?php foreach($slider->items_five as $value){?>
                          <tr>
                            <td><?php echo $value["1st_line"]["text"] ?></td>
                            <td> </td>
                            <td> </td>
                            <td><img style="border-radius: 0;" src="<?php echo $value["background_img"] ?>"></td>
                            <td>
                                <a href="slide-style-five-edit.php">
                                    <button class="btn">Customize</button>
                                </a>
                                <a href="">
                                  <button class="btn">Delete</button>
                                </a>
                            </td>
                          </tr>
                          <?php } ?>

                        <?php 
                        foreach($slider->items_six as $value){?>
                          <tr>
                            <td><?php echo $value["1st_line"]["text"] ?></td>
                            <td><?php echo $value["2nd_line"]["text"] ?></td>
                            <td><?php echo $value["3rd_line"]["text"] ?></td>
                            <td><img style="border-radius: 0;" src="<?php echo $value["background_img"] ?>"></td>
                            <td>
                                <a href="slide-style-six-edit.php">
                                    <button class="btn">Customize</button>
                                </a>
                                <a href="">
                                  <button class="btn">Delete</button>
                                </a>
                            </td>
                          </tr>
                            <?php } ?>

                              <?php
                              foreach($slider->items_seven as $value){?>
                                <tr>
                                  <td><?php echo $value["1st_line"]["text"] ?></td>
                                  <td><?php echo $value["2nd_line"]["text"] ?></td>
                                  <td> </td>
                                  <td><img style="border-radius: 0;" src="<?php echo $value["background_img"] ?>"></td>
                                  <td>
                                      <a href="slide-style-seven-edit.php">
                                          <button class="btn">Customize</button>
                                      </a>
                                      <a href="">
                                        <button class="btn">Delete</button>
                                      </a>
                                  </td>
                                </tr>
                                  <?php } ?>
                          </tr>
                     <?php }else{ ?> 

                     <?php 
                        foreach($slider->items_four as $value){?>
                          <tr>
                            <td><?php echo $value["1st_line"]["text"] ?></td>
                            <td><?php echo $value["2nd_line"]["text"] ?></td>
                            <td><?php echo $value["3rd_line"]["text"] ?></td>
                            <td><img style="border-radius: 0;" src="<?php echo $value["background_img"] ?>"></td>
                            <td>
                                <a href="slide-style-four-edit.php?id=<?php echo $value['id'] ?>">
                                    <button class="btn">Customize</button>
                                </a>
                                <a href="slider.php?id=<?php echo $value['id'] ?>">
                                  <button onclick="return confirm('Are you sure ?');" class="btn">Delete</button>
                                </a>
                            </td>
                          </tr>
                            <?php } ?>

                          <?php foreach($slider->items_five as $value){?>
                          <tr>
                            <td><?php echo $value["1st_line"]["text"] ?></td>
                            <td> </td>
                            <td> </td>
                            <td><img style="border-radius: 0;" src="<?php echo $value["background_img"] ?>"></td>
                            <td>
                                <a href="slide-style-five-edit.php?id=<?php echo $value['id'] ?>">
                                    <button class="btn">Customize</button>
                                </a>
                                <a href="slider.php?id=<?php echo $value['id'] ?>">
                                  <button onclick="return confirm('Are you sure ?');" class="btn">Delete</button>
                                </a>
                            </td>
                          </tr>
                          <?php } ?>

                        <?php 
                        foreach($slider->items_six as $value){?>
                          <tr>
                            <td><?php echo $value["1st_line"]["text"] ?></td>
                            <td><?php echo $value["2nd_line"]["text"] ?></td>
                            <td><?php echo $value["3rd_line"]["text"] ?></td>
                            <td><img style="border-radius: 0;" src="<?php echo $value["background_img"] ?>"></td>
                            <td>
                                <a href="<?php echo SITE_URL ?>/admin/slider/slide-style-six-edit.php?id=<?php echo $value['id'] ?>">
                                    <button class="btn">Customize</button>
                                </a>
                                <a href="slider.php?id=<?php echo $value['id'] ?>">
                                  <button onclick="return confirm('Are you sure ?');" class="btn">Delete</button>
                                </a>
                            </td>
                          </tr>
                            <?php } ?>

                              <?php
                              foreach($slider->items_seven as $value){?>
                                <tr>
                                  <td><?php echo $value["1st_line"]["text"] ?></td>
                                  <td><?php echo $value["2nd_line"]["text"] ?></td>
                                  <td> </td>
                                  <td><img style="border-radius: 0;" src="<?php echo $value["background_img"] ?>"></td>
                                  <td>
                                      <a href="<?php echo SITE_URL ?>/admin/slider/slide-style-seven-edit.php?id=<?php echo $value['id'] ?>">
                                          <button class="btn">Customize</button>
                                      </a>
                                      <a href="slider.php?id=<?php echo $value['id'] ?>">
                                        <button onclick="return confirm('Are you sure ?');" class="btn">Delete</button>
                                      </a>
                                  </td>
                                </tr>
                                  <?php } } ?>

                        </tbody>
                      </table>
                    </div>
                  </div>
                  <a href="<?php echo SITE_URL ?>/admin/slider/style-four.php">
                  <button class="btn">Add</button>
                  </a>
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
