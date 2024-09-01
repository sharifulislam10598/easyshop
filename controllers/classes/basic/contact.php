<?php
    class Contact extends ContactModel{
     
        function form_data_collection(){
            $this->contact_number = $_POST['contact'];
        }

        function create(){
            $this->insert(array(
                "contact_number" => $this->contact_number
            ));

        }

        function save(){
            $response = new Response();
            $validation = (new validation())->validation([
                'contact' => 'required'

            ]);
            if(!$validation->status){
                return $validation;
            }
            $this->form_data_collection();
            try{
                $this->create();
                $response->status = 1;
                $response->add_message("Contact saved successfuly");
            }catch(Exception $e){
                $response->add_error($e->getMessage());

            }
            return $response;
        }

        function get_contact(){
            return $this->retrieve('','*', [] )->fetch();
        }

        function contact_update($id){
            $response = new Response();
            $validation = (new validation())->validation([
                'contact' => 'required'
            ]);
            if(!$validation->status){
                return $validation;
            }
            $this->form_data_collection();
            try{
                $this->update([
                    "id" => $id
                ]
                ,[
                    'contact_number' => $this->contact_number
                ],[
                    'contact_number' => $this->contact_number
                ]);

            $response->status = 1;
            $response->add_message('Contact update successfull');
            }catch(Exception $e){
                $response->add_error($e->getMessage());
            }
            return $response;

        }
    }