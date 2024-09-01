<?php
    class SocialNetwork extends SocialNetworkModel{
     
        function form_data_collection(){
            $this->icon = $_POST['icon'];
            $this->link = $_POST['link'];
        }

        function create(){
            $this->insert(array(
                "icon" => $this->icon,
                "link" => $this->link
            ));
        }

        function save(){
            $response = new Response();
            $validation = (new validation())->validation([
                'icon' => 'required',
                'link' => 'required'
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
                $response->add_message("icon delete successfuly");
            }catch(Exception $e){
                $response->add_error($e->getMessage());
            }
            return $response;
        }

        function get_icons(){
            return $this->retrieve("","*",array())->fetchAll();
        }

        function get_icon($id){
            $data = [
                "id" => $id
            ];
            return $this->retrieve(" where id = :id","*",$data)->fetch();
        }

        function icon_update($id){
            $response = new Response();
            $validation = (new validation())->validation([
                'icon' => 'required',
                'link' => 'required'
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
                    'icon' => $this->icon,
                    'link' => $this->link
                ],[
                    'icon' => $this->icon,
                    'link' => $this->link
                ]);

            $response->status = 1;
            $response->add_message('icon update successfull');
            }catch(Exception $e){
                $response->add_error($e->getMessage());
            }
            return $response;

        }

    }