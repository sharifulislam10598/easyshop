<?php
    class Cart  extends CartModel{
        
        function form_data_collection(){
            $this->user_id = $_SESSION['session_id'];
            $this->product_id = $_POST['product_id'];
            $this->items_img = $_POST['items_img'];
            $this->items_name = $_POST['items_name'];
            $this->size = $_POST['size'];
            $this->color = $_POST['color'];
            $this->quantity = $_POST['quantity'];
            $this->price = $_POST['price'];

        }

        function create(){
            $this->insert(array(
                'user_id' => $this->user_id,
                'product_id' => $this->product_id,
                'items_img' => $this->items_img,
                'items_name' => $this->items_name,
                'size' => $this->size,
                'color' => $this->color,
                'quantity' => $this->quantity,
                'price' => $this->price
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

        function modal_cart_data($data){
            print_r($data);
            $this->insert($data);
        }
        



        function get_cart_item(){
            $session_id = $_SESSION['session_id'] ?? '';

            return $this->retrieve("where user_id = :user_id AND product_id=:product_id","*",['user_id'=> $session_id,'product_id' => $_GET['id']])->fetchAll();
        }
        
        function get_carted_item(){
            $session_id = $_SESSION['session_id'] ?? '';
            return $this->retrieve("where user_id = :user_id ","*",['user_id'=> $session_id])->fetchAll();
        }





        // function get_about_info(){
        //     return $this->retrieve("where id = :id","*",['id' => $_POST['id']])->fetch();
        // }
        
        function update_product_quantity(){
            $response = new Response();
            $validation = (new validation())->validation([
            ]);
            if(!$validation->status){
                return $validation;
            }
            try{
                $this->update(
                    ["id" => $_POST['id']],
                    ['quantity' => $this->quantity], 
                    ['quantity' => $this->quantity]
                );
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
                $this->delete("where user_id = :user_id ",array(
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