<?php 

class Order {
    function __construct()
    {
        if((new SiteIdentity())->demo == false){
            $this->orders = (new Orders())->get_order_list();
        }
    }




    public $orders = [
        [
            "id" => "2344",
            "quantity" => "05",
            "total_price" => "$2354545",
            "date" => "12/3/23",
        ],
        [
            "id" => "23434",
            "quantity" => "3",
            "total_price" => "$234545",
            "date" => "2/3/23",
        ],
        [
            "id" => "2434",
            "quantity" => "6",
            "total_price" => "$134545",
            "date" => "21/3/23",
        ],
    ];
}



?>