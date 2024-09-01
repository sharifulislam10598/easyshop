<?php
    class Sidebar extends SidebarModel{
     
        function form_data_collection(){
            $this->name = $_POST['name'];
            $this->link = $_POST['link'];
        }

        function create(){
            $this->insert(array(
                "name" => $this->name,
                "link" => $this->link,
            ));
        }

        function save(){
            $response = new Response();
            $validation = (new validation())->validation([
                'name' => 'required',
                'link' => 'required',
            ]);
            if(!$validation->status){
                return $validation;
            }
            $this->form_data_collection();
            try{
                $this->create();
                $response->status = 1;
                $response->add_message("Sidebar saved successfuly");
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
                $response->add_message("Sidebar delete successfuly");
            }catch(Exception $e){
                $response->add_error($e->getMessage());
            }
            return $response;
        }

        function get_sidebars(){
            return $this->retrieve("","*",array())->fetchAll();
        }

        function get_sidebar($id){
            $data = [
                "id" => $id
            ];
            return $this->retrieve(" where id = :id","*",$data)->fetch();
        }

        function sidebar_update($id){
            $response = new Response();
            $validation = (new validation())->validation([
                'name' => 'required',
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
                    'name' => $this->name,
                    'link' => $this->link
                ],[
                    'name' => $this->name,
                    'link' => $this->link
                ]);

            $response->status = 1;
            $response->add_message('Sidebar update successfull');
            }catch(Exception $e){
                $response->add_error($e->getMessage());
            }
            return $response;

        }



    }