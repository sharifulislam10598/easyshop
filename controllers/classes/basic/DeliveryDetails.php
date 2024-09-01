<?php
    class DeliveryDetails extends DeliveryDetailsModel{
     
        function form_data_collection(){
            $this->user_id = $_SESSION['session_id'];
            $this->first_name = $_POST['first_name'];
            $this->last_name = $_POST['last_name'];
            $this->email = $_POST['email'];
            $this->telephone = $_POST['telephone'];
            $this->fax = $_POST['fax'];
            $this->company = $_POST['company'];
            $this->address_1 = $_POST['address_1'];
            $this->address_2 = $_POST['address_2'];
            $this->city = $_POST['city'];
            $this->post_code = $_POST['post_code'];
            $this->country = $_POST['country'];
            $this->region = $_POST['region'];
        }

        function create(){
            $this->insert(array(
                'user_id' => $this->user_id,
                'first_name' => $this->first_name,
                'last_name' => $this->last_name,
                'email' => $this->email,
                'telephone' => $this->telephone,
                'fax' => $this->fax,
                'company' => $this->company,
                'address_1' => $this->address_1,
                'address_2' => $this->address_2,
                'city' => $this->city,
                'post_code' => $this->post_code,
                'country' => $this->country,
                'region' => $this->region
            ));
        }

        function save(){
            $response = new Response();
            $validation = (new validation())->validation([
            ]);
            if(!$validation->status){
                return $validation;
            }
            $this->form_data_collection();
            try{
                $this->create();
                $response->status = 1;
                $response->add_message("saved successfuly");
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

        // function get_(){
        //     return $this->retrieve("","*",array())->fetchAll();
        // }

        function get_delivery_details(){
            return $this->retrieve(" where user_id = :user_id","*",["user_id" => $_SESSION['session_id']])->fetch();
        }

        function delivery_info_update(){
            $response = new Response();
            $validation = (new validation())->validation([
            ]);
            if(!$validation->status){
                return $validation;
            }
            $this->form_data_collection();
            try{
                $this->update(
                [
                    "id" => $_POST['id']
                ],
                [
                    'user_id' => $this->user_id,
                    'first_name' => $this->first_name,
                    'last_name' => $this->last_name,
                    'email' => $this->email,
                    'telephone' => $this->telephone,
                    'fax' => $this->fax,
                    'company' => $this->company,
                    'address_1' => $this->address_1,
                    'address_2' => $this->address_2,
                    'city' => $this->city,
                    'post_code' => $this->post_code,
                    'country' => $this->country,
                    'region' => $this->region
                ],
                [
                    'user_id' => $this->user_id,
                    'first_name' => $this->first_name,
                    'last_name' => $this->last_name,
                    'email' => $this->email,
                    'telephone' => $this->telephone,
                    'fax' => $this->fax,
                    'company' => $this->company,
                    'address_1' => $this->address_1,
                    'address_2' => $this->address_2,
                    'city' => $this->city,
                    'post_code' => $this->post_code,
                    'country' => $this->country,
                    'region' => $this->region
                ]);

            $response->status = 1;
            $response->add_message('update successfull');
            }catch(Exception $e){
                $response->add_error($e->getMessage());
            }
            return $response;

        }



    }