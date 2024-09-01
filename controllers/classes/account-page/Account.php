<?php 
    class Account {
        public $account_info = [
            [
                "content" => "Edit your account information",
                "link" => SITE_URL."/front/user-info-customize-page/user-account-info-edit.php"
            ],
            [
                "content" => "Change your password",
                "link" => SITE_URL."/front/user-info-customize-page/password-change.php"
            ],
            [
                "content" => "Modify your address book entries",
                "link" => SITE_URL."/front/user-info-customize-page/address-book-modify.php"
            ],
            [
                "content" => "Modify your wish list",
                "link" => "shop-wishlist.php"
            ],
        ];

        public $order_info = [
            [
                "content" => "View your order history",
                "link" => SITE_URL."/front/user-order-page/user-order-list.php"
            ],
            [
                "content" => "Downloads",
                "link" => "#"
            ],
            [
                "content" => "Your Reward Points",
                "link" => SITE_URL."/front/user-order-page/reward-points.php"
            ],
            [
                "content" => "View your return requests",
                "link" => SITE_URL."/front/user-order-page/view-return-request.php"
            ],
            [
                "content" => "Your Transactions",
                "link" => SITE_URL."/front/user-order-page/user-transactions.php"
            ],
        ];
    }