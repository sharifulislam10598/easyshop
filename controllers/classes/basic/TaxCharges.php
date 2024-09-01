<?php
    class TaxCharges  extends TaxchargesModel{
     
        function form_data_collection(){
            $this->taxes = $_POST['tax'];
            $this->rate = $_POST['rate'];
        }

        function create(){
            $this->insert(array(
                "taxes" => $this->taxes,
                "rate" => $this->rate,
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
        
        function get_tax_charge_info(){
            return $this->retrieve("where id = :id","*",['id' => $_GET['id']])->fetch();
        }

        function get_tax_charge_list(){
            return $this->retrieve("","*",[])->fetchAll();
        }
        
        function tax_charge_update(){
            $response = new Response();
            $validation = (new validation())->validation([
            ]);
            if(!$validation->status){
                return $validation;
            }
            try{
                $this->form_data_collection();
                $this->update(
                    [
                    "id" => $_GET['id']
                ],
                [
                    "taxes" => $this->taxes,
                    "rate" => $this->rate,
                ], 
                [
                    "taxes" => $this->taxes,
                    "rate" => $this->rate,
                ]);
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