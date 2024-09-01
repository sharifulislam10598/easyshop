<?php
    class StyleA {
    // 1st dropdown menu................
        public $nav = [
           
                [
                    "name" => "High Tops",
                    "link" => "#",
                    "dropdown" => []
                ],
                [
                    "name" => "Running Shoe",
                    "link" => "#",
                    "dropdown" => []
                ],
                [
                    "name" => "Jecket and Coats",
                    "link" => "#",
                    "dropdown" => []
                ]
            ];

            public function render(){ ?>
                <ul class="dropdown-menu">
                <?php foreach($this->nav as $dropdown){?>
                   <li><a href="<?php echo $dropdown['link']; ?>"><?php echo $dropdown["name"]; ?></a></li>
                <?php  } ?>
                </ul>
        <!-- end new item dropdown menu -->
    <?php } } ?>
