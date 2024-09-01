<?php
    class Orders extends OrdersModel{

        function create_current_date(){
            date_default_timezone_set('Asia/Dhaka');
            $date = new DateTime();
            $current_date = $date->format('Y-m-d');
            $this->date = $current_date;
        }
     
        function create(){

        }

        function save_order($user_id,$quantity, $total_price){
            $response = new Response();
            try{
                $this->create_current_date();
                $this->insert(array(
                    "user_id" => $user_id,
                    "quantity" => $quantity,
                    "total_price" => $total_price,
                    "date" => $this->date,
                    "status" => $this->status
                ));
                $response->status = 1;
                $response->data['last_insert_id'] = $this->connection->lastInsertId();
                $response->add_message("saved successfuly");
            }catch(Exception $e){
                $response->add_error($e->getMessage());
            }
            return $response;
        }
        
        function get_user_order_history(){
            return $this->retrieve("where user_id = :user_id","*",['user_id' => $_SESSION['session_id']])->fetchAll();
        }

        function get_order_list(){
            return $this->retrieve("","*",[])->fetchAll();
        }

        // function get_about_info(){
        //     return $this->retrieve("where id = :id","*",['id' => $_POST['id']])->fetch();
        // }
        
        function about_update(){
            $response = new Response();
            $validation = (new validation())->validation([
                'title' => 'required',
                'article_1' => 'required'
            ]);
            if(!$validation->status){
                return $validation;
            }
            try{
                // $this->update(["id" => $_POST['id']],['title' => $this->title,'article_1' => $this->article_1,'article_2' => $this->article_2], ['title' => $this->title,'article_1' => $this->article_1,'article_2' => $this->article_2]);
                $response->status = 1;
                $response->add_message('update successfull');
            }catch(Exception $e){
                $response->add_error($e->getMessage());
            }
            return $response;
        }

        function remove(){
            $response = new Response();
            try{
                $this->delete("where id = :id ",array(
                    "id" => $_GET['id']
                ));
                $response->status = 1;
                $response->add_message("delete successfuly");
            }catch(Exception $e){
                $response->add_error($e->getMessage());
            }
            return $response;
        }
    }

?>