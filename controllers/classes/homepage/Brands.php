<?php
    class Brands{

        function __construct()
        {
            if((new SiteIdentity())->demo == false){
                $this->popular_brand = (new Brand())->get_brands();
            }
        }

        public $popular_brand = [
                [
                    "brand_img" => SITE_URL."/front/assets/pages/img/brands/canon.jpg",
                    "link" => "http://www.canon.com"
                ],
                [
                    "brand_img" => SITE_URL."/front/assets/pages/img/brands/esprit.jpg",
                    "link" => "http://www.esprit.com"
                ],
                [ 
                    "brand_img" => SITE_URL."/front/assets/pages/img/brands/gap.jpg",
                    "link" => "http://www.gap.com"
                ],
                [
                    "brand_img" => SITE_URL."/front/assets/pages/img/brands/next.jpg",
                    "link" => "http://www.next.com"
                ],
                [
                    "brand_img" => SITE_URL."/front/assets/pages/img/brands/puma.jpg",
                    "link" => "http://www.puma.com"
                ],
                [
                    "brand_img" => SITE_URL."/front/assets/pages/img/brands/zara.jpg",
                    "link" => "http://www.zara.com"
                ] 
            ];
        
    }

?>