<?php
    class Sizes extends SizeModel{

        function form_data_collection(){
            if(isset($_POST['sizes'])){
                $this->sizes = $_POST['sizes'];
            }
        }

        function create($product_id){
            $size_info = [];
            foreach($this->sizes as $value){
                $size_info[] = [
                    'sizes'=>$value
                ];
            }
            
            foreach($size_info as $value){
                $this->insert(array(
                    "product_id" => $product_id,
                    "sizes" => $value['sizes'],
                ));
            }

        }
        


        function save($product_id){
            $response = new Response();
            $validation = (new validation())->validation([
            ]);
            if(!$validation->status){
                return $validation;
            }

            try{
                $this->form_data_collection();
                $this->create($product_id);
                $response->status = 1;
                $response->add_message("saved successfuly");
            }catch(Exception $e){
                $response->add_error($e->getMessage());
            }
            return $response;
        }
        
        
        // function get_attributes(){
        //     return $this->retrieve("","*",[])->fetchAll();
        // }

        function get_sizes($id){
            return $this->retrieve("where product_id = :id","*",['id' => $id])->fetchAll();
        }
        
        function attribute_update(){
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
                        "id" => $_POST['id']
                    ],
                    [
                        'product_id' => $this->product_id,
                        // 'colors' => $this->colors, 
                    ], 
                    [
                        'product_id' => $this->product_id,
                        // 'colors' => $this->colors,
                    ]);
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
                $this->delete("where product_id = :id ",array(
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