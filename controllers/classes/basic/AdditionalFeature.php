<?php
    class AdditionalFeature extends FeatureModel{

        function form_data_collection(){
            if(isset($_POST['features']) && isset($_POST['feature_values'])){
                $this->features = $_POST['features'];
                $this->feature_values = $_POST['feature_values'];
            }
        }

        function create($product_id){
            $feature_info = [];
            foreach($this->features as $index_1 => $value_1){
                foreach($this->feature_values as $index_2 => $value_2 ){
                    if($index_1 == $index_2){
                        $feature_info[] = [
                            'features' => $value_1,
                            'feature_values' => $value_2
                        ];
                    }
                }
            }
            foreach($feature_info as $value){
                $this->insert(array(
                    "product_id" => $product_id,
                    "features" => $value['features'],
                    "feature_values" => $value["feature_values"]
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

        function get_features(){
            return $this->retrieve("where product_id = :id","*",['id' => $_GET['id']])->fetchAll();
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
                $response->add_message("Category delete successfuly");
            }catch(Exception $e){
                $response->add_error($e->getMessage());
            }
            return $response;
        }

    }

?>