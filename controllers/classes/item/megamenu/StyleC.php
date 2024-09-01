<?php
    class StyleC {

        // new item dropdown menu.....................
        public $new_items = [
            [
                "items_img" => SITE_URL ."/front/assets/pages/img/products/model4.jpg",
                "items_title" => "Berry Lace Dress",
                "items_price" => 29.00,
                "link" => "#"
            ],
            [
                "items_img" => SITE_URL . "/front/assets/pages/img/products/model4.jpg",
                "items_title" => "Berry Lace Dress 2",
                "items_price" => 38.00,
                "link" => "#"
            ],
            [
                "items_img" => SITE_URL."/front/assets/pages/img/products/model4.jpg",
                "items_title" => "Berry Lace Dress 3",
                "items_price" => 50.00,
                "link" => "#"
            ],
            [
                "items_img" => SITE_URL ."/front/assets/pages/img/products/model4.jpg",
                "items_title" => "Berry Lace Dress 4",
                "items_price" => 60.00,
                "link" => ""
            ],

        ];
        public function render(){ ?>
                <ul class="dropdown-menu">
                    <li>
                        <div class="header-navigation-content">
                        <div class="row">
                            <?php foreach($this->new_items as $item){?>   
                            <div class="col-md-3 col-sm-4 col-xs-6">
                                <div class="product-item">
                                    <div class="pi-img-wrapper">
                                    <a href="<?php echo $item['link'] ?>"><img src="<?php echo $item['items_img'] ?>" class="img-responsive" ></a>
                                    </div>
                                    <h3><a href="<?php echo $item['link'] ?>"><?php echo $item['items_title'] ?></a></h3>
                                    <div class="pi-price"><?php echo "$".$item['items_price'] ?></div>
                                    <a href="<?php echo $item['link'] ?>" class="btn btn-default add2cart">Add to cart</a>
                                </div>
                            </div>
                            <?php }  ?>
                        </div>
                        </div>
                    </li>
                </ul>
        <!-- end new item dropdown menu -->
    <?php } } ?>