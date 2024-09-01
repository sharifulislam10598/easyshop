<?php
    class Information extends InformationModel{
     
        function form_data_collection(){
            $this->subject = $_POST['subject'];
            $this->link = $_POST['link'];
        }

        function create(){
            $this->insert(array(
                "subject" => $this->subject,
                "link" => $this->link
            ));
        }

        function save(){
            $response = new Response();
            $validation = (new validation())->validation([
                'subject' => 'required',
                'link' => 'required',
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

        function get_informations(){
            return $this->retrieve("","*",array())->fetchAll();
        }

        function get_information(){
            return $this->retrieve(" where id = :id","*",["id" => $_GET['id']])->fetch();
        }

        function information_update(){
            $response = new Response();
            $validation = (new validation())->validation([
                'subject' => 'required',
                'link' => 'required',
            ]);
            if(!$validation->status){
                return $validation;
            }
            $this->form_data_collection();
            try{
                $this->update([
                    "id" => $_POST['id']
                ]
                ,[
                    'subject' => $this->subject,
                    'link' => $this->link
                ],[
                    'subject' => $this->subject,
                    'link' => $this->link
                ]);

            $response->status = 1;
            $response->add_message('update successfull');
            }catch(Exception $e){
                $response->add_error($e->getMessage());
            }
            return $response;

        }



    }