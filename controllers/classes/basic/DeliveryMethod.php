<?php
    class DeliveryMethod  extends DeliveryMethodModel{
        function form_data_collection(){
            $this->user_id = $_SESSION['session_id'] ?? '';
            $this->method = $_POST['method'];
            $this->comments = $_POST['comments'];
        }

        function create(){
            $this->insert(array(
                'user_id' => $this->user_id,
                'method' => $this->method,
                'shipping_cost'=> $this->shipping_cost,
                'comments' => $this->comments
            ));
        }

        function save(){
            $response = new Response();
            $validation = (new validation())->validation([
            ]);
            if(!$validation->status){
                return $validation;
            }
            try{
                $this->form_data_collection();
                $this->create();
                $response->status = 1;
                $response->add_message("saved successfuly");
            }catch(Exception $e){
                $response->add_error($e->getMessage());
            }
            return $response;
        }
        
        function get_shipping_method_info(){
            return $this->retrieve("where user_id =:user_id","*",['user_id' => $_SESSION['session_id']])->fetch();
        }

        // function get_about_info(){
        //     return $this->retrieve("where id = :id","*",['id' => $_POST['id']])->fetch();
        // }
        
    //     function about_update(){
    //         $response = new Response();
    //         $validation = (new validation())->validation([
    //             'title' => 'required',
    //             'article_1' => 'required'
    //         ]);
    //         if(!$validation->status){
    //             return $validation;
    //         }
    //         try{
    //             $this->form_data_collection();
    //             $this->update(["id" => $_POST['id']],['title' => $this->title,'article_1' => $this->article_1,'article_2' => $this->article_2], ['title' => $this->title,'article_1' => $this->article_1,'article_2' => $this->article_2]);
    //             $response->status = 1;
    //             $response->add_message('update successfull');
    //         }catch(Exception $e){
    //             $response->add_error($e->getMessage());
    //         }
    //         return $response;
    //     }

        function delete_user_delivery_method(){
            $response = new Response();
            try{
                $this->delete("where user_id = :user_id",array(
                    "user_id" => $_SESSION['session_id']
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