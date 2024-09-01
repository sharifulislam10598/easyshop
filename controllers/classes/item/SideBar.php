<?php
class SideBarInfo
{

    function __construct()
    {
        $demo_info = new SiteIdentity();
        if ($demo_info->demo == false) {
            $side_bar_info = (new Sidebar())->get_sidebars();
            $this->side_bar = [];
            foreach ($side_bar_info as $side_bar) {
                $this->side_bar[] = [
                    "id" => $side_bar['id'],
                    "name" => $side_bar['name'],
                    "link" => SITE_URL . '/front/user-info-customize-page/' . $side_bar['link']
                ];
            }
        }
    }

    public $side_bar = [

        [
            "id" => 2,
            "name" => "Restore Password",
            "link" => "#"
        ],
        [
            "id" => 4,
            "name" => "Address book",
            "link" => "#"
        ],
        [
            "id" => 6,
            "name" => "Returns",
            "link" => "#"
        ],
        [
            "id" => 7,
            "name" => "Newsletter",
            "link" => "#"
        ]
    ];
}
