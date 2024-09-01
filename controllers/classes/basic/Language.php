<?php
    class Language extends LanguageModel{
     
        function form_data_collection(){
            $this->name = $_POST['name'];
            $this->url = $_POST['url'];
        }

        function create(){
            $this->insert(array(
                "name" => $this->name,
                "url" => $this->url,
                "active" => 0
            ));
        }

        function save(){
            $response = new Response();
            $validation = (new validation())->validation([
                'name' => 'required',
                'url' => 'required',
            ]);
            if(!$validation->status){
                return $validation;
            }
            $this->form_data_collection();
            try{
                $this->create();
                $response->status = 1;
                $response->add_message("Language saved successfuly");
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
                $response->add_message("Language delete successfuly");
            }catch(Exception $e){
                $response->add_error($e->getMessage());
            }
            return $response;
        }

        function get_languages(){
            return $this->retrieve("","*",array())->fetchAll();
        }

        function get_language($id){
            $data = [
                "id" => $id
            ];
            return $this->retrieve(" where id = :id","*",$data)->fetch();
        }

        function language_update($id){
            $response = new Response();
            $validation = (new validation())->validation([
                'name' => 'required',
                'url' => 'required'
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
                    'name' => $this->name,
                    'url' => $this->url
                ],[
                    'name' => $this->name,
                    'url' => $this->url
                ]);

            $response->status = 1;
            $response->add_message('language update successfull');
            }catch(Exception $e){
                $response->add_error($e->getMessage());
            }
            return $response;

        }



    }