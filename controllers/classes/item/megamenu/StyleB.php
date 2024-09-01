<?php
    class StyleB {
        public $sec_dropdown = [
            [ 
                "col" =>[
                    [
                        "name" => "Astro Trainers",
                        "link" => "#",
                    ],
                    [
                        "name" => "Basketball Shoes",
                        "link" => "#",
                    ],
                    [
                        "name" => "Boots",
                        "link" => "#",
                    ],
                    [
                        "name" => "Canvas Shoes",
                        "link" => "#",
                    ],
                    [
                        "name" => "Football Boots",
                        "link" => "#",
                    ],
                    [
                        "name" => "Golf Shoes",
                        "link" => "#",
                    ],
                    [
                        "name" => "AHi Tops",
                        "link" => "#",
                    ],
                    [
                        "name" => "Indoor and Court Trainers",
                        "link" => "#"
                    ]
                ],
                "title"=> "footwear"
            ],

            [
                "col" => [

                    [
                        "name" => "Base Layer",
                        "link" => "#",
                    ],
                    [
                        "name" => "Character",
                        "link" => "#",
                    ],
                    [
                        "name" => "Chinos",
                        "link" => "#",
                    ],
                    [
                        "name" => "Combats",
                        "link" => "#",
                    ],
                    [
                        "name" => "Cricket",
                        "link" => "#",
                    ],
                    [
                        "name" => "Fleeces",
                        "link" => "#",
                    ],
                    [
                        "name" => "Gilets",
                        "link" => "#",
                    ],
                    [
                        "name" => "Golf Tops",
                        "link" => "#"
                    ]
                ],
                "title"=> "clothing"
            ],

            [ 
                "col" => [

                    [
                        "name" => "Belts",
                        "link" => "#",
                    ],
                    [
                        "name" => "Caps",
                        "link" => "#",
                    ],
                    [
                        "name" => "Gloves, Hats and Scarves",
                        "link" => "#"
                    ]
                ],
                "title"=> "Accessories"
            ],

            [
                "col" =>[

                    [
                        "name" => "Jackets",
                        "link" => "#",
                    ],
                    [
                        "name" => "Bottoms",
                        "link" => "#"
                    ]
                ],
                "title"=> "Clearance"
            ]
        ];
        // brands...................
        public $brands = [
            [
                "brand_img" => SITE_URL . "/front/assets/pages/img/brands/esprit.jpg",
                "link" => "#",
                "title" =>"esprit"
            ],
            [
                "brand_img" => SITE_URL . "/front/assets/pages/img/brands/gap.jpg",
                "link" => "#",
                "title" =>"gap"
            ],
            [
                "brand_img" => SITE_URL . "/front/assets/pages/img/brands/next.jpg",
                "link" => "#",
                "title" =>"next"
            ],
            [
                "brand_img" => SITE_URL . "/front/assets/pages/img/brands/puma.jpg",
                "link" => "#",
                "title" =>"puma"
            ],
            [
                "brand_img" => SITE_URL . "/front/assets/pages/img/brands/zara.jpg",
                "link" => "#",
                "title" =>"zara"
            ],
        ];
        public function render(){ ?>
            <ul class="dropdown-menu">
                <li>
                  <div class="header-navigation-content">
                    <div class="row">
                     <?php foreach($this->sec_dropdown as $value){ ?>
                      <div class="col-md-4 header-navigation-col">
                        <h4><?php echo $value['title'] ?></h4>
                        <ul>
                          <?php  foreach($value['col'] as $dropdown){ ?>
                            <li><a href="<?php echo $dropdown['link']; ?>"><?php echo $dropdown['name'] ?></a></li>
                     <?php   } ?>
                        </ul>
                      </div>
                     <?php  } ?>
                        <!-- brand -->
                      <div class="col-md-12 nav-brands">
                        <ul>
                        <?php foreach($this->brands as $brand){ ?>
                          <li><a href="<?php echo $brand['link'] ?>"><img title="<?php echo $brand['title'] ?>" src="<?php echo $brand['brand_img'] ?>"></a></li>
                        <?php } ?>
                        </ul>
                      </div>
                    </div>
                  </div>
                </li>
              </ul>
        
     
   
    <?php } } ?>
