<?php
    class SiteIdentity{
        public $contact_number = '+1 456 6717';
        public $company_name = 'EasyshopBD';
        public $logo_name = 'EasyShopBD';
        public $logo = SITE_URL.'/front/assets/corporate/img/logos/logo-shop-red.png';
        public $homepage = SITE_URL;
        public $site_title = 'Bangladesh number 1 ecommerce';
        public $demo = 0;


        function __construct()
        {
            $logo_info = (new logo)->get_logo();
            if($this->demo == false && $logo_info == true){
                $this->logo = SITE_URL.'/'.$logo_info['image'];
            }

            $contact_info = (new Contact())->get_contact();
            if($this->demo == false && $contact_info == true){
                $this->contact_number = $contact_info['contact_number'];
            }
        }

    }

?>

