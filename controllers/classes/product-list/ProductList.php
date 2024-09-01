<?php 
    class ProductInfo {
      function __construct()
      {
        if((new SiteIdentity())->demo == false){
          $this->items = (new items())->get_items();
          $this->sticker = (new Sticker())->get_stickers();
        }
      }



        public $banner = [
            "bg_img" => SITE_URL."/front/assets/pages/img/title-bg/man.jpg",
            "category_type" => [
                "type" => "MEN",
                "color" => "red"
            ],
            "category" => "category",
            "subtitle" => "Over 4000 Items are available here"
        ];

        public $items = [
            [
                "items_name" => "Designed black dress",
                "price" => 29.00,
                "items_img" => SITE_URL."/front/assets/pages/img/products/model2.jpg",
                "gallery_img_1" => SITE_URL . "/front/assets/pages/img/products/model3.jpg",
                "gallery_img_2" => SITE_URL ."/front/assets/pages/img/products/model4.jpg",
                "gallery_img_3" => SITE_URL ."/front/assets/pages/img/products/model5.jpg",
                "new" => 1,
                "sell" => 1
            ],
            [
                "items_name" => "Beautiful Red tea shirt",
                "price" => 30.00,
                "items_img" => SITE_URL."/front/assets/pages/img/products/model6.jpg",
                "gallery_img_1" => SITE_URL . "/front/assets/pages/img/products/model3.jpg",
                "gallery_img_2" => SITE_URL ."/front/assets/pages/img/products/model4.jpg",
                "gallery_img_3" => SITE_URL ."/front/assets/pages/img/products/model5.jpg",
                "new" => 0,
                "sell" => 0
            ],
            [
                "items_name" => "Berry Lace Dress4",
                "price" => 50.00,
                "items_img" => SITE_URL."/front/assets/pages/img/products/model5.jpg",
                "gallery_img_1" => SITE_URL . "/front/assets/pages/img/products/model3.jpg",
                "gallery_img_2" => SITE_URL ."/front/assets/pages/img/products/model4.jpg",
                "gallery_img_3" => SITE_URL ."/front/assets/pages/img/products/model5.jpg",
                "new" => 0,
                "sell" => 1
            ],
            [
                "items_name" => "Black and white shirt",
                "price" => 80.00,
                "items_img" => SITE_URL."/front/assets/pages/img/products/model3.jpg",
                "gallery_img_1" => SITE_URL . "/front/assets/pages/img/products/model3.jpg",
                "gallery_img_2" => SITE_URL ."/front/assets/pages/img/products/model4.jpg",
                "gallery_img_3" => SITE_URL ."/front/assets/pages/img/products/model5.jpg",
                "new" => 0,
                "sell" => 0
            ],
            [
                "items_name" => "Yellow lady shirt",
                "price" => 70.00,
                "items_img" => SITE_URL."/front/assets/pages/img/products/model6.jpg",
                "gallery_img_1" => SITE_URL . "/front/assets/pages/img/products/model3.jpg",
                "gallery_img_2" => SITE_URL ."/front/assets/pages/img/products/model4.jpg",
                "gallery_img_3" => SITE_URL ."/front/assets/pages/img/products/model5.jpg",
                "new" => 1,
                "sell" => 0
            ],
            [
                "items_name" => "Men tea shirt",
                "price" => 70.00,
                "items_img" => SITE_URL."/front/assets/pages/img/products/model4.jpg",
                "gallery_img_1" => SITE_URL . "/front/assets/pages/img/products/model3.jpg",
                "gallery_img_2" => SITE_URL ."/front/assets/pages/img/products/model4.jpg",
                "gallery_img_3" => SITE_URL ."/front/assets/pages/img/products/model5.jpg",
                "new" => 0,
                "sell" => 0
            ],
            [
                "items_name" => "Black and white shirt",
                "price" => 80.00,
                "items_img" => SITE_URL."/front/assets/pages/img/products/model3.jpg",
                "gallery_img_1" => SITE_URL . "/front/assets/pages/img/products/model3.jpg",
                "gallery_img_2" => SITE_URL ."/front/assets/pages/img/products/model4.jpg",
                "gallery_img_3" => SITE_URL ."/front/assets/pages/img/products/model5.jpg",
                "new" => 0,
                "sell" => 0
            ],
            [
                "items_name" => "Yellow lady shirt",
                "price" => 70.00,
                "items_img" => SITE_URL."/front/assets/pages/img/products/model6.jpg",
                "gallery_img_1" => SITE_URL . "/front/assets/pages/img/products/model3.jpg",
                "gallery_img_2" => SITE_URL ."/front/assets/pages/img/products/model4.jpg",
                "gallery_img_3" => SITE_URL ."/front/assets/pages/img/products/model5.jpg",
                "new" => 1,
                "sell" => 0
            ],
            [
                "items_name" => "Designed black dress",
                "price" => 29.00,
                "items_img" => SITE_URL."/front/assets/pages/img/products/model2.jpg",
                "gallery_img_1" => SITE_URL . "/front/assets/pages/img/products/model3.jpg",
                "gallery_img_2" => SITE_URL ."/front/assets/pages/img/products/model4.jpg",
                "gallery_img_3" => SITE_URL ."/front/assets/pages/img/products/model5.jpg",
                "new" => 1,
                "sell" => 1
            ]
        ];
        public $sticker = [
          [
            'sticker' => 'None',
            'value' => 0
          ],
          [
            'sticker' => 'new',
            'value' => 1
          ],
          [
            'sticker' => 'Sale',
            'value' => 2
          ]
        ];


        public $sort_by = [
          [
            "value" => "#?sort=p.sort_order",
            "order_type" => "order=ASC",
            "order_by" => "Default"
          ],
          [
            "value" => "#?sort=pd.name",
            "order_type" => "order=ASC",
            "order_by" => "Name (A - Z)"
          ],
          [
            "value" => "#?sort=pd.name",
            "order_type" => "order=ASC",
            "order_by" => "Name (Z - A)"
          ],
          [
            "value" => "#?sort=p.price",
            "order_type" => "order=ASC",
            "order_by" => "Price (Low &gt;  High)"
          ],
          [
            "value" => "#?sort=p.price",
            "order_type" => "order=ASC",
            "order_by" => "Rating (Highest)"
          ],
          [
            "value" => "#?sort=rating",
            "order_type" => "order=DESC",
            "order_by" => "Rating (Lowest)"
          ],
          [
            "value" => "#?sort=rating",
            "order_type" => "order=DESC",
            "order_by" => "Model (A - Z)"
          ],
          [
            "value" => "#?sort=p.model",
            "order_type" => "order=DESC",
            "order_by" => "Model (Z - A)"
          ],
          [
            "value" => "#?sort=p.model",
            "order_type" => "order=DESC",
            "order_by" => "Model (Z - A)"
          ]
        ];

        public $control_label = [
            [
                "value" => "#?limit=24",
                "number" => "24"
            ],
            [
                "value" => "#?limit=25",
                "number" => "25"
            ],
            [
                "value" => "#?limit=50",
                "number" => "50"
            ],
            [
                "value" => "#?limit=75",
                "number" => "75"
            ],
            [
                "value" => "#?limit=100",
                "number" => "100"
            ]
        ];

        public $paginator = [
          [
            "number" => "1",
            "link" => "#"
          ],
          [
            "number" => "2",
            "link" => "#"
          ],
          [
            "number" => "3",
            "link" => "#"
          ],
          [
            "number" => "4",
            "link" => "#"
          ],
          [
            "number" => "5",
            "link" => "#"
          ]   
        ];



    }

?>