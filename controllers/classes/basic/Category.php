<?php
    class Categorys  extends CategoryModel{
     
        function form_data_collection(){
            $this->name = $_POST['name'];
            $this->link = $_POST['link'];
        }

        function create(){
            $this->insert(array(
                "name" => $this->name,
                "link" => $this->link
            ));
        }

        function save(){
            $response = new Response();
            $validation = (new validation())->validation([
                'name' => 'required',
                'link' => 'required'
            ]);
            if(!$validation->status){
                return $validation;
            }

            try{
                $this->form_data_collection();
                $this->create();
                $response->status = 1;
                $response->add_message("Category saved successfuly");
            }catch(Exception $e){
                $response->add_error($e->getMessage());
            }
            return $response;
        }
        
        function get_categorys(){
            return $this->retrieve("","*",[])->fetchAll();
        }

        function get_category(){
            return $this->retrieve("where id = :id","*",['id' => $_GET['id']])->fetch();
        }
        
        function category_update(){
            $response = new Response();
            $validation = (new validation())->validation([
                'name' => 'required',
                'link' => 'required'
            ]);
            if(!$validation->status){
                return $validation;
            }
            try{
                $this->form_data_collection();
                $this->update(["id" => $_POST['id']],['name' => $this->name,'link' => $this->link ], ['name' => $this->name,'link' => $this->link ]);
                $response->status = 1;
                $response->add_message('Category update successfull');
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
                $response->add_message("Category delete successfuly");
            }catch(Exception $e){
                $response->add_error($e->getMessage());
            }
            return $response;
        }

    }

?>