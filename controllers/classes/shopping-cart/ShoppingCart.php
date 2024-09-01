<?php
class DemoCart
{
    function __construct()
    {
        if ((new SiteIdentity())->demo == false) {
            $carted_item_info = (new Cart())->get_carted_item();
            $this->demo_cart_items = $carted_item_info;
            $this->top_cart_item = $carted_item_info;
            $this->similar_items = (new Reviews())->most_popular_items();
        }
    }




    public $demo_cart_items = [
        [
            "items_img" => SITE_URL . "/front/assets/pages/img/products/model3.jpg",
            "items_name" => "Cool green dress with red bell",
            "color" => "Green",
            "size" => "S",
            "link" => "#",
            "quantity" => 12,
            "price" => "47.00"
        ],
        [
            "items_img" => SITE_URL . "/front/assets/pages/img/products/model4.jpg",
            "items_name" => "Cool green dress with red bell 2",
            "color" => "Red",
            "size" => "L",
            "link" => "#",
            "quantity" => 2,
            "price" => "50.00"
        ]
    ];


    public $similar_items = [

        [
            "items_img" => SITE_URL . "/front/assets/pages/img/products/model3.jpg",
            "items_name" => "Cool green dress with red bell",
            "color" => "Green",
            "size" => "S",
            "link" => "#",
            "quantity" => 12,
            "price" => "47.00",
            'sticker' => 1
            
        ],
        [
            "items_img" => SITE_URL . "/front/assets/pages/img/products/model4.jpg",
            "items_name" => "Cool green dress with red bell 2",
            "color" => "Red",
            "size" => "L",
            "link" => "#",
            "quantity" => 2,
            "price" => "50.00",
            'sticker' => 2
        ],
        [
            "items_img" => SITE_URL . "/front/assets/pages/img/products/model4.jpg",
            "items_name" => "Cool green dress with red bell 2",
            "color" => "Red",
            "size" => "L",
            "link" => "#",
            "quantity" => 2,
            "price" => "50.00",
            'sticker' => 1

        ],
        [
            "items_img" => SITE_URL . "/front/assets/pages/img/products/model4.jpg",
            "items_name" => "Cool green dress with red bell 2",
            "color" => "Red",
            "size" => "L",
            "link" => "#",
            "quantity" => 2,
            "price" => "50.00",
            'sticker' => 2
        ],
        [
            "items_img" => SITE_URL . "/front/assets/pages/img/products/model4.jpg",
            "items_name" => "Cool green dress with red bell 2",
            "color" => "Red",
            "size" => "L",
            "link" => "#",
            "quantity" => 2,
            "price" => "50.00",
            'sticker' => 0
        ],
        [
            "items_img" => SITE_URL . "/front/assets/pages/img/products/model4.jpg",
            "items_name" => "Cool green dress with red bell 2",
            "color" => "Red",
            "size" => "L",
            "link" => "#",
            "quantity" => 2,
            "price" => "50.00",
            'sticker' => 1
        ],
        [
            "items_img" => SITE_URL . "/front/assets/pages/img/products/model4.jpg",
            "items_name" => "Cool green dress with red bell 2",
            "color" => "Red",
            "size" => "L",
            "link" => "#",
            "quantity" => 2,
            "price" => "50.00",
            'sticker' => 2
        ]
    ];



    public $top_cart_item =  [
        [
            'id' => '1',
            'items_name' => 'Rolex Classic Watch',
            'quantity' => 1,
            'items_img' => SITE_URL . '/front/assets/pages/img/cart-img.jpg',
            'price' => 1280
        ],
        [
            'id' => '2',
            'items_name' => 'Rolex Classic Watch',
            'quantity' => 5,
            'items_img' => SITE_URL . '/front/assets/pages/img/cart-img.jpg',
            'price' => 1280
        ],
        [
            'id' => '3',
            'items_name' => 'Rolex Classic Watch',
            'quantity' => 1,
            'items_img' => SITE_URL . '/front/assets/pages/img/cart-img.jpg',
            'price' => 1280
        ],
        [
            'id' => '4',
            'items_name' => 'Rolex Classic Watch',
            'quantity' => 1,
            'items_img' => SITE_URL . '/front/assets/pages/img/cart-img.jpg',
            'price' => 1280
        ],
        [
            'id' => '5',
            'items_name' => 'Rolex Classic Watch',
            'quantity' => 9,
            'items_img' => SITE_URL . '/front/assets/pages/img/cart-img.jpg',
            'price' => 1280
        ],
        [
            'id' => '6',
            'items_name' => 'Rolex Classic Watch',
            'quantity' => 1,
            'items_img' => SITE_URL . '/front/assets/pages/img/cart-img.jpg',
            'price' => 1280
        ]
    ];
}
