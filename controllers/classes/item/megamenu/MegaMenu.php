<?php
    class MegaMenu {
        public $mega_menu = [
            [
                "name" => "Woman",
                "link" => "#",
                "style" => "StyleA"
            ],
            [
                "name" => "Man",
                "link" => "#",
                "style" => "StyleB"
            ],
            [
                "name" => "kids",
                "link" => "#",
                "style" => ""
            ],
            [
                "name" => "new",
                "link" => "#",
                "style" => "StyleC"
            ]
        ];


        public function __construct(){
            foreach($this->mega_menu as $index => $value){
                $this->mega_menu[$index]['class'] = '';

                if($value['style']){
                    $this->mega_menu[$index]['class'] .= 'dropdown ';
                }

                if($value['style'] == "StyleB"){
                    $this->mega_menu[$index]['class'] .= 'dropdown-megamenu';
                }
                elseif($value['style'] == "StyleC"){
                    $this->mega_menu[$index]['class'] .= 'dropdown100 nav-catalogue';
                } 
            }
        }

    }

?>