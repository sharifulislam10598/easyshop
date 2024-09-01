    <?php $brands = new Brands(); ?>
    
    <div class="brands">
      <div class="container">
            <div class="owl-carousel owl-carousel6-brands">
              <?php foreach($brands -> popular_brand as $value){ ?>
              <a href="<?php echo $value["link"]; ?>" ><img src="<?php if((new SiteIdentity())->demo == false){ echo SITE_URL .'/';} echo $value["brand_img"];?>"></a>
              <?php } ?>
            </div>
        </div>
    </div>