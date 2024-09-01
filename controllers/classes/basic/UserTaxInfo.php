<?php
    class UserTaxInfo extends UserTaxInfoModel{


        function save_user_tax_info($user_id, $order_id, $shipping_cost, $eco_cost, $vat){
            $response = new Response();

            try{
                $this->insert(array(
                'user_id' => $user_id,
                'order_id' => $order_id,
                'shipping_cost' => $shipping_cost,
                'eco_cost' => $eco_cost,
                'vat' => $vat
            ));
                $response->status = 1;
                $response->add_message("saved successfuly");
            }catch(Exception $e){
                $response->add_error($e->getMessage());
            }
            return $response;
        }
        
        function get_user_tax_info(){
            return $this->retrieve("where order_id = :order_id","*",['order_id' => $_GET['order_id']] )->fetch();
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