<?php 
    class Footer{
        function __construct()
        {
            if((new SiteIdentity())->demo == false){
                $this->social_icon = (new SocialNetwork())->get_icons();
                $this->about_us = (new AboutUs())-> get_about_info();
                $this->information = (new Information())->get_informations();
                $this->contacts = (new OurContacts())->get_contacts_info();
            }

        }

        public $about_us = [
           "title" => "About us",
           "article_1" => "Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam sit nonummy nibh euismod tincidunt ut laoreet dolore magna aliquarm erat sit volutpat. Nostrud exerci tation ullamcorper suscipit lobortis nisl aliquip  commodo consequat.",
           "article_2" => "Duis autem vel eum iriure dolor vulputate velit esse molestie at dolore." 
        ];
        public $info_title = "information";
        public $information = [
            [
                "subject" => "Delivery Information",
                "link" => "#"
            ],
            [
                "subject" => "Customer Service",
                "link" => "#"
            ],
            [
                "subject" => "Order Tracking",
                "link" => "#"
            ],
            [
                "subject" => "Shipping & Returns",
                "link" => "#"
            ],
            [
                "subject" => "Contact Us",
                "link" => "#"
            ],
            [
                "subject" => "Careers",
                "link" => "#"
            ],
            [
                "subject" => "Payment Methods",
                "link" => "#"
            ]
        ];


        public $tweets = [
            "tweets_title" => "Latest Tweets",
            "tweet_name" => "Loading tweets by @keenthemes...",
            "tweet_link" => "https://twitter.com/twitterapi"
        ];

        public $contacts = [
            
            "contact_title" => "Our Contacts",
            "address" => "35, Lorem Lis Street, Park Ave <br> California, US",
            "phone" => "Phone: 300 323 3456",
            "fax" => "Fax :300 323 1456",
            "email" => "info@metronic.com",
            "skype" => "skype:metronic" 
            
        ];

        public $social_icon = [
            [
                "id" => 1,
                "icon" => "rss",
                "link" => "#",
            ],
            [
                "id" => 2,
                "icon" => "facebook",
                "link" => "#",
            ],
            [
                "id" => 3,
                "icon" => "twitter",
                "link" => "#",
            ],
            [
                "id" => 4,
                "icon" => "googleplus",
                "link" => "#",
            ],
            [
                "id" => 5,
                "icon" => "linkedin",
                "link" => "#",
            ],
            [
                "id" => 6,
                "icon" => "youtube",
                "link" => "#",
            ],
            [
                "id" => 7,
                "icon" => "vimeo",
                "link" => "#",
            ],
            [
                "id" => 8,
                "icon" => "skype",
                "link" => "#",

            ],
        ];


        public $payment = [
            [
                "icon" => "http://localhost/easyshop/front/assets/corporate/img/payments/western-union.jpg",
                "title" => "We accept Western Union"
            ],
            [
                "icon" => "http://localhost/easyshop/front/assets/corporate/img/payments/american-express.jpg",
                "title" => "We accept american-express"
            ],
            [
                "icon" => "http://localhost/easyshop/front/assets/corporate/img/payments/MasterCard.jpg",
                "title" => "We accept MasterCard"
            ],
            [
                "icon" => "http://localhost/easyshop/front/assets/corporate/img/payments/PayPal.jpg",
                "title" => "We accept PayPal"
            ],
            [
                "icon" => "http://localhost/easyshop/front/assets/corporate/img/payments/visa.jpg",
                "title" => "We accept visa"
            ],
        ];


    }


?>