<?php
class Reviews extends ReviewsModel
{



    function get_comments_date()
    {
        date_default_timezone_set('Asia/Dhaka');
        $date = new DateTime();
        $this->date = $date->format('y-m-d');
    }

    function get_comments_time()
    {
        date_default_timezone_set('Asia/Dhaka');
        $datetime = new DateTime();
        $this->time = $datetime->format('H:i:s');
    }

    function form_data_collection()
    {
        $this->product_id = $_GET['id'];
        $this->name = $_POST['name'];
        $this->email = $_POST['email'];
        $this->review = $_POST['review'];
        $this->rating = $_POST['rating'];
    }

    function create()
    {
        $this->get_comments_date();
        $this->get_comments_time();
        $this->insert([
            'product_id' => $this->product_id,
            'name' => $this->name,
            'email' => $this->email,
            'review' => $this->review,
            'rating' => $this->rating,
            'date' => $this->date,
            'time' => $this->time
        ]);
    }



    function save()
    {
        $response = new Response();
        $validation = (new validation())->validation([]);
        if (!$validation->status) {
            return $validation;
        }

        try {
            $this->form_data_collection();
            $this->create();
            $response->status = 1;
            $response->add_message("saved successfuly");
        } catch (Exception $e) {
            $response->add_error($e->getMessage());
        }
        return $response;
    }


    // function get_colors(){
    //     return $this->retrieve("","*",[])->fetchAll();
    // }

    function get_reviews()
    {
        return $this->retrieve("where product_id = :id", "*", ['id' => $_GET['id']])->fetchAll();
    }

    function most_popular_items()
    {
        $max_rating = "
            (
            SELECT 
            MAX(r.rating)
             FROM 
             reviews as r 
             where  
             reviews.product_id = r.product_id 
             ) 
            ";

        return $this->retrieve(
            "
            left join items on items.id = reviews.product_id 

            where 
            rating = $max_rating

            group by reviews.product_id 
            order by reviews.rating desc 
            ",
            "items.*,reviews.rating,reviews.id as review_id",
            []
        )->fetchAll();
    }
}
