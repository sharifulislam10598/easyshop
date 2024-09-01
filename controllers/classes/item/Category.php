<?php
    class Category{


        public $ul = [
            [
                "name" => "Ladies",
                "link" => SITE_URL."/front/category/ladies.php",
                "childs" => []
            ],
            [
                "name" => "Mens",
                "link" => "#",
                "childs" => [
                        [
                            "name" => "Shoes",
                            "link" => "#",
                            "childs" => [
                                [
                                    "name" => "Classic",
                                    "link" => "#",
                                    "childs" => [
                                        [
                                            "name" => "Classic 1",
                                            "link" => "#",
                                            "childs" => []
                                        ],
                                        [
                                            "name" => "Classic 2",
                                            "link" => "#",
                                            "childs" => []
                                        ],
                                    ]
                                ],
                                [
                                    "name" => "Sport",
                                    "link" => "#",
                                    "childs" => [
                                        [
                                            "name" => "Sport 1",
                                            "link" => "#",
                                            "childs" => []
                                        ],
                                        [
                                            "name" => "Sport 2",
                                            "link" => "#",
                                            "childs" => []
                                        ],
                                    ]
                                ]
                            ]
                        ],
                        [
                            "name" => "Trainers",
                            "link" => "#",
                            "childs" => []
                        ],
                        [
                            "name" => "Jeans",
                            "link" => "#",
                            "childs" => []
                        ],
                        [
                            "name" => "Chinos",
                            "link" => "#",
                            "childs" => []
                        ],
                        [
                            "name" => "T-Shirts",
                            "link" => "#",
                            "childs" => []
                        ]
                ]
            ],
            [
                "name" => "Kids",
                "link" => "#",
                "childs" => []
            ],
            [
                "name" => "Accessories",
                "link" => SITE_URL."/front/category/accesories.php",
                "childs" => []
            ],
            [
                "name" => "Sports",
                "link" => "#",
                "childs" => []
            ],
            [
                "name" => "Brands",
                "link" => "#",
                "childs" => []
            ],
            [
                "name" => "Electronics",
                "link" => "#",
                "childs" => []
            ],
            [
                "name" => "Home & Garden",
                "link" => "#",
                "childs" => []
            ],
            [
                "name" => "Custom Links",
                "link" => "#",
                "childs" => []
            ]
        ];
        public function view_childs($category){ ?>
            <li class="list-group-item <?php if($category["childs"]){echo "dropdown ";}?> clearfix" ><a href="<?php echo $category["link"] ?>"><i class="fa fa-angle-right"></i> <?php echo $category["name"] ?></a>
        <?php   if($category["childs"]){ ?>
                <ul class='dropdown-menu'>
          <?php  foreach($category["childs"] as $child_category){
                $this->view_childs($child_category);
            } ?>
            </ul>
      <?php  } ?>
        </li>
    
 <?php   }

    }
?>