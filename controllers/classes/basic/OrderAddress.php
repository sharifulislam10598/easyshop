<?php
    class OrderAddress extends OrderAddressModel{
     
        // function form_data_collection(){
        //     $this->user_id = $_SESSION['session_id'];
        //     $this->first_name = $_POST['first_name'];
        //     $this->last_name = $_POST['last_name'];
        //     $this->email = $_POST['email'];
        //     $this->telephone = $_POST['telephone'];
        //     $this->fax = $_POST['fax'];
        //     $this->company = $_POST['company'];
        //     $this->address_1 = $_POST['address_1'];
        //     $this->address_2 = $_POST['address_2'];
        //     $this->city = $_POST['city'];
        //     $this->post_code = $_POST['post_code'];
        //     $this->country = $_POST['country'];
        //     $this->region = $_POST['region'];
        // }


        function save_order_address($order_id,$first_name,$last_name,$email,$telephone, $fax,$company,$address_1,$address_2,$city, $post_code,$country,$region){
            $response = new Response();
            try{
                $this->insert(array(
                    'order_id' => $order_id,
                    'first_name' => $first_name,
                    'last_name' => $last_name,
                    'email' => $email,
                    'telephone' => $telephone,
                    'fax' => $fax,
                    'company' => $company,
                    'address_1' => $address_1,
                    'address_2' => $address_2,
                    'city' => $city,
                    'post_code' => $post_code,
                    'country' => $country,
                    'region' => $region
                ));
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

        function get_order_address(){
            return $this->retrieve(" where order_id = :order_id","*",["order_id" => $_GET['order_id']])->fetch();
        }

        function delivery_info_update(){
            $response = new Response();
            $validation = (new validation())->validation([
            ]);
            if(!$validation->status){
                return $validation;
            }

            try{
                $this->update(
                [
                    "id" => $_POST['id']
                ],
                [
   
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