<?php 

class ItemsView {

    public function __construct()
    {
        if((new SiteIdentity())->demo == false){
            $selected_item_info = (new items())-> selected_item_info_by_id();
                $this->selected_item = [
                    "item_img" => $selected_item_info['items_img'],
                    "name" => $selected_item_info['items_name'] ,
                    "price" => $selected_item_info['price'],
                    "regular_price" => $selected_item_info['regular_price'],
                    "description" => $selected_item_info['details'],
                    "availability" => $selected_item_info['availability'],
                    "gellery_img" => [
                        [
                            "img" => SITE_URL.'/'.$selected_item_info['gallery_img_1']
                        ],
                        [
                            "img" => SITE_URL.'/'.$selected_item_info['gallery_img_2']
                        ],
                        [
                            "img" => SITE_URL.'/'.$selected_item_info['gallery_img_3']
                        ]
                    ],
                    'sticker' => $selected_item_info['sticker']
                ];

                $this->feature_info = (new AdditionalFeature())->get_features();
                $this->reviews = (new Reviews())->get_reviews();



            

            
        }
    }

    public $best_seller = [
        [
            "item_img" => SITE_URL."/front/assets/pages/img/products/k1.jpg",
            "name" => "Some Shoes in Animal with Cut Out 1",
            "price" => 30.00,
            "link" => "#"
        ],
        [
            "item_img" => SITE_URL."/front/assets/pages/img/products/k4.jpg",
            "name" => "Some Shoes in Animal with Cut Out 3",
            "price" => 50.00,
            "link" => "#"
        ],
        [
            "item_img" => SITE_URL."/front/assets/pages/img/products/k3.jpg",
            "name" => "Some Shoes in Animal with Cut Out 5",
            "price" => 60.00,
            "link" => "#"
        ],
    ];

    public $selected_item = [
        
            "item_img" => SITE_URL."/front/assets/pages/img/products/model4.jpg",
            "name" => "Cool green dress with red bell",
            "price" => 46.00,
            "regular_price" => 3432,
            "description" => "Lorem ipsum dolor ut sit ame dolore adipiscing elit, sed nonumy nibh sed euismod laoreet dolore magna aliquarm erat volutpat Nostrud duis molestie at dolore.",
            "gellery_img" => [
                [
                    "img" => SITE_URL."/front/assets/pages/img/products/model1.jpg"
                ],
                [
                    "img" => SITE_URL."/front/assets/pages/img/products/model2.jpg",
                ],
                [
                    "img" => SITE_URL."/front/assets/pages/img/products/model4.jpg"
                ]
            ],
            "sizes" => ['S','M','L','XL','XXL'],

            "colors" => ['Red','Blue','Green','Yellow'],
            'sticker' => 1
        ];
    

    public $description = "Lorem ipsum dolor ut sit ame dolore adipiscing elit, sed sit nonumy nibh sed euismod laoreet dolore magna aliquarm erat sit volutpat Nostrud duis molestie at dolore. Lorem ipsum dolor ut sit ame dolore adipiscing elit, sed sit nonumy nibh sed euismod laoreet dolore magna aliquarm erat sit volutpat Nostrud duis molestie at dolore. Lorem ipsum dolor ut sit ame dolore adipiscing elit, sed sit nonumy nibh sed euismod laoreet dolore magna aliquarm erat sit volutpat Nostrud duis molestie at dolore. ";

    public $feature_info = [
            [
                "features" => "value 1",
                "feature_values" => "21 cm"
            ],
            [
                "features" => "value 2",
                "feature_values" => "700 gr."
            ],
            [
                "features" => "value 3",
                "feature_values" => "10 person"
            ],
            [
                "features" => "value 4",
                "feature_values" => "14 cm"
            ],
            [
                "features" => "value 5",
                "feature_values" => "plastic"
            ]

        ];

    public $reviews = [
        [
            "name" => "Bob",
            "date" => "30/12/2013",
            "time" => "07:37",
            "rating" => 3,
            "review" => "Sed velit quam, auctor id semper a, hendrerit eget justo. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Duis vel arcu pulvinar dolor tempus feugiat id in orci. Phasellus sed erat leo. Donec luctus, justo eget ultricies tristique, enim mauris bibendum orci, a sodales lectus purus ut lorem."
        ],
        [
            "name" => "Mary",
            "date" => "13/12/2013",
            "time" => "17:49",
            "rating" => 3,
            "review" => "Sed velit quam, auctor id semper a, hendrerit eget justo. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Duis vel arcu pulvinar dolor tempus feugiat id in orci. Phasellus sed erat leo. Donec luctus, justo eget ultricies tristique, enim mauris bibendum orci, a sodales lectus purus ut lorem."
        ],

    ];

    public $similar_items = [
        [
            "title" => "Designed black dress",
            "price" => 29.00,
            "items_img" => SITE_URL."/front/assets/pages/img/products/model2.jpg",
            "new" => 1,
            "sell" => 0
        ],
        [
            "title" => "Beautiful Red tea shirt",
            "price" => 30.00,
            "items_img" => SITE_URL."/front/assets/pages/img/products/model6.jpg",
            "new" => 0,
            "sell" => 0
        ],
        [
            "title" => "Berry Lace Dress4",
            "price" => 50.00,
            "items_img" => SITE_URL."/front/assets/pages/img/products/model5.jpg",
            "new" => 0,
            "sell" => 1
        ],
        [
            "title" => "Black and white shirt",
            "price" => 80.00,
            "items_img" => SITE_URL."/front/assets/pages/img/products/model3.jpg",
            "new" => 0,
            "sell" => 0
        ],
        [
            "title" => "Yellow lady shirt",
            "price" => 70.00,
            "items_img" => SITE_URL."/front/assets/pages/img/products/model6.jpg",
            "new" => 1,
            "sell" => 0
        ],
        [
            "title" => "Men tea shirt",
            "price" => 70.00,
            "items_img" => SITE_URL."/front/assets/pages/img/products/model4.jpg",
            "new" => 0,
            "sell" => 0
        ]
    ];

    public $social_share = [
        [
            "class" => "facebook",
            "link" => "#"
        ],
        [
            "class" => "twitter",
            "link" => "#"
        ],
        [
            "class" => "googleplus",
            "link" => "#"
        ],
        [
            "class" => "evernote",
            "link" => "#"
        ],
        [
            "class" => "tumblr",
            "link" => "#"
        ]
        ];




}



?>