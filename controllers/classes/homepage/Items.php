<?php
    class Item {

        function __construct()
        {
            if((new SiteIdentity())->demo == false){
                $this->arrivals = (new items())->get_items_for_new_arrivals();
                $this->three_items = (new items())->get_items_for_three_items();
                $this->two_items = (new items())->get_items_for_two_items();
            }
        }


        public $arrivals = [
                [
                    "items_name" => "Designed black dress",
                    "price" => 29.00,
                    "details" =>"Lorem ipsum dolor ut sit ame dolore  adipiscing elit, sed nonumy nibh sed euismod laoreet dolore magna aliquarm erat volutpat Nostrud duis molestie at dolore.",
                    "items_img" => SITE_URL."/front/assets/pages/img/products/model2.jpg",
                    "gallery_img_1" => SITE_URL . "/front/assets/pages/img/products/model3.jpg",
                    "gallery_img_2" => SITE_URL ."/front/assets/pages/img/products/model4.jpg",
                    "gallery_img_3" => SITE_URL ."/front/assets/pages/img/products/model5.jpg",
                    "sticker" => 1,
                    "id" => 1,
                    "availability" => 'in stock',
                    "size" => "s,m,l"
                ],
                [
                    "items_name" => "Beautiful Red tea shirt",
                    "price" => 30.00,
                    "details" =>"Lorem ipsum dolor ut sit ame dolore  adipiscing elit, sed nonumy nibh sed euismod laoreet dolore magna aliquarm erat volutpat Nostrud duis molestie at dolore.",
                    "items_img" => SITE_URL."/front/assets/pages/img/products/model6.jpg",
                    "gallery_img_1" => SITE_URL . "/front/assets/pages/img/products/model3.jpg",
                    "gallery_img_2" => SITE_URL ."/front/assets/pages/img/products/model4.jpg",
                    "gallery_img_3" => SITE_URL ."/front/assets/pages/img/products/model5.jpg",
                    "sticker" => 1,
                    "id" => 1,
                    "availability" => 'in stock',
                    "size" => "s,m,l"
                    
                ],
                [
                    "items_name" => "Berry Lace Dress4",
                    "price" => 50.00,
                    "details" =>"Lorem ipsum dolor ut sit ame dolore  adipiscing elit, sed nonumy nibh sed euismod laoreet dolore magna aliquarm erat volutpat Nostrud duis molestie at dolore.",
                    "items_img" => SITE_URL."/front/assets/pages/img/products/model5.jpg",
                    "gallery_img_1" => SITE_URL . "/front/assets/pages/img/products/model3.jpg",
                    "gallery_img_2" => SITE_URL ."/front/assets/pages/img/products/model4.jpg",
                    "gallery_img_3" => SITE_URL ."/front/assets/pages/img/products/model5.jpg",
                    "sticker" => 2,
                    "id" => 1,
                    "availability" => 'in stock',
                    "size" => "s,m,l"
                ],
                [
                    "items_name" => "Black and white shirt",
                    "price" => 80.00,
                    "details" =>"Lorem ipsum dolor ut sit ame dolore  adipiscing elit, sed nonumy nibh sed euismod laoreet dolore magna aliquarm erat volutpat Nostrud duis molestie at dolore.",
                    "items_img" => SITE_URL."/front/assets/pages/img/products/model3.jpg",
                    "gallery_img_1" => SITE_URL . "/front/assets/pages/img/products/model3.jpg",
                    "gallery_img_2" => SITE_URL ."/front/assets/pages/img/products/model4.jpg",
                    "gallery_img_3" => SITE_URL ."/front/assets/pages/img/products/model5.jpg",
                    "sticker" => 0,
                    "id" => 1,
                    "availability" => 'in stock',
                    "size" => "s,m,l"
                ],
                [
                    "items_name" => "Yellow lady shirt",
                    "price" => 70.00,
                    "details" =>"Lorem ipsum dolor ut sit ame dolore  adipiscing elit, sed nonumy nibh sed euismod laoreet dolore magna aliquarm erat volutpat Nostrud duis molestie at dolore.",
                    "items_img" => SITE_URL."/front/assets/pages/img/products/model6.jpg",
                    "gallery_img_1" => SITE_URL . "/front/assets/pages/img/products/model3.jpg",
                    "gallery_img_2" => SITE_URL ."/front/assets/pages/img/products/model4.jpg",
                    "gallery_img_3" => SITE_URL ."/front/assets/pages/img/products/model5.jpg",
                    "sticker" => 1,
                     "id" => 1,
                    "availability" => 'in stock',
                    "size" => "s,m,l"
                ],
                [
                    "items_name" => "Men tea shirt",
                    "price" => 70.00,
                    "details" =>"Lorem ipsum dolor ut sit ame dolore  adipiscing elit, sed nonumy nibh sed euismod laoreet dolore magna aliquarm erat volutpat Nostrud duis molestie at dolore.",
                    "items_img" => SITE_URL."/front/assets/pages/img/products/model4.jpg",
                    "gallery_img_1" => SITE_URL . "/front/assets/pages/img/products/model3.jpg",
                    "gallery_img_2" => SITE_URL ."/front/assets/pages/img/products/model4.jpg",
                    "gallery_img_3" => SITE_URL ."/front/assets/pages/img/products/model5.jpg",
                    "sticker" => 0,
                    "id" => 1,
                    "availability" => 'in stock',
                    "size" => "s,m,l"
                ]
            ];


        public $three_items = [
            [
                "items_name" => "BERRY LACE DRESS",
                "price" => 40.00,
                "details" =>"Lorem ipsum dolor ut sit ame dolore  adipiscing elit, sed nonumy nibh sed euismod laoreet dolore magna aliquarm erat volutpat Nostrud duis molestie at dolore.",
                "items_img" =>SITE_URL. "/front/assets/pages/img/products/k1.jpg",
                "gallery_img_1" => SITE_URL . "/front/assets/pages/img/products/model3.jpg",
                "gallery_img_2" => SITE_URL ."/front/assets/pages/img/products/model4.jpg",
                "gallery_img_3" => SITE_URL ."/front/assets/pages/img/products/model5.jpg",
                "sticker" => 1
            ],
            [
                "items_name" => "BERRY LACE DRESS1",
                "price" => 50.00,
                "details" =>"Lorem ipsum dolor ut sit ame dolore  adipiscing elit, sed nonumy nibh sed euismod laoreet dolore magna aliquarm erat volutpat Nostrud duis molestie at dolore.",
                "items_img" =>SITE_URL. "/front/assets/pages/img/products/k2.jpg",
                "gallery_img_1" => SITE_URL . "/front/assets/pages/img/products/model3.jpg",
                "gallery_img_2" => SITE_URL ."/front/assets/pages/img/products/model4.jpg",
                "gallery_img_3" => SITE_URL ."/front/assets/pages/img/products/model5.jpg",
                "sticker" => 0
            ],
            [
                "items_name" => "BERRY LACE DRESS2",
                "price" => 60.00,
                "details" =>"Lorem ipsum dolor ut sit ame dolore  adipiscing elit, sed nonumy nibh sed euismod laoreet dolore magna aliquarm erat volutpat Nostrud duis molestie at dolore.",
                "items_img" =>SITE_URL. "/front/assets/pages/img/products/k3.jpg",
                "gallery_img_1" => SITE_URL . "/front/assets/pages/img/products/model3.jpg",
                "gallery_img_2" => SITE_URL ."/front/assets/pages/img/products/model4.jpg",
                "gallery_img_3" => SITE_URL ."/front/assets/pages/img/products/model5.jpg",
                "sticker" => 2
            ],
            [
                "items_name" => "BERRY LACE DRESS3",
                "price" => 80.00,
                "details" =>"Lorem ipsum dolor ut sit ame dolore  adipiscing elit, sed nonumy nibh sed euismod laoreet dolore magna aliquarm erat volutpat Nostrud duis molestie at dolore.",
                "items_img" =>SITE_URL. "/front/assets/pages/img/products/k4.jpg",
                "gallery_img_1" => SITE_URL . "/front/assets/pages/img/products/model3.jpg",
                "gallery_img_2" => SITE_URL ."/front/assets/pages/img/products/model4.jpg",
                "gallery_img_3" => SITE_URL ."/front/assets/pages/img/products/model5.jpg",
                "sticker" => 1
            ],
            [
                "items_name" => "BERRY LACE DRESS4",
                "price" => 50.00,
                "details" =>"Lorem ipsum dolor ut sit ame dolore  adipiscing elit, sed nonumy nibh sed euismod laoreet dolore magna aliquarm erat volutpat Nostrud duis molestie at dolore.",
                "items_img" =>SITE_URL. "/front/assets/pages/img/products/k2.jpg",
                "gallery_img_1" => SITE_URL . "/front/assets/pages/img/products/model3.jpg",
                "gallery_img_2" => SITE_URL ."/front/assets/pages/img/products/model4.jpg",
                "gallery_img_3" => SITE_URL ."/front/assets/pages/img/products/model5.jpg",
                "sticker" => 2
                 
            ],
            [
                "items_name" => "BERRY LACE DRESS5",
                "price" => 40.00,
                "details" =>"Lorem ipsum dolor ut sit ame dolore  adipiscing elit, sed nonumy nibh sed euismod laoreet dolore magna aliquarm erat volutpat Nostrud duis molestie at dolore.",
                "items_img" =>SITE_URL. "/front/assets/pages/img/products/k1.jpg",
                "gallery_img_1" => SITE_URL . "/front/assets/pages/img/products/model3.jpg",
                "gallery_img_2" => SITE_URL ."/front/assets/pages/img/products/model4.jpg",
                "gallery_img_3" => SITE_URL ."/front/assets/pages/img/products/model5.jpg",
                "sticker" => 0
            ],

        ];

        public $two_items = [
            [
                "items_name" => "BERRY LACE DRESS5",
                "price" => 40.00,
                "details" =>"Lorem ipsum dolor ut sit ame dolore  adipiscing elit, sed nonumy nibh sed euismod laoreet dolore magna aliquarm erat volutpat Nostrud duis molestie at dolore.",
                "items_img" =>SITE_URL. "/front/assets/pages/img/products/k4.jpg",
                "gallery_img_1" => SITE_URL . "/front/assets/pages/img/products/model3.jpg",
                "gallery_img_2" => SITE_URL ."/front/assets/pages/img/products/model4.jpg",
                "gallery_img_3" => SITE_URL ."/front/assets/pages/img/products/model5.jpg",
                "sticker" => 0
            ],
            [
                "items_name" => "BERRY LACE DRESS3",
                "price" => 80.00,
                "details" =>"Lorem ipsum dolor ut sit ame dolore  adipiscing elit, sed nonumy nibh sed euismod laoreet dolore magna aliquarm erat volutpat Nostrud duis molestie at dolore.",
                "items_img" =>SITE_URL. "/front/assets/pages/img/products/k2.jpg",
                "gallery_img_1" => SITE_URL . "/front/assets/pages/img/products/model3.jpg",
                "gallery_img_2" => SITE_URL ."/front/assets/pages/img/products/model4.jpg",
                "gallery_img_3" => SITE_URL ."/front/assets/pages/img/products/model5.jpg",
                "sticker" => 1
            ],
            [
                "items_name" => "BERRY LACE DRESS",
                "price" => 40.00,
                "details" =>"Lorem ipsum dolor ut sit ame dolore  adipiscing elit, sed nonumy nibh sed euismod laoreet dolore magna aliquarm erat volutpat Nostrud duis molestie at dolore.",
                "items_img" =>SITE_URL. "/front/assets/pages/img/products/k1.jpg",
                "gallery_img_1" => SITE_URL . "/front/assets/pages/img/products/model3.jpg",
                "gallery_img_2" => SITE_URL ."/front/assets/pages/img/products/model4.jpg",
                "gallery_img_3" => SITE_URL ."/front/assets/pages/img/products/model5.jpg",
                "sticker" => 2
            ],
            [
                "items_name" => "BERRY LACE DRESS5",
                "price" => 40.00,
                "details" =>"Lorem ipsum dolor ut sit ame dolore  adipiscing elit, sed nonumy nibh sed euismod laoreet dolore magna aliquarm erat volutpat Nostrud duis molestie at dolore.",
                "items_img" =>SITE_URL. "/front/assets/pages/img/products/k4.jpg",
                "gallery_img_1" => SITE_URL . "/front/assets/pages/img/products/model3.jpg",
                "gallery_img_2" => SITE_URL ."/front/assets/pages/img/products/model4.jpg",
                "gallery_img_3" => SITE_URL ."/front/assets/pages/img/products/model5.jpg",
                "sticker" => 0
            ],
            [
                "items_name" => "BERRY LACE DRESS3",
                "price" => 80.00,
                "details" =>"Lorem ipsum dolor ut sit ame dolore  adipiscing elit, sed nonumy nibh sed euismod laoreet dolore magna aliquarm erat volutpat Nostrud duis molestie at dolore.",
                "items_img" =>SITE_URL. "/front/assets/pages/img/products/k2.jpg",
                "gallery_img_1" => SITE_URL . "/front/assets/pages/img/products/model3.jpg",
                "gallery_img_2" => SITE_URL ."/front/assets/pages/img/products/model4.jpg",
                "gallery_img_3" => SITE_URL ."/front/assets/pages/img/products/model5.jpg",
                "sticker" => 1 
            ],
            [
                "items_name" => "BERRY LACE DRESS",
                "price" => 40.00,
                "details" =>"Lorem ipsum dolor ut sit ame dolore  adipiscing elit, sed nonumy nibh sed euismod laoreet dolore magna aliquarm erat volutpat Nostrud duis molestie at dolore.",
                "items_img" =>SITE_URL. "/front/assets/pages/img/products/k1.jpg",
                "gallery_img_1" => SITE_URL . "/front/assets/pages/img/products/model3.jpg",
                "gallery_img_2" => SITE_URL ."/front/assets/pages/img/products/model4.jpg",
                "gallery_img_3" => SITE_URL ."/front/assets/pages/img/products/model5.jpg",
                "sticker" => 0 
            ],
        ];

        public $items_added = [
            [
                'item_ added' => 'None'
            ],
            [
                'item_ added' => 'Two items'
            ],
            [
                'item_ added' => 'Three items'
            ]
        ];

    }

?>