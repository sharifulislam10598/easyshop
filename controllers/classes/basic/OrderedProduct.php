<?php
class OrderedProduct extends OrderedProductModel
{
    function create_current_date()
    {
        date_default_timezone_set('Asia/Dhaka');
        $date = new DateTime();
        $current_date = $date->format('Y-m-d');
        $this->date = $current_date;
    }

    function save_ordered_product_info($user_id,$order_id, $product_id, $size, $color, $quantity)
    {
        $response = new Response();
        try {
            $this->create_current_date();
            $this->insert(array(
                "user_id" => $user_id,
                "order_id" => $order_id,
                "product_id" => $product_id,
                "size" => $size,
                "color" => $color,
                "quantity" => $quantity,
                "date" => $this->date
            ));
            $response->status = 1;
            $response->add_message("saved successfuly");
        } catch (Exception $e) {
            $response->add_error($e->getMessage());
        }
        return $response;
    }

    // function get_about_info(){
    //     return $this->retrieve("","*",[])->fetch();
    // }

    function get_user_order_history()
    {
        return $this->retrieve(
            "LEFT JOIN items ON items.id = orderedproduct.product_id
            LEFT JOIN usertaxinfo ON usertaxinfo.order_id = orderedproduct.order_id 
            where orderedproduct.order_id = :order_id",
            "orderedproduct.*, items.price, items.items_name as product_name, usertaxinfo.shipping_cost,usertaxinfo.eco_cost,usertaxinfo.vat",
            ['order_id' => $_GET['order_id']]
        )->fetchAll();
    }

    function about_update()
    {
        $response = new Response();
        $validation = (new validation())->validation([
            'title' => 'required',
            'article_1' => 'required'
        ]);
        if (!$validation->status) {
            return $validation;
        }
        try {
            // $this->update(["id" => $_POST['id']],['title' => $this->title,'article_1' => $this->article_1,'article_2' => $this->article_2], ['title' => $this->title,'article_1' => $this->article_1,'article_2' => $this->article_2]);
            $response->status = 1;
            $response->add_message('update successfull');
        } catch (Exception $e) {
            $response->add_error($e->getMessage());
        }
        return $response;
    }

    function remove()
    {
        $response = new Response();
        try {
            $this->delete("where id = :id ", array(
                "id" => $_GET['id']
            ));
            $response->status = 1;
            $response->add_message("delete successfuly");
        } catch (Exception $e) {
            $response->add_error($e->getMessage());
        }
        return $response;
    }
}
