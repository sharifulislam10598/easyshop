<?php
    class Menu{

        function __construct()
        {
            if(!(new SiteIdentity())->demo){
                $this->language = (new Language())->get_languages();
                $this->nav = (new topNav())->get_navs();
                $this->currency = (new Currency())->get_Currencys();
            }

        }

        public $currency = array(
            array(
                "name" => "dollar",
                "symbol" => "$",
                "url" => "#"
            ),
            
            array(
                "name" => "taka",
                "symbol" => "৳",
                "url" => "#"
            ),

        );

        
        public $language = array(
            array(
                "name" => "Bangla",
                "url" => "#",
                "active" => 1
            ),
            
            array(
                "name" => "English",
                "url" => "#",
                "active" => 0
            ),
            
            array(
                "name" => "Franch",
                "url" => "#",
                "active" => 0
            ),


        );




        public function get_active_language(){
            $active_lang = "";

            foreach($this->language as $lang){
                if($lang['active']){
                    $active_lang = $lang['name'];
                }
            }

            return $active_lang;
        }

        
        public function get_inactive_languages(){
            $list = array();

            foreach($this->language as $lang){
                if(!$lang['active']){
                    $list[] = $lang;
                }
            }

            return $list;
        }


        public $nav = [
            [
                "name" => "My account",
                "url" => SITE_URL."/front/shop-account.php"
            ],
            [
                "name" => "My wishlist",
                "url" => SITE_URL."front/shop-wishlist.php"
            ],
            [
                "name" => "Checkout",
                "url" => SITE_URL."front/shop-checkout.php"
            ],
            [
                "name" => "LogIN",
                "url" => SITE_URL."front/shop-login.php"
            ]
        ];

        
    }