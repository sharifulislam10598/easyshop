<?php
    class Anouncement{

        function __construct()
        {
            if((new SiteIdentity())->demo == false){
                $list_of_items_four_info = (new Slider())->get_sliders_item_four();
                $this->items_four = [];
                foreach($list_of_items_four_info as $slide){
                    $this->items_four[] = [
                        '1st_line' => [
                            'text' => $slide['first_line'],
                            'color' => $slide['first_line_color']
                        ],
                        '2nd_line' => [
                            'text' => $slide['second_line'],
                            'color' => $slide['second_line_color']
                        ],
                        '3rd_line' => [
                            'text' => $slide['third_line'],
                            'color' => $slide['third_line_color']
                        ] ,
                        'subtitle_1' => $slide['subtitle_1'],
                        'background_img' => SITE_URL.'/'.$slide['background_img'],
                        'slider_item' => $slide['slider_item'],
                        'id'=> $slide['id']
                        ];
                }

                $list_of_items_five_info = (new Slider())->get_sliders_item_five();
                $this->items_five = [];
                foreach($list_of_items_five_info as $slide){
                    $this->items_five[] = [
                        '1st_line' => [
                            'text' => $slide['first_line'],
                            'color' => $slide['first_line_color']
                        ],
                        'subtitle_1' => $slide['subtitle_1'],
                        'subtitle_2' => $slide['subtitle_2'],
                        'button_text' => $slide['button_text'],
                        'url' => $slide['url'],
                        'center_img' => SITE_URL.'/'.$slide['center_img'],
                        'background_img' => SITE_URL.'/'.$slide['background_img'],
                        'id' => $slide['id'],
                        '$slider_item' => $slide['slider_item']
                    ];
                }

                $list_of_items_six_info = (new Slider())->get_sliders_item_six();
                $this->items_six = [];
                foreach($list_of_items_six_info as $slide){
                    $this->items_six[] = [
                            '1st_line' => [
                                'text' => $slide['first_line'],
                                'color' => $slide['first_line_color']
                            ],
                            '2nd_line' => [
                                'text' => $slide['second_line'],
                                'color' => $slide['second_line_color']
                            ],
                            '3rd_line' => [
                                'text' => $slide['third_line'],
                                'color' => $slide['third_line_color']
                            ],
                            'background_img' => SITE_URL.'/'.$slide['background_img'],
                            'id' => $slide['id'],
                            'slider_item' => $slide['slider_item']
                    ];
                }

                $list_of_items_seven_info = (new Slider())->get_sliders_item_seven();
                $this->items_seven = [];
                foreach($list_of_items_seven_info as $slide){
                    $this->items_seven[] = [
                        '1st_line' => [
                            'text' => $slide['first_line'],
                            'color' => $slide['first_line_color']
                        ],
                        '2nd_line' => [
                            'text' => $slide['second_line'],
                            'color' => $slide['second_line_color']
                        ],
                        'button_text' => $slide['button_text'],
                        'url' => $slide['url'],
                        'background_img' => SITE_URL.'/'.$slide['background_img'],
                        'id' => $slide['id'],
                        '$slider_item' => $slide['slider_item']
                    ];
                }

            }
        }

        public $items_four = [
            [
                '1st_line' => [
                    'text' => 'Tones of',
                    'color' => 'red'
                ],
                '2nd_line' => [
                    'text' => 'Shop UI Features',
                    'color' => 'red'
                ],
                '3rd_line' => [
                    'text' => 'designed',
                    'color' => 'blue'
                ] ,
                'subtitle_1' => 'Lorem ipsum dolor sit amet constectetuer diam <br/>
                adipiscing elit euismod ut laoreet dolore.',
                'background_img' => SITE_URL.'/front/assets/pages/img/shop-slider/slide1/bg.jpg'
            ]
        ];

        public  $items_five = [
            [
                '1st_line' => [
                    'text' => 'Unlimted',
                    'color' => 'white'
                ],
                'subtitle_1' => 'Layout Options',
                'subtitle_2' => 'Fully Responsive',
                'button_text' => 'See More Details',
                'url' => '#',
                'center_img' => SITE_URL.'/front/assets/pages/img/shop-slider/slide2/price.png',
                'background_img' => SITE_URL.'/front/assets/pages/img/shop-slider/slide2/bg.jpg'
            ]
        ];
        public  $items_six = [
            [
                '1st_line' => [
                    'text' => 'Full Admin &amp; Frontend',
                    'color' => 'white'
                ],
                '2nd_line' => [
                    'text' => 'eCommerce UI',
                    'color' => 'white'
                ],
                '3rd_line' => [
                    'text' => 'Is Ready For Your Project',
                    'color' => 'red'
                ],
                'background_img' => SITE_URL.'/front/assets/pages/img/shop-slider/slide3/bg.jpg'
            ]
        ];
        public $items_seven = [
            [
                '1st_line' => [
                    'text' => 'The most',
                    'color' => 'red'
                ],
                '2nd_line' => [
                    'text' => 'wanted bijouterie',
                    'color' => 'blue'
                ],
                'button_text' => 'But It Now!',
                'url' => '#',
                'background_img' => SITE_URL.'/front/assets/pages/img/shop-slider/slide4/bg.jpg'
            ]
        ];
    }
?>