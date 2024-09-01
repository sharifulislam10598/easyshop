<?php
    class Brand extends BrandsModel{
     
        function form_data_collection(){
            $this->link = $_POST['link'];
        }
        function create(){
            $this->insert(array(
                "brand_img" => $this->brand_img,
                "link" => $this->link
            ));
        }

        function save(){
            $response = new Response();
            $validation = (new validation())->validation([
                'brand_img' => 'required|uploaded_file:0,500K,png,jpeg',
                'link' => 'required'
            ]);
            if(!$validation->status){
                return $validation;
            }

            try{
                $this->form_data_collection();
                $this->brand_img = $this->upload("uplode-img/brands", $_FILES['brand_img']);
                $this->create();
                $response->status = 1;
                $response->add_message("Brand information saved successfuly");
            }catch(Exception $e){
                $response->add_error($e->getMessage());
            }
            return $response;
        }
        
        function make_folder($folder_name){
            if(!file_exists(ROOT_DIRECTORY.'/'.$folder_name)){
                mkdir(ROOT_DIRECTORY.'/'.$folder_name, 0775, true);
            }
        }
        function upload($folder_name,$input){
            $this->make_folder($folder_name);
            $destination = $folder_name ."/".$input['name'];
            move_uploaded_file($input['tmp_name'], '../'.$destination);
            return $destination;
        }

        function get_brands(){
            return $this->retrieve("","*",[])->fetchAll();
        }

        function get_brand(){
            return $this->retrieve("where id = :id","*",['id' => $_GET['id']])->fetch();
        }
        
        function brand_update(){
            $response = new Response();
            $validation = (new validation())->validation([
                'brand_img' => 'required|uploaded_file:0,500K,png,jpeg',
                'link' => 'required'
            ]);
            if(!$validation->status){
                return $validation;
            }
            try{
                $this->form_data_collection();
                $this->brand_img = $this->upload("uplode-img/logo", $_FILES['brand_img']);
                $this->update(["id" => $_POST['id']],['brand_img' => $this->brand_img,'link' => $this->link ], ['brand_img' => $this->brand_img,'link' => $this->link ]);
                $response->status = 1;
                $response->add_message('brand update successfull');
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
                $response->add_message("brand delete successfuly");
            }catch(Exception $e){
                $response->add_error($e->getMessage());
            }
            return $response;
        }

    }

?>