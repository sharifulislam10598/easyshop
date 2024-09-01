<?php 
$id = $_GET['id'];
include('inc\header.php');


?>
<div class="main-panel">        
        <div class="content-wrapper">
          <div class="page-header">
            <h3 class="page-title">
               Item Edit
            </h3>
          </div>
          <div class="row">
            <div class="col-10 grid-margin">

            <?php
              if(isset($_POST['update'])){
                $response = (new items())-> items_update();
                (new Colors())->remove();
                (new Colors())->save($_GET['id']);
                (new Sizes())->remove();
                (new Sizes())->save($_GET['id']);
                (new AdditionalFeature())->remove();
                (new AdditionalFeature())->save($_GET['id']);

                
                
                if(!$response->status){ 
                ?>
               <div class="alert alert-fill-primary" role="alert">
               <i class="fa fa-exclamation-triangle"></i>
               <?php 
               echo $response->get_string_errors() 
               ?>
              // </div>
               <?php }else{
                header('location:'.SITE_URL.'/admin/items.php');
              } 
              }?>

              <div class="card">
                <div class="card-body">
                  <form class="forms-sample" method="post" enctype="multipart/form-data">

                  <?php
                if((new SiteIdentity())->demo == true){ ?>
                
                    <div class="form-group">
                      <label for="exampleInputUsername1">Items name</label>
                      <input type="text" class="form-control" id="exampleInputUsername1" placeholder="">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Price</label>
                      <input type="text" class="form-control" id="exampleInputEmail1" placeholder="">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Details</label>
                      <input type="text" class="form-control" id="exampleInputPassword1" placeholder="">
                    </div>
                    <img width='50px' src="<?php echo SITE_URL ?>/front/assets/pages/img/products/model2.jpg">
                    <div class="form-group">
                      <label for="exampleInputPassword1">Image</label> <br>
                      <input type="file">
                    </div>
                    <img width='50px' src="<?php echo SITE_URL ?>/front/assets/pages/img/products/model2.jpg">
                    <div class="form-group">
                      <label for="exampleInputPassword1">Gallery image 1</label> <br>
                      <input type="file">
                    </div>
                    <img width='50px' src="<?php echo SITE_URL ?>/front/assets/pages/img/products/model2.jpg">
                    <div class="form-group">
                      <label for="exampleInputPassword1">Gallery image 2</label> <br>
                      <input type="file">
                    </div>
                    <img width='50px' src="<?php echo SITE_URL ?>/front/assets/pages/img/products/model2.jpg">
                    <div class="form-group">
                      <label for="exampleInputPassword1">Gallery image 3</label> <br>
                      <input type="file">
                    </div>

                    <div class="form-group">
                        <label>Select  category</label>
                        <select class="js-example-basic-single w-100">
                        <option value="AL">Men</option>
                        <option value="WY">Women</option>
                        <option value="AM">Kids</option>
                        <option value="CA">Accessories</option>
                        <option value="RU">Electornic</option>
                        <option value="RU">Home and Garden</option>
                        <option value="RU">Sports</option>
                        </select>
                    </div>
                    <button type="" class="btn btn-primary mr-2">Save</button>
                    <button class="btn btn-light" onclick="history.back();">Cancel</button>

                  <?php }else{ 
                    $items_info = (new items())->get_item();
                    ?>
                    
                    <div class="form-group">
                      <label for="exampleInputUsername1">Items name</label>
                      <input type="text" class="form-control" id="exampleInputUsername1" name="items_name" value="<?php echo $items_info['items_name'] ?>"  placeholder="">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Price</label>
                      <input type="text" class="form-control" id="exampleInputEmail1" name="price" value="<?php echo $items_info['price'] ?>" placeholder="">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Regular Price</label>
                      <input type="text" class="form-control" id="exampleInputEmail1" name="regular_price" value="<?php echo $items_info['regular_price'] ?>" placeholder="">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Details</label>
                      <input type="text" class="form-control" id="exampleInputPassword1" name="details" value="<?php echo $items_info['details'] ?>" placeholder="">
                    </div>
                    <img width='50px' src="<?php echo SITE_URL .'/'.$items_info['items_img'] ?>">
                    <div class="form-group">
                      <label for="exampleInputPassword1">Image</label> <br>
                      <input type="file" name="items_img" value="">
                    </div>
                    <img width='50px' src="<?php echo SITE_URL.'/'.$items_info['gallery_img_1'] ?>">
                    <div class="form-group">
                      <label for="exampleInputPassword1">Gallery image 1</label> <br>
                      <input type="file" name="gallery_img_1" value="">
                    </div>
                    <img width='50px' src="<?php echo SITE_URL.'/'.$items_info['gallery_img_2'] ?>">
                    <div class="form-group">
                      <label for="exampleInputPassword1">Gallery image 2</label> <br>
                      <input type="file" name="gallery_img_2" value="">
                    </div>
                    <img width='50px' src="<?php echo SITE_URL.'/'.$items_info['gallery_img_3'] ?>">
                    <div class="form-group">
                      <label for="exampleInputPassword1">Gallery image 3</label> <br>
                      <input type="file" name="gallery_img_3" value="">
                      <input type="hidden" name="id" value="<?php echo $items_info['id'] ?>">
                    </div>

                    <?php
                      $categories = (new Categorys())->get_categorys();
                    ?>
                    <div class="form-group">
                        <label>Select  category</label>
                        <select name="category" class="js-example-basic-single">
                        <?php
                        foreach($categories as $category){
                        ?>
                        <option <?php if($category['id'] == $items_info['category']) echo('selected'); ?> value="<?php echo $category['id'] ?>"><?php echo $category['name'] ?></option>
                        <?php 
                        }
                        ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Select sticker</label>
                        <select name="sticker" class="js-example-basic-single">

                        <?php 
                        $sticker_info = (new Sticker())->get_stickers();
                        foreach($sticker_info as $index => $value){ ?> 

                        <option value="<?php echo $index ?>"<?php if($index == $items_info['sticker']){echo 'selected';} ?> ><?php echo $value['sticker'] ?></option>
                        
                        <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Add this :</label>
                        <select name="item_added" class="js-example-basic-single">

                        <?php 
                        foreach((new Item())->items_added as $index => $value){ ?>
                        <option value="<?php echo $index ;?>" <?php if($index == $items_info['item_added']){echo 'selected';} ?>><?php echo $value['item_ added'] ?></option>
                        <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Availability :</label>
                        <select name="availability" class="js-example-basic-single">
                          <option value="in stock" <?php if($items_info['availability'] == 'in stock'){echo 'selected';} ?> >In stock</option>
                          <option value="stock out"<?php if($items_info['availability'] == 'stock out'){echo 'selected';} ?> >Stock out</option>
                        </select>
                    </div>

                    <br>
              <div style="display: flex; justify-content:space-between;" class="row container">
                <div class="col-5">
                  <div class="table-responsive">
                  <h4>Product Colors :</h4>
                    <table  class="table">
                      <thead>
                        <tr>
                            <th>Colors</th>
                            <th>Options</th>
                        </tr>
                      </thead>
                      <tbody class="colorContainer">
                        <tr>
                        <td><input class="colors" type="text"  name="" value=""></td>
                        <td><button type="button" class="btn colorBtn">Add</button></td> 
                        </tr>
                        <?php 
                        $color_info = (new Colors())->get_colors($_GET['id']);
                        foreach($color_info as $color){?>
                        <tr>
                          <td><input type="text" name="colors[]" value="<?php echo $color['colors'] ?>"></td>
                          <td>
                            
                              <button type="button" name="remove" value="remove" class="btn btn-danger closeBtn">Remove</button>
                            
                          </td>
                        </tr>

                       <?php }
                        ?>
                      </tbody>
                    </table>
                  </div>
                </div>

                <div class="col-5">
                  <div class="table-responsive">
                  <h4>Product Sizes :</h4>
                    <table  class="table">
                      <thead >
                        <tr>
                            <th>Sizes</th>
                            <th>Options</th>
                        </tr>
                      </thead>
                      <tbody class="sizeContainer">
                        <tr>
                        <td><input class="sizes"  type="text"   name="" value=""></td>
                        <td><button type="button"  class="btn sizeBtn">Add</button></td> 
                        </tr>
                        <?php 
                        $size_info = (new Sizes())->get_sizes($_GET['id']);
                        foreach($size_info as $size){?>
                        <tr>
                          <td><input type="text" name="sizes[]" value="<?php echo $size['sizes'] ?>"></td>

                          <td>
                            <button type="button" name="remove" value="remove" class="btn btn-danger closeBtn">Remove</button>
                          </td>
                          
                        </tr>

                       <?php }
                        ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
              <br><br>
              <div class="container row">
                <div class="col-12">
                  <div class="table-responsive">
                  <h4>Product feature :</h4>
                    <table  class="table">
                      <thead>
                        <tr>
                            <th>Feature</th>
                            <th>Value</th>
                            <th>Options</th>
                        </tr>
                      </thead>
                      <tbody class="featureContainer">
                        <tr>
                        <td><input type="text" class="feature" name="" value=""></td>
                        <td><input type="text" class="value" name="" value=""></td>
                        <td><button type="button"  class="btn featureBtn">Add</button></td> 
                        </tr>
                        <?php 
                        $feature_info = (new AdditionalFeature())->get_features();
                        foreach($feature_info as $feature){?>
                        <tr>
                        <td><input type="text" name="features[]" value ="<?php echo $feature['features'] ?>"></td>
                        <td><input type="text" name="feature_values[]" value="<?php echo $feature['feature_values'] ?>"></td>
                          <td>
                            <button type="button" name="remove" value="remove" class="btn btn-danger closeBtn">Remove</button>
                          </td>
                          
                        </tr>

                       <?php }
                        ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>


                    <button type="submit" class="btn btn-primary mr-2" name="update" >Update</button>
                    <button class="btn btn-light" onclick="history.back();">Cancel</button>
                    <?php } ?>
                  </form>   
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
  </div>
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
  <script> 
          $(document).ready(function(){
            // color add control
            $('.colorBtn').click(function(){
              let colors = $('.colors').val().trim();
              let insertTd = "<tr><td>" + colors + "</td><td><button type='button' name='remove' value='remove' class='btn btn-danger closeBtn'>Remove</button></td></tr>"
              let colorInput = "<br><td><input type='hidden' name='colors[]' value ='" + colors + "'></td>"
              if(colors != ''){
                $('.colorContainer').append(insertTd).children('tr:last-child').append(colorInput);
                $('.colors').val('');
              }else{
                $('.colors').attr('placeholder', 'Color is required.');
              }
              if(colors != ''){
                $('.colors').removeAttr('placeholder');
              }
            });

            // size control...................
            $('.sizeBtn').click(function(){
              let sizes = $('.sizes').val().trim();
              let insertSizesTd = "<tr><td>" + sizes + "</td><td><button type='button' name='remove' value='remove' class='btn btn-danger closeBtn'>Remove</button></td></tr>"
              let sizeInput = "<br><td><input type='hidden' name='sizes[]' value ='" + sizes + "'></td>"
              if(sizes != ''){
                $('.sizeContainer').append(insertSizesTd).children('tr:last-child').append(sizeInput);
                $('.sizes').val('');
              }else{
                $('.sizes').attr('placeholder', 'Size is required.');
              }
              if(sizes != ''){
                $('.sizes').removeAttr('placeholder');
              }
            });

            //feature control....................
            $('.featureBtn').click(function(){
              let feature = $('.feature').val().trim();
              let value = $('.value').val().trim();
              let insertfeatuerTd = "<tr><td>" + feature + "</td><td>" + value + "</td><td><button type='button' name='remove' value='remove' class='btn btn-danger closeBtn'>Remove</button></td></tr>"
              let featureInput = "<br><td><input type='hidden' name='features[]' value ='" + feature + "'></td><td><input type='hidden' name='feature_values[]' value ='" + value + "'></td>"
              if(feature != '' && value != ''){
                $('.featureContainer').append(insertfeatuerTd).children('tr:last-child').append(featureInput);
                $('.feature').val('');
                $('.value').val('');
              }else{
                $('.feature').attr('placeholder', 'feature is required.');
                $('.value').attr('placeholder', 'value is required.');
              }
              if(feature != '' && value != ''){
                $('.feature').removeAttr('placeholder');
                $('.value').removeAttr('placeholder');
              }
            });

            $('.container').on('click', '.closeBtn', function(){
              $(this).closest('tr').remove();
            })
          })
  </script>  
  <!-- End custom js for this page-->
</body>


<!-- Mirrored from www.urbanui.com/melody/template/pages/tables/data-table.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 15 Sep 2018 06:08:41 GMT -->
</html>